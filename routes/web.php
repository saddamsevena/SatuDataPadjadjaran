<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Admin
Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('admin.home')->middleware('admin');;
Route::post('/home/admin/makeAdmin/{id}', [App\Http\Controllers\AdminController::class, 'makeAdmin'])->name('completedUpdate');
Route::post('/home/admin/verificateUsers/{id}', [App\Http\Controllers\AdminController::class, 'verificateUsers'])->name('userVerified');
Route::get('/home/admin/deleteUsers/{id}', [App\Http\Controllers\AdminController::class, 'deleteUsers'])->middleware('isAdmin');
Route::post('/home/admin/storeUsers', [App\Http\Controllers\AdminController::class, 'storeUsers'])->middleware('isAdmin');

//Profile
Route::get('/profile/edit/{user}', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update/', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('profile.update');