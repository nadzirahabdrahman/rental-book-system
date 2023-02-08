<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
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

Route::get('/', [PublicController::class, 'index']);

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

    Route::get('profile', [UserController::class, 'profile'])
    ->middleware('client');


    //for ADMIN only
    Route::middleware('admin')->group(function() {

        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('book', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);//redirect to Add new book page
        Route::post('book-add', [BookController::class, 'store']);//SAVE button at book-add page
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);//redirect to Edit book page
        Route::post('book-edit/{slug}', [BookController::class, 'update']);//UPDATE button at book-edit page
        Route::get('book-delete/{slug}', [BookController::class, 'delete']);//redirect to book delete confirmation page
        Route::get('book-destroy/{slug}', [BookController::class, 'destroy']);// DELETE button at book-delete page
        Route::get('book-deleted-list', [BookController::class, 'deleted']);//redirect to book-deleted-list
        Route::get('book-restore/{slug}', [BookController::class, 'restore']); //RESTORE button

        Route::get('category', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']); //redirect to Add new category page
        Route::post('category-add', [CategoryController::class, 'store']); //SAVE button at category-add page
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);//redirect to Edit category page
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']); //UPDATE button at category-edit page
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']); //redirect to category delete confirmation page
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']); // DELETE button at category-delete page
        Route::get('category-deleted-list', [CategoryController::class, 'deleted']); //redirect to category-deleted-list
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']); //RESTORE button
        
        Route::get('user', [UserController::class, 'index']); //VIEW active users
        Route::get('user-registered', [UserController::class, 'registered']);//VIEW inactive users
        Route::get('user-detail/{slug}', [UserController::class, 'detail']); //redirect to user-detail page
        Route::get('user-approve/{slug}', [UserController::class, 'approve']); //APPROVE USER button at user-detail/{slug}
        Route::get('user-delete/{slug}', [UserController::class, 'delete']);//redirect to user delete confirmation page
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);// DELETE button at user-delete page
        Route::get('user-deleted-list', [UserController::class, 'deleted']);//redirect to user-deleted-list
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);//RESTORE button

        Route::get('book-rent', [BookRentController::class, 'index']);
        Route::post('book-rent', [BookRentController::class, 'store']);

    });

    Route::get('rent-log', [RentLogController::class, 'index']);

});



