<?php

use App\Http\Controllers\Frontend\FrontendController;
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
Route::group(['middleware' => 'auth'] , function (){
    Route::get('/' , [FrontendController::class , 'index'])->name('frontend.index');
    Route::get('/cart' , [FrontendController::class , 'cart'])->name('frontend.cart');
    Route::get('/checkout' , [FrontendController::class , 'checkout'])->name('frontend.checkout');
    Route::get('/detail' , [FrontendController::class , 'detail'])->name('frontend.detail');
    Route::get('/shop' , [FrontendController::class , 'shop'])->name('frontend.shop');
});



Route::get('/admin/login', [\App\Http\Controllers\Backend\BackendController::class , 'login'])->name('admin.login');
Route::get('/admin/forgot-password', [\App\Http\Controllers\Backend\BackendController::class , 'forgot_password'])->name('admin.forgot_password');
Route::get('/admin/index', [\App\Http\Controllers\Backend\BackendController::class , 'index'])->name('admin.index');

require __DIR__.'/auth.php';
