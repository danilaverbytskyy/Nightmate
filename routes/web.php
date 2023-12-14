<?php

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

Route::get('/', [HomeController::class, 'home']);

Route::get('/sign-up', [RegistrationController::class, 'signUp'])->name('auth.sign-up');
Route::get('/log-in', [RegistrationController::class, 'logIn'])->name('auth.log-in');
Route::post('/store', [RegistrationController::class, 'store'])->name('auth.store');
Route::get('/enter', [RegistrationController::class, 'enter'])->name('auth.enter');
