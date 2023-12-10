<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('roles', [RoleController::class , 'list'])->name('user-roles');

Route::get('users', [UserController::class , 'list'])->name('user-list');
Route::get('user/{id}', [UserController::class , 'show'])->name('user-show');
Route::put('user/{id}', [UserController::class , 'update'])->name('user-update');
Route::post('user', [UserController::class , 'create'])->name('create-user');
