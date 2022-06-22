<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\GlobalData;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'home'])->name('home');

//Login
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard
    Route::middleware([GlobalData::class])->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-admin')->middleware('auth:web');

        //Create Module
        Route::post('/addcargo', [DashboardController::class, 'addcargo'])->name('add-cargo')->middleware('auth:web');
        Route::post('/addDonation', [DashboardController::class, 'addDonation'])->name('add-donation')->middleware('auth:web');
        Route::post('/addBeneficary', [DashboardController::class, 'addBeneficiary'])->name('add-beneficiary')->middleware('auth:web');
        Route::post('/addStaff', [DashboardController::class, 'addStaff'])->name('add-staff')->middleware('auth:web');
        Route::patch('/editprofile', [DashboardController::class, 'editProfile'])->name('edit-profile')->middleware('auth:web');

        //Cargo
        Route::get('/cargo', [DashboardController::class, 'cargo'])->name('cargo')->middleware('auth:web');
        Route::get('/cargo/{cargo}/edit', [DashboardController::class, 'editcargo'])->name('cargo-edit')->middleware('auth:web');
        Route::patch('/cargo/{cargo}/update', [DashboardController::class, 'updatecargo'])->name('cargo-update')->middleware('auth:web');
        Route::delete('/cargo/{cargo}', [DashboardController::class, 'deletecargo'])->name('cargo-delete')->middleware('auth:web');
        
        //Payment
        Route::get('/payment', [DashboardController::class, 'payment'])->name('payment')->middleware('auth:web');
        Route::post('/viewpayment', [DashboardController::class, 'viewpayment'])->name('view-payment')->middleware('auth:web');

        //Manifest
        Route::get('/manifest', [DashboardController::class, 'manifest'])->name('manifest')->middleware('auth:web');
        Route::post('/viewmanifest', [DashboardController::class, 'viewmanifest'])->name('view-manifest')->middleware('auth:web');

        //Staff Section
        Route::get('/staff', [DashboardController::class, 'staff'])->name('dashboard-staff')->middleware('auth:web');
        Route::get('/staff/{staff}/edit', [DashboardController::class, 'editstaff'])->name('staff-edit')->middleware('auth:web');
        Route::patch('/staff/{staff}/update', [DashboardController::class, 'updatestaff'])->name('staff-update')->middleware('auth:web');
        Route::delete('/staff/{staff}', [DashboardController::class, 'deletestaff'])->name('staff-delete')->middleware('auth:web');
        Route::post('/resetpasswordstaff/{staff}', [DashboardController::class, 'resetstaffpassword'])->name('staff-reset-password')->middleware('auth:web');
        
    });