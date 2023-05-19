<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DataMasukController;
use App\Models\User;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'authenticate']);
});


Route::middleware(['auth', 'cekRole:Admin'])->group(function () {
    // logout
    Route::get('/logout', [LoginController::class, 'logout']);

    // dashboard
    Route::get('/home', [HomeController::class, 'index']);

    // input data
    Route::get('/input', [DataController::class, 'index']);
    Route::post('/input', [DataController::class, 'store']);
    Route::get('/input-dok-masuk', [DataMasukController::class, 'index']);
    Route::post('/input-dok-masuk', [DataMasukController::class, 'store']);

    // users
    Route::get('/users', [UserController::class, 'index']);
    // add user
    Route::get('/add-users', [UserController::class, 'addUser']);
    Route::post('/add-users', [UserController::class, 'store']);
    // delete data user
    Route::delete('/delete-users/{id}', [UserController::class, 'destroy']);
    // edit data user
    Route::get('/users-{id}', [UserController::class, 'edit']);
    // Update data user
    Route::put('/users-{id}', [UserController::class, 'update']);

    // datas
    Route::get('/datas', [DataController::class, 'datas']);
    Route::get('/datas-masuk', [DataMasukController::class, 'show']);
    // Delete data
    Route::delete('/datas-masuk/{id}', [DataMasukController::class, 'destroy']);
    Route::delete('/datas/{id}', [DataController::class, 'destroy']);
    // edit data
    Route::get('/edit-arsip-keluar-{id}', [DataController::class, 'edit']);
    Route::get('/edit-arsip-masuk-{id}', [DataMasukController::class, 'edit']);

    // Update data arsip
    Route::put('/datas-masuk-{id}', [DataMasukController::class, 'update']);
    Route::put('/datas-{id}', [DataController::class, 'update']);
});

Route::middleware(['auth', 'cekRole:Admin,Staf'])->group(function () {
    // logout
    Route::get('/logout', [LoginController::class, 'logout']);

    // dashboard
    Route::get('/home', [HomeController::class, 'index']);

    // input data
    Route::get('/input', [DataController::class, 'index']);
    Route::post('/input', [DataController::class, 'store']);
    Route::get('/input-dok-masuk', [DataMasukController::class, 'index']);
    Route::post('/input-dok-masuk', [DataMasukController::class, 'store']);

    // datas
    Route::get('/datas', [DataController::class, 'datas']);
});
