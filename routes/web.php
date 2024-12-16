<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'check.status'])->group(function () {
    // Admin dashboard route
    Route::get('/admin/dashboard', [Dashboardcontroller::class, 'index'])->name('admin.dashboard');
    // Any other admin routes can go here, e.g.:
    Route::resource('admin/category', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('product', ProductController::class);

    Route::prefix('admin')->group(function () {
        Route::get('/games/create', [GameController::class, 'create'])->name('admin.games.create');
        Route::post('/games', [GameController::class, 'store'])->name('admin.games.store');
        Route::get('/games', [GameController::class, 'index'])->name('admin.games.index');
    });
    Route::resource('games', GameController::class);
    Route::get('/games', [GameController::class, 'index'])->name('games.index');

    

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
});



// Route::get('admin/dashboard',[Dashboardcontroller::class,'index']);

// Route::resource('admin/category',CategoryController::class);


// Route::resource('users', UserController::class);

// Route::resource('product', ProductController::class);

// Route::resource('games', GameController::class);

// Route::get('/games', [GameController::class, 'index'])->name('games.index');

Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');

// Route::prefix('admin')->group(function () {
//     Route::get('/games/create', [GameController::class, 'create'])->name('admin.games.create');
//     Route::post('/games', [GameController::class, 'store'])->name('admin.games.store');
//     Route::get('/games', [GameController::class, 'index'])->name('admin.games.index');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/games/{id}/play', [GameController::class, 'play'])->name('games.play');

// Show login form
Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Handle login request
Route::post('login', [UserController::class, 'login'])->name('login');


Route::get('/signup', function () {
    return view('signup');  
})->name('signup');

// Protect dashboard route
Route::get('welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');



Route::post('/signup', [UserController::class, 'register'])->name('signup.submit');

Route::get('/signup', [UserController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [UserController::class, 'storeUser'])->name('signup.store');




// Show the contact form
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');




