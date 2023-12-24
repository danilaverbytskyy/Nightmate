<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DreamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');


Route::get('/admin', [DashboardController::class, 'index']);

Route::group(['prefix' => '/admin/dreams'], function () {
    Route::get('/', [DreamController::class, 'index'])->name('admin.dreams.index');
    Route::get('/create', [DreamController::class, 'create'])->name('admin.dreams.create');
    Route::post('/store', [DreamController::class, 'store'])->name('admin.dreams.store');
    Route::put('/update/{id}', [DreamController::class, 'update'])->name('admin.dreams.update');
    Route::get('/edit/{id}', [DreamController::class, 'edit'])->name('admin.dreams.edit');
    Route::delete('/destroy/{id}', [DreamController::class, 'destroy'])->name('admin.dreams.destroy');
    Route::get('/show/{id}', [DreamController::class, 'show'])->name('admin.dreams.show');
});

Route::group(['prefix' => '/admin/categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
});

Route::group(['prefix' => '/admin/users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('admin.users.show');
});

Route::get('/sign-up', [RegistrationController::class, 'signUp'])->name('pages.sign-up');
Route::get('/log-in', [RegistrationController::class, 'logIn'])->name('pages.log-in');
Route::post('/store', [RegistrationController::class, 'store'])->name('pages.store');
Route::get('/enter', [RegistrationController::class, 'enter'])->name('pages.enter');
