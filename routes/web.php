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
        Route::post('/adddept', [DashboardController::class, 'addDept'])->name('add-dept')->middleware('auth:web');
        Route::post('/addrank', [DashboardController::class, 'addRank'])->name('add-rank')->middleware('auth:web');
        Route::post('/addDoc', [DashboardController::class, 'addDoc'])->name('add-doc')->middleware('auth:web');
        Route::post('/addDirectory', [DashboardController::class, 'addDirectory'])->name('add-directory')->middleware('auth:web');
        Route::post('/addReport', [DashboardController::class, 'addReport'])->name('add-report')->middleware('auth:web');
        Route::post('/addLeave', [DashboardController::class, 'addLeave'])->name('add-leave')->middleware('auth:web');
        Route::post('/addBlog', [DashboardController::class, 'addBlog'])->name('add-blog')->middleware('auth:web');
        Route::post('/addStaff', [DashboardController::class, 'addStaff'])->name('add-staff')->middleware('auth:web');
        Route::patch('/editprofile', [DashboardController::class, 'editProfile'])->name('edit-profile')->middleware('auth:web');

        //Dept
        Route::get('/dept', [DashboardController::class, 'dept'])->name('dept')->middleware('auth:web');
        Route::get('/dept/{dept}/edit', [DashboardController::class, 'editdept'])->name('dept-edit')->middleware('auth:web');
        Route::patch('/dept/{dept}/update', [DashboardController::class, 'updatedept'])->name('dept-update')->middleware('auth:web');
        Route::delete('/dept/{dept}', [DashboardController::class, 'deletedept'])->name('dept-delete')->middleware('auth:web');

        //Rank
        Route::get('/rank', [DashboardController::class, 'rank'])->name('rank')->middleware('auth:web');
        Route::get('/rank/{rank}/edit', [DashboardController::class, 'editrank'])->name('rank-edit')->middleware('auth:web');
        Route::patch('/rank/{rank}/update', [DashboardController::class, 'updaterank'])->name('rank-update')->middleware('auth:web');
        Route::delete('/rank/{rank}', [DashboardController::class, 'deleterank'])->name('rank-delete')->middleware('auth:web');

        //Directory
        Route::get('/directory', [DashboardController::class, 'directory'])->name('directory')->middleware('auth:web');
        Route::get('/directory/{directory}/edit', [DashboardController::class, 'editdirectory'])->name('directory-edit')->middleware('auth:web');
        Route::patch('/directory/{directory}/update', [DashboardController::class, 'updatedirectory'])->name('directory-update')->middleware('auth:web');
        Route::delete('/directory/{directory}', [DashboardController::class, 'deletedirectory'])->name('directory-delete')->middleware('auth:web');

        //Document
        Route::get('/doc', [DashboardController::class, 'doc'])->name('doc')->middleware('auth:web');
        Route::get('/doc/{doc}/edit', [DashboardController::class, 'editdoc'])->name('doc-edit')->middleware('auth:web');
        Route::patch('/doc/{doc}/update', [DashboardController::class, 'updatedoc'])->name('doc-update')->middleware('auth:web');
        Route::delete('/doc/{doc}', [DashboardController::class, 'deletedoc'])->name('doc-delete')->middleware('auth:web');

        //Report
        Route::get('/report', [DashboardController::class, 'report'])->name('report')->middleware('auth:web');
        Route::get('/report/{report}/edit', [DashboardController::class, 'editreport'])->name('report-edit')->middleware('auth:web');
        Route::patch('/report/{report}/update', [DashboardController::class, 'updatereport'])->name('report-update')->middleware('auth:web');
        Route::delete('/report/{report}', [DashboardController::class, 'deletereport'])->name('report-delete')->middleware('auth:web');

        //Leave
        Route::get('/leave', [DashboardController::class, 'leave'])->name('leave')->middleware('auth:web');
        Route::post('/leave/approve', [DashboardController::class, 'approveleave'])->name('leave-approve')->middleware('auth:web');
        Route::post('/leave/reject', [DashboardController::class, 'rejectleave'])->name('leave-reject')->middleware('auth:web');
        Route::get('/leave/{leave}/edit', [DashboardController::class, 'editleave'])->name('leave-edit')->middleware('auth:web');
        Route::patch('/leave/{leave}/update', [DashboardController::class, 'updateleave'])->name('leave-update')->middleware('auth:web');
        Route::delete('/leave/{leave}', [DashboardController::class, 'deleteleave'])->name('leave-delete')->middleware('auth:web'); 

        //Blog
        Route::get('/blog', [DashboardController::class, 'blog'])->name('blog')->middleware('auth:web');
        Route::post('ckeditor/upload', [DashboardController::class, 'uploadImage'])->name('ckeditor.image-upload')->middleware('auth:web');
        Route::get('/blog/{blog}/edit', [DashboardController::class, 'editblog'])->name('blog-edit')->middleware('auth:web');
        Route::get('/blog/{blog}', [DashboardController::class, 'blogshow'])->name('blog-show')->middleware('auth:web');
        Route::patch('/blog/{blog}/update', [DashboardController::class, 'updateblog'])->name('blog-update')->middleware('auth:web');
        Route::delete('/blog/{blog}', [DashboardController::class, 'deleteblog'])->name('blog-delete')->middleware('auth:web');
        
        //Staff Section
        Route::get('/staff', [DashboardController::class, 'staff'])->name('dashboard-staff')->middleware('auth:web');
        Route::get('/staff/{staff}/edit', [DashboardController::class, 'editstaff'])->name('staff-edit')->middleware('auth:web');
        Route::patch('/staff/{staff}/update', [DashboardController::class, 'updatestaff'])->name('staff-update')->middleware('auth:web');
        Route::delete('/staff/{staff}', [DashboardController::class, 'deletestaff'])->name('staff-delete')->middleware('auth:web');
        Route::post('/resetpasswordstaff/{staff}', [DashboardController::class, 'resetstaffpassword'])->name('staff-reset-password')->middleware('auth:web');
        
    });