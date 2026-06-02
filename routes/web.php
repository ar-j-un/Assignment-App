<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portal.dashboard');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register']);

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
