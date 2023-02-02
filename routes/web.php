<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
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

    Route::get('book', [BookController::class, 'index']);

    Route::get('category', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'add']); //redirect to Add new category page
    Route::post('category-add', [CategoryController::class, 'store']); //SAVE button at category-add page
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);//redirect to Edit category page
    Route::put('category-edit/{slug}', [CategoryController::class, 'update']); //UPDATE button at category-edit page
    Route::get('category-delete/{slug}', [CategoryController::class, 'delete']); //redirect to delete confirmation page
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']); // DELETE button at category-delete page
    Route::get('category-deleted-list', [CategoryController::class, 'deleted']); //redirect to category-deleted-list
    Route::get('category-restore/{slug}', [CategoryController::class, 'restore']); //RESTORE button
    
    Route::get('user', [UserController::class, 'index']);

    Route::get('rent-log', [RentLogController::class, 'index']);

});



