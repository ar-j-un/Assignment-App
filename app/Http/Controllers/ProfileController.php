<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
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

    public function update(UpdateProfileRequest $request)
    {

        $request->user()->update($request->validated());

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
