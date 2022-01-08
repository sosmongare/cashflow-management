<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountTypeController;
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

//default route
// Route::get('/', function () {
//     return view('welcome');
// });

// custom routes for login, register , home and logout.

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//Route::get('users',[AuthController::class, 'users'])->name('users');

Route::resource('user', 'UserController');
Route::resource('account','AccountController');
Route::resource('account_type','AccountTypeController');
Route::resource('transaction_category','TransactionCategoryController');
Route::resource('payment_methods','PaymentMethodController');