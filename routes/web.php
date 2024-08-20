<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\VeterinaryController;

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





Route::group(['middleware' => 'checkRole:admin'], function () {

        // vet dashboard
Route::get('/vetdashboard', [DashboardController::class, 'vetdashboard'])->name('vetdashboard');
Route::get('/add-schedule', [VeterinaryController::class, 'schedules'])->name('schedules');
Route::post('/add-schedule', [VeterinaryController::class, 'addSchedule'])->name('schedules.store');


    // Route to view the cow form
    Route::get('/add-cow', [DashboardController::class, 'viewCow'])->name('view-cow');

    // Route to handle cow data submission
    Route::post('/add-cow', [DashboardController::class, 'addCow'])->name('add-cow');
    

    //route to handle display of cow info
    // Route::get('/cows', [DashboardController::class, 'showCows'])->name('showCows');
    // Route::get('/search-cows', [DashboardController::class, 'search'])->name('search-cows');

    //route to edit cow details
    Route::get('/cows/edit/{id}', [DashboardController::class, 'edit'])->name('edit-cow');
    Route::put('/cows/update/{id}', [DashboardController::class, 'update'])->name('update-cow');


    //route to delete cows
    Route::delete('/cows/delete/{id}', [DashboardController::class, 'destroy'])->name('delete-cow');

    //route to show users
    Route::get('/show-users', [DashboardController::class, 'showUsers'])->name('showUsers');
    Route::get('/dashboard', [DashboardController::class, 'showUsers'])->name('dashboard');

    //route to edit users
    Route::get('/edit-user/{id}', [DashboardController::class, 'editUser'])->name('editUser');
    Route::put('/update-user/{id}', [DashboardController::class, 'updateUser'])->name('updateUser');






});






Route::group(['middleware' => 'checkRole:farmer|admin'], function () {
    Route::get('/cows', [DashboardController::class, 'showCows'])->name('showCows');

    Route::get('/customerDashboard', [DashboardController::class, 'customerDashboard'])->name('customerdashboard');
    Route::get('/cows', [DashboardController::class, 'showCows'])->name('showCows');

    Route::get('/search-cows', [DashboardController::class, 'search'])->name('search-cows');





});