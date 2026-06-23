<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');

Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'view'])->name('profile')->middleware('auth');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.index')->can('admin');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->can('admin');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->can('admin');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy')->can('admin');

Route::resource('recipes', RecipeController::class)->middleware('auth');
Route::get('/recipes/{recipe}/comments', [RecipeController::class, 'comments'])->name('recipes.comments')->middleware('auth');
