<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\clients\HomeController;
use App\Http\Middleware\CheckRoleAdminMiddleware;
use Illuminate\Support\Facades\Route;

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
// Route login
Route::get('login', [AuthController::class, 'formLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'formRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index']);

// Trang danh sách sản phẩm
Route::resource('shop-product', App\Http\Controllers\clients\ShopController::class);


Route::prefix('wp-admin')->as('wp-admin.')->middleware(CheckRoleAdminMiddleware::class)->group(function () {
    // Dashboards
    Route::get('/', function () { return view('admins.dashboards.index');});

    // Route resource quản lý người dùng
    Route::resource('user', App\Http\Controllers\admins\UserController::class);
    // Route location
    Route::put('location/{id}/update', [App\Http\Controllers\admins\LocationController::class,'update'])->name('location.update');
    Route::delete('location/{id}/delete', [App\Http\Controllers\admins\LocationController::class,'destroy'])->name('location.delete');
    // Route Quản lý sản phẩm
    Route::resource('product', App\Http\Controllers\admins\ProductController::class);
    // Route Quản lý danh mục
    Route::resource('category', App\Http\Controllers\admins\CategoryController::class);
    // Route Quản lý đế giày
    Route::resource('sole',App\Http\Controllers\admins\SoleController::class);
    // Route Quản lý chất lượng
    Route::resource('material', App\Http\Controllers\admins\MaterialController::class);
    // Route Quản lý thương hiệu
    Route::resource('trademark', App\Http\Controllers\admins\TrademarkController::class);
    // Route màu sắc;
    Route::resource('color', App\Http\Controllers\admins\ColorController::class);
    // Route size
    Route::resource('size', App\Http\Controllers\admins\SizeController::class);
});