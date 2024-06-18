<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

// ========================= Admin Page =========================
// Show the admin page
Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

// ========================= Product Listings =========================
// Show all the products
Route::get('/', [ProductController::class, 'index'])
    ->name('product.index');

// Show a product's details
Route::get('/product/{id}', [ProductController::class, 'search'])
    ->name('search.product');

// ========================= Shopping Cart =========================
// Store cart
Route::post('/', [CartController::class, 'store'])
    ->name('cart.store');

// Show a cart
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

// Remove a product from the cart
Route::post('/cart', [CartController::class, 'destroy'])
    ->name('cart.destroy');

// ========================= Checkout =========================
// Checkout page
Route::post('/checkout', [CheckoutController::class, 'index']) 
    ->name('checkout');

// Checkout success page
Route::get('/success/{param}', [CheckoutController::class, 'success'])
    ->name('checkout.success');

// ========================= User Authentication =========================
// Show Register/Create form (Register page)
Route::get('/register', [UserController::class, 'index'])->middleware('guest')
    ->name('register');

// Create new user
Route::post('/users', [UserController::class, 'store'])
    ->name('users');

// Log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth') // authenticate user to perform certain task
    ->name('logout'); 

// Show Login form (Login page)
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/auth', [UserController::class, 'auth'])
    ->name('users.auth');   
