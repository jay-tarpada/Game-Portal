<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['all'] = User::paginate(4);
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.createusr');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|integer|max:999999999999',
            'age' => 'required|integer|max:999',
            'status' => 'nullable',
        ]);

        User::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'city' => $request->city,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'age' => $request->age,
            'status' => $request->status == true ? 1 : 0,
        ]);

        return redirect('users')->with('status', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) // Updated parameter name
    {
        return view('users.showusr', compact('user')); // Updated variable
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) // Updated parameter name
    {
        return view('users.edituser', compact('user')); // Updated variable
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|integer|max:999999999999',
            'age' => 'required|integer|max:999',
            'status' => 'nullable',
        ]);

        $user->update([ // Use update instead of create
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'city' => $request->city,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'age' => $request->age,
            'status' => $request->status == true ? 1 : 0,
        ]);

        return redirect('users')->with('status', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users')->with('status', 'User Deleted Successfully');
    }

    public function showSignupForm()
    {
        return view('signup'); // Display signup view
    }

    public function storeUser(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8', // For password confirmation
            'email' => 'required|email|unique:users,email',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits_between:10,12',
            'age' => 'required|integer|min:1|max:120',
        ]);

        // Create the user with hashed password
        User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'city' => $request->city,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'age' => $request->age,
            'status' => 0,
        ]);

        return redirect('/login')->with('status', 'Signup successful! You can now login.');
    }


    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if the user is an admin (status == 1)
            if (Auth::user()->status == 1) {
                // Redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            }
    
            // Redirect to the home page if the user is not an admin
            return redirect()->route('home');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
        }
    }
    

}
