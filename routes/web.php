<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth'); //must login before access homepage, redirect to login page

//for GUEST to access
Route::middleware('guest-only')->group(function() {

    //name('login)->refer to Authenticate file in Middleware
    Route::get('login', [AuthController::class, 'login'])->name('login');

    Route::post('login', [AuthController::class, 'authenticating']);

    //for SIGN UP BUTTON at login page
    Route::get('signup', [AuthController::class, 'signup']);

    //for SIGN UP BUTTON during signUp process
    Route::post('signup', [AuthController::class, 'signupProcess']);

});

//for LOGGED IN USERS
Route::middleware('auth')->group(function() {

    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware('admin');

    Route::get('profile', [UserController::class, 'profile'])
    ->middleware('client');

    Route::get('books', [BookController::class, 'index']);

});



