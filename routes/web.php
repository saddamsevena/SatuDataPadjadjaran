<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

// Page
Auth::routes();
Route::get('/storage', function () {
    Artisan::call('storage:link');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::post('/feedback', [App\Http\Controllers\HomeController::class, 'storeFeedback'])->name('store.feedback');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Data Page
Route::get('/katalog', [App\Http\Controllers\HomeController::class, 'katalog'])->name('katalog.home');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detailview'])->name('katalog.detail');
Route::get('/add-data', [App\Http\Controllers\DataController::class, 'addData'])->name('katalog.add')->middleware('active');
Route::post('/store-data', [App\Http\Controllers\DataController::class, 'storeData'])->name('katalog.store');
Route::get('/editData/{id}', [App\Http\Controllers\DataController::class, 'editData'])->name('edit.data');
Route::post('/updateData/{id}', [App\Http\Controllers\DataController::class, 'updateData'])->name('data.update');
Route::get('/deleteData/{id}', [App\Http\Controllers\DataController::class, 'deleteData']);

// Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('admin.home')->middleware('admin');
Route::post('/home/admin/makeAdmin/{id}', [App\Http\Controllers\AdminController::class, 'makeAdmin'])->name('completedUpdate');
Route::post('/home/admin/verificateUsers/{id}', [App\Http\Controllers\AdminController::class, 'verificateUsers'])->name('userVerified');
Route::post('/home/admin/approvalData/{id}', [App\Http\Controllers\AdminController::class, 'approvalData'])->name('approvalData');
Route::get('/home/admin/deleteUsers/{id}', [App\Http\Controllers\AdminController::class, 'deleteUsers'])->middleware('admin');
Route::post('/home/admin/storeUsers', [App\Http\Controllers\AdminController::class, 'storeUsers'])->middleware('admin');
Route::get('/home/admin/editData/{id}', [App\Http\Controllers\AdminController::class, 'editData'])->name('admin.edit.data');
Route::post('/home/admin/updateData/{id}', [App\Http\Controllers\AdminController::class, 'updateData'])->name('admin.katalog.update');
Route::get('/home/admin/deleteData/{id}', [App\Http\Controllers\AdminController::class, 'deleteData'])->middleware('admin');

//Profile
Route::get('/profile/{user}', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update/', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('profile.update');
