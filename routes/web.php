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

// AuthController routes
Route::controller(AuthController::class)->group( function () {
    Route::get('/login', 'login_view')->name('login');
    Route::post('/login', 'login')->name('new-login')->middleware('throttle: 10,1');
    Route::get('/registration', 'registration_view')->name('registration');
    Route::post('/registration', 'registration')->name('new-registration');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('test');
    })->name('home');

   // SchemeController routes
    Route::controller(SchemeController::class)->group( function() {
        Route::get('/schemes', 'index')->name('all-schemes');
        Route::get('/schemes/export', 'export')->name('export-schemes');
        Route::post('/schemes/import', 'import')->name('import-schemes');
    }); 
});