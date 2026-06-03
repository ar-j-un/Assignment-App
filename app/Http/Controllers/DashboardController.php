<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     * The __invoke method is automatically called by Laravel when this controller is routed.
     */
    public function __invoke()
    {
        $user = Auth::user();

        return view('portal.dashboard', compact('user'));
    }
}
