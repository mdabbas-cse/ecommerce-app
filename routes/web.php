<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// TODO Admin
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']],  function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.store');
});
Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile', [AdminProfileController::class, 'show'])->name('admin.profile');
Route::get('admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('admin/edit/password', [AdminProfileController::class, 'passwordEdit'])->name('admin.edit.password');
Route::post('admin/update/password', [AdminProfileController::class, 'passwordUpdate'])->name('admin.update.password');

Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
