<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DreamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/admin', [DashboardController::class, 'index']);
Route::get('/admin/dreams', [DreamController::class, 'index'])->name('admin.dreams.index');
Route::get('/admin/dreams/create', [DreamController::class, 'create'])->name('admin.dreams.create');
Route::post('/admin/dreams/store', [DreamController::class, 'store'])->name('admin.dreams.store');

Route::get('/sign-up', [RegistrationController::class, 'signUp'])->name('auth.sign-up');
Route::get('/log-in', [RegistrationController::class, 'logIn'])->name('auth.log-in');
Route::post('/store', [RegistrationController::class, 'store'])->name('auth.store');
Route::get('/enter', [RegistrationController::class, 'enter'])->name('auth.enter');
