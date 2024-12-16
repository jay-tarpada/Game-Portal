<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::paginate(10);
        return view('admin.games.index', compact('games'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.games.create'); // Point to your create game form view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'html_file' => 'required|file|mimes:html|max:2048',
        ]);

        // Store the image
        $imagePath = $request->file('image')->store('games/images');

        // Store the HTML file
        $htmlFilePath = $request->file('html_file')->store('games/html');

        // Create the game record
        Game::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'html_file' => $htmlFilePath,
        ]);

        return redirect()->route('admin.games.index')->with('success', 'Game added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $game = Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'html_file' => 'nullable|mimes:html|max:2048',
        ]);
    
        $game = Game::findOrFail($id);
        $game->name = $request->name;
        $game->description = $request->description;
    
        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($game->image && Storage::disk('public')->exists($game->image)) {
                Storage::disk('public')->delete($game->image);
            }
            // Store new image
            $game->image = $request->file('image')->store('images', 'public');
        }
    
        // Handle HTML file upload if present
        if ($request->hasFile('html_file')) {
            // Delete old HTML file if it exists
            if ($game->html_file && Storage::disk('public')->exists($game->html_file)) {
                Storage::disk('public')->delete($game->html_file);
            }
            // Store new HTML file
            $game->html_file = $request->file('html_file')->store('games', 'public');
        }
    
        $game->save();
    
        return redirect()->route('admin.games.index')->with('success', 'Game updated successfully!');
    }
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the game by ID
        $game = Game::findOrFail($id);
    
        // Check and delete the image if it exists
        if ($game->image && Storage::disk('public')->exists($game->image)) {
            Storage::disk('public')->delete($game->image);
        }
    
        // Check and delete the HTML file if it exists
        if ($game->html_file && Storage::disk('public')->exists($game->html_file)) {
            Storage::disk('public')->delete($game->html_file);
        }
    
        // Delete the game from the database
        $game->delete();
    
        return redirect()->route('admin.games.index')->with('success', 'Game deleted successfully!');
    }
    

// In GameController.php

public function play($id)
{
    // Find the game by its ID
    $game = Game::findOrFail($id);

    // Return the view where the game can be played, passing the game data
    return view('games.play', compact('game'));
}

}
