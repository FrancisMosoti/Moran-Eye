<?php

use App\Http\Controllers\CompanyWorkerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WorkLogController;

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
    Route::get('/register', 'view');
    Route::post('/register', 'store')->name('register');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'view')->name('login');
    Route::post('/login', 'login')->name('login');
});

// Logout route
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/logout', [LogoutController::class, 'logout']);

Route::group(['middleware' => 'checkRole:admin'], function () {


    // Admin-specific routes
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Route to view the cow form
    Route::get('/add-cow', [DashboardController::class, 'viewCow'])->name('view-cow');

    // Route to handle cow data submission
    Route::post('/add-cow', [DashboardController::class, 'addCow'])->name('add-cow');
    

    // Route to edit cow details
    Route::get('/cows/edit/{id}', [DashboardController::class, 'edit'])->name('edit-cow');
    Route::put('/cows/update/{id}', [DashboardController::class, 'update'])->name('update-cow');

    // Route to delete cows
    Route::delete('/cows/delete/{id}', [DashboardController::class, 'destroy'])->name('delete-cow');

    // Route to show users
    Route::get('/show-users', [DashboardController::class, 'showUsers'])->name('showUsers');
    Route::get('/dashboard', [DashboardController::class, 'showUsers'])->name('dashboard');

    // Route to edit users
    Route::get('/edit-user/{id}', [DashboardController::class, 'editUser'])->name('editUser');
    Route::put('/update-user/{id}', [DashboardController::class, 'updateUser'])->name('updateUser');
});

Route::get('/vetdashboard', [DashboardController::class, 'vetdashboard'])->name('vetdashboard');
Route::get('/add-schedule', [VeterinaryController::class, 'schedules'])->name('schedules');

Route::group(['middleware' => 'checkRole:farmer|admin'], function () {
    Route::get('/cows', [DashboardController::class, 'showCows'])->name('showCows');

    Route::get('/customerDashboard', [DashboardController::class, 'customerDashboard'])->name('customerdashboard');

    // Routes to view and search cows
    Route::get('/cows', [DashboardController::class, 'showCows'])->name('showCows');
    Route::get('/search-cows', [DashboardController::class, 'search'])->name('search-cows');
});

Route::group(['middleware' => 'checkRole:company_worker|admin'], function () {

    // Routes accessible by company workers and admins
    Route::get('/company-worker', [CompanyWorkerController::class, 'companyWorker'])->name('company_worker');


    Route::get('/worklogs', [WorkLogController::class, 'index'])->name('worklogs.index');
    Route::get('/worklogs/create', [WorkLogController::class, 'create'])->name('worklogs.create');
    Route::post('/worklogs', [WorkLogController::class, 'store'])->name('worklogs.store');
    // routes/web.php
    Route::post('/company-worker/dataEntryForm', [CompanyWorkerController::class, 'storeDataEntry'])->name('companyWorker.dataEntryForm');
   

});
