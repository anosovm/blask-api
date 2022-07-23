<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::prefix('auth')->group(function () {
//    Route::post('/', [\App\Http\Controllers\AuthController::class, 'auth'])->name('auth');
    Route::post('/reg', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('test')->name('test')->group(function () {
    Route::get('/', [\App\Http\Controllers\Controller::class, 'index'])->name('index');
    Route::post('/', [\App\Http\Controllers\Controller::class, 'create'])->name('create');
});
