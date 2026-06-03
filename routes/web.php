<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class])->name('dashboard');

Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// use App\Http\Controllers\Teams\TeamInvitationController;
// use App\Http\Middleware\EnsureTeamMembership;
// use Illuminate\Support\Facades\Route;

// Route::inertia('/', 'welcome')->name('home');

// Route::prefix('{current_team}')
//     ->middleware(['auth', 'verified', EnsureTeamMembership::class])
//     ->group(function () {
//         Route::inertia('dashboard', 'dashboard')->name('dashboard');
//     });

// Route::middleware(['auth'])->group(function () {
//     Route::get('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])->name('invitations.accept');
// });

// require __DIR__.'/settings.php';
