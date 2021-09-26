<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ThirdPartyLoginController;
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
})->name('admin.dashboard');

//TODO Front end route
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/user-logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/user-update', [UserController::class, 'update'])->name('user.update');
Route::get('/user-edit-password', [UserController::class, 'editpassword'])->name('user.edit.password');
Route::post('/user-update-password', [UserController::class, 'updatepassword'])->name('user.update.password');

//TODO Thired party login controller
Route::get('/login/google', [ThirdPartyLoginController::class, 'googleLogin'])->name('login.google');
Route::get('/google/callback', [ThirdPartyLoginController::class, 'googleCallback']);

Route::get('/login/facebook', [ThirdPartyLoginController::class, 'facebookLogin'])->name('login.facebook');
Route::get('/facebook/callback', [ThirdPartyLoginController::class, 'facebookCallback']);

Route::get('/login/github', [ThirdPartyLoginController::class, 'githubLogin'])->name('login.github');
Route::get('/github/callback', [ThirdPartyLoginController::class, 'githubCallback']);

//TODO backend functionallity
//TODO Brand Route
Route::group(['prefix' => 'brand'], function () {
    Route::get('/all', [BrandController::class, 'all'])->name('all.brand');
    Route::get('/add', [BrandController::class, 'add'])->name('add.brand');
    Route::post('/store', [BrandController::class, 'store'])->name('store.brand');
});
