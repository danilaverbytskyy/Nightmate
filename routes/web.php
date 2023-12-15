<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DreamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');


Route::get('/admin', [DashboardController::class, 'index']);
Route::get('/admin/dreams', [DreamController::class, 'index'])->name('admin.dreams.index');
Route::get('/admin/dreams/create', [DreamController::class, 'create'])->name('admin.dreams.create');
Route::post('/admin/dreams/store', [DreamController::class, 'store'])->name('admin.dreams.store');
Route::put('/admin/dreams/update/{id}', [DreamController::class, 'update'])->name('admin.dreams.update');
Route::get('/admin/dreams/edit/{id}', [DreamController::class, 'edit'])->name('admin.dreams.edit');
Route::delete('/admin/dreams/destroy/{id}', [DreamController::class, 'destroy'])->name('admin.dreams.destroy');
Route::get('/admin/dreams/show/{id}', [DreamController::class, 'show'])->name('admin.dreams.show');


Route::get('/sign-up', [RegistrationController::class, 'signUp'])->name('auth.sign-up');
Route::get('/log-in', [RegistrationController::class, 'logIn'])->name('auth.log-in');
Route::post('/store', [RegistrationController::class, 'store'])->name('auth.store');
Route::get('/enter', [RegistrationController::class, 'enter'])->name('auth.enter');
