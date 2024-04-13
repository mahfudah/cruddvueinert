<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/login',[LoginController::class,'index']);
Route::get('/users',[UsersController::class,'index'])->name('users');
Route::get('/users/tambah',[UsersController::class,'create'])->name('users.create');
Route::post('/users',[UsersController::class,'store'])->name('users.store');
Route::get('/users/detail/{id}',[UsersController::class,'show'])->name('users.detail');
Route::delete('/users/{id}', [UsersController::class, 'destroy']);
