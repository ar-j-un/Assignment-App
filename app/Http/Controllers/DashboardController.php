<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     * The __invoke method is automatically called by Laravel when this controller is routed.
     */
    public function __invoke(Request $request)
    {

        return view('portal.dashboard', [
            'user' => $request->user(),
        ]);
    }
}
