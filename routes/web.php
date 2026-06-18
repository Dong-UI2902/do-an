<?php

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('manager')->group(function () {

    Route::get('/', function () {
        return redirect('/manager/dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/profile', [UserController::class, 'edit']);
    Route::put('/profile', [UserController::class, 'update']);

    Route::get('/country', [CountryController::class, 'index']);
    Route::get('/country/create', [CountryController::class, 'create']);
    Route::post('/country', [CountryController::class, 'store']);
    Route::delete('/country/{id}', [CountryController::class, 'destroy']);

    Route::resource('/blog', BlogController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
