<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MpesaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::controller(RegisterController::class)->group(function () {
    // Your routes here
    Route::get('/register', 'view');
    Route::post('/register', 'store')->name('register');
});

Route::controller(LoginController::class)->group(function () {
    // Your routes here
    Route::get('/login', 'view')->name('login');
    Route::post('/login', 'login')->name('login');
});

// logout route
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/logout', [LogoutController::class, 'logout']);



Route::group(['middleware' => 'checkRole:user'], function () {
    // Routes accessible only by users with the 'admin' role
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/show-apartment/{apart}', [HomeController::class, 'show'])->name('show-apartment');
    Route::get('/book-room/{bk}', [HomeController::class, 'book'])->name('book');
    Route::post('/pay', [MpesaController::class, 'initiateStkPush'])->name('pay');
});

Route::group(['middleware' => 'checkRole:admin'], function () {
    // Routes accessible only by users with the 'user' role
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // add apartment
    Route::get('/add-apartment', [DashboardController::class, 'viewApartment'])->name('view-apartment');
    Route::post('/add-apartment', [DashboardController::class, 'addApartment'])->name('add-apartment');

    // add each room detail
    Route::get('/add-room-details', [DashboardController::class, 'viewRoom'])->name('view-room');
    Route::post('/add-room-details', [DashboardController::class, 'addRoom'])->name('add-room');

    // show room details
    Route::get('/show-rooms-details', [DashboardController::class, 'showDetails'])->name('show-rooms');

    // Route to view the cow form
    Route::get('/add-cow', [DashboardController::class, 'viewCow'])->name('view-cow');

    // Route to handle cow data submission
    Route::post('/add-cow', [DashboardController::class, 'addCow'])->name('add-cow');

    //route to handle display of cow info
    Route::get('/cows', [DashboardController::class, 'showCows'])->name('showCows');

    //route to edit cow details
    Route::get('/cows/edit/{id}', [DashboardController::class, 'edit'])->name('edit-cow');
    Route::put('/cows/update/{id}', [DashboardController::class, 'update'])->name('update-cow');


    //route to delete cows
    Route::delete('/cows/delete/{id}', [DashboardController::class, 'destroy'])->name('delete-cow');

    //route to show users
    Route::get('/show-users', [DashboardController::class, 'showUsers'])->name('showUsers');

    //route to edit users
    Route::get('/edit-user/{id}', [DashboardController::class, 'editUser'])->name('editUser');
    Route::put('/update-user/{id}', [DashboardController::class, 'updateUser'])->name('updateUser');




});