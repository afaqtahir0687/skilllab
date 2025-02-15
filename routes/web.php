<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StripeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
});

Route::get('verify/{id}', [EmailVerifyController::class, 'verifyEmail']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.save');

    Route::get('logout', 'logout')->name('logout');

});


Route::middleware(['verified','auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(AuthController::class)->group(function () {
        Route::get('profile', 'profile')->name('profile');
        Route::get('editprofile/{id}', 'profile')->name('edit.profile');
        Route::post('updateprofile/{id}', 'updateprofile')->name('update.profile');
    });
        
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('index', 'index')->name('category.index');
        Route::post('store', 'store')->name('category.store');
        Route::get('edit/{id}', 'edit')->name('category.edit');
        Route::post('update/{id}', 'update')->name('category.update');
        Route::delete('delete/{id}', 'destroy')->name('category.destroy');
    });

    Route::controller(BrandController::class)->prefix('brands')->group(function () {
        Route::get('create', 'create')->name('brands.create');
        Route::post('store', 'store')->name('brands.store');
        Route::get('index', 'index')->name('brands.index');
        Route::get('edit/{id}', 'edit')->name('brands.edit');
        Route::post('update/{id}', 'update')->name('brands.update');
        Route::delete('delete/{id}', 'destroy')->name('brands.destroy');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('index', 'index')->name('products.index');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::post('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

        //******/ stripe payment ******//
        Route::get('payment-link/{id}', [StripeController::class, 'pay'])->name('pay');
        Route::get('payment-link-stripe/{id}', [StripeController::class, 'paystripe'])->name('paystripe');
        Route::post('payment-link-paypal/{id}', [StripeController::class, 'paystripestore'])->name('paypalstore');

});
