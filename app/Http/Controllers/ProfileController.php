<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $user = $request->user();
        $validated = $request->validated();

        if ($request->hasFile('profile_image_path')) {

            if ($user->profile_image_path && Storage::disk('public')->exists($user->profile_image_path)) {
                Storage::disk('public')->delete($user->profile_image_path);
            }

            $path = $request->file('profile_image_path')->store('profile_images', 'public');

            $validated['profile_image_path'] = $path;
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');

    }
}
