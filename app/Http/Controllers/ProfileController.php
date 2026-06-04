<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the Profile Page.
     */
    public function show(Request $request)
    {
        return view('portal.profile', [
            'user' => $request->user(),
        ]);
    }
}
