<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PharmaciesController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\OrderMedicinesController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\PharmacyCustomersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/products', [WelcomeController::class, 'guest'])->name('products');
// Route::get('/create-pharmacy', [RegisterController::class, 'createPharmacy'])->name('create.pharmacy');
// Route::get('/pharmacies/create', [UsersController::class, 'create'])->name('create.pharmacy');
Route::resource('/users', UsersController::class)->middleware('verified');
// Route::get('/customers', [UsersController::class, 'customers'])->name('customer.profile');

Auth::routes([
    // 'verify' => true
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Pharmacy route
// Route::resource('/pharmacies', PharmaciesController::class);
// Route::get('/pharmacies', [PharmaciesController::class, 'pharmacy_profile'])->name('pharmacy.profile');
Route::get('/search', [PharmaciesController::class, 'search'])->name('drugs.search');
Route::get('/pharmacy/{id}', [PharmaciesController::class, 'show'])->name('pharmacy.products');
// Route::get('/pharmarcy_customers/{id}', [PharmaciesController::class, 'all_customers'])->name('pharmacy.customers');

//Medicine Route
Route::resource('/medicines', MedicinesController::class);
// Route::get('/medicines/{id}', [MedicinesController::class,'show'])->name('medicine.show');

// Order Route
Route::resource('/orders', OrderMedicinesController::class);
Route::get('/change-status/{id}', [OrderMedicinesController::class, 'changeStatus']);
Route::get('/cancelled/{id}', [OrderMedicinesController::class, 'cancelled']);

// Cart Route
Route::resource('/carts', CartsController::class);


// Customers Route
Route::resource('/customers', CustomersController::class);

// Change Password Route
Route::resource('/change', ChangePasswordController::class);

// Admin Route 
Route::resource('/pharmacies', AdminsController::class);


Route::resource('/pharmacy_users', PharmacyCustomersController::class);

