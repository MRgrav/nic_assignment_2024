<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchemeController;

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
    return view('test');
});

// AuthController routes
Route::controller(AuthController::class)->group( function () {
    Route::get('/login', 'login_view')->name('login');
    Route::post('/login', 'login')->name('new-login');
    Route::get('/registration', 'registration_view')->name('registration');
    Route::post('/registration', 'registration')->name('new-registration');
});

// SchemeController routes
Route::controller(SchemeController::class)->group( function() {
    Route::get('/schemes', 'index')->name('all-schemes');
});