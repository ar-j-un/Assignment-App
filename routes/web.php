<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin.dashboard');
});

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
