<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
|-------------------------------------------------------------------------
| Naming Conventions
|-------------------------------------------------------------------------
|
| index - show all listings
| show - show single lisitng
| create - show form to create new listing
| store - store new listing
| edit - show form to edit listing
| update - update listing
| destroy - delete listing
|
*/


// ========================= Product Listings =========================
Route::get('/home', [HomeController::class, 'index']);

// Show all the products
Route::get('/', [ProductController::class, 'index']);

// Show a product's details
Route::get('/product/{id}', [ProductController::class, 'search']);

// ========================= User Authentication =========================
// Show Register/Create form (Register page)
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth'); // authenticate user to perform certain task

// Show Login form (Login page)
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/auth', [UserController::class, 'auth']);