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

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::prefix('project')->group(function() {
        Route::post('/', [\App\Http\Controllers\ProjectController::class, 'create'])->name('create');
        Route::get('/', [\App\Http\Controllers\ProjectController::class, 'index'])->name('index');
    });

    Route::prefix('sprint')->group(function() {
        Route::get('/', [\App\Http\Controllers\SprintController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\SprintController::class, 'create'])->name('create');
    });

    Route::prefix('backlog')->group(function() {
        Route::get('/', [\App\Http\Controllers\BacklogController::class, 'index'])->name('index');
    });

    Route::prefix('task')->group(function() {
        Route::post('/', [\App\Http\Controllers\TaskController::class, 'create'])->name('create');
        Route::get('/', [\App\Http\Controllers\TaskController::class, 'index'])->name('index');
        Route::get('/{id}', [\App\Http\Controllers\TaskController::class, 'show'])->where(['id' => '[0-9]+'])->name('show');
        Route::put('/{id}', [\App\Http\Controllers\TaskController::class, 'update'])->where(['id' => '[0-9]+'])->name('update');
        Route::get('/statuses', [\App\Http\Controllers\TaskController::class, 'statuses'])->name('statuses');
        Route::get('/types', [\App\Http\Controllers\TaskController::class, 'types'])->name('types');
    });
});


Route::prefix('test')->name('test')->group(function () {
    Route::get('/', [\App\Http\Controllers\Controller::class, 'index'])->name('index');
    Route::post('/', [\App\Http\Controllers\Controller::class, 'create'])->name('create');
});
