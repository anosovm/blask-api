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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('test')->name('test')->group(function () {
    Route::get('/', [\App\Http\Controllers\Controller::class, 'lol'])->name('lol');
    Route::post('/', [\App\Http\Controllers\Controller::class, 'kek'])->name('kek');
});
