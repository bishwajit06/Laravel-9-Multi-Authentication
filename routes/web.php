<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;

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
});

//Admin Login

Route::get('/admin/login', [AdminController::class, 'adminLoginView'])->name('admin.login');
Route::post('/admin-login', [AdminController::class, 'adminLogin'])->name('admin.check');


Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>'admin'], function (){
	
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('logout');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
