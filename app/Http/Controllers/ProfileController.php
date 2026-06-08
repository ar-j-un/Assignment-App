<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the Profile Page.
     */
    public function view(Request $request): View
    {
        return view('portal.profile', [
            'user' => $request->user(),
        ]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {

        $user = $request->user();
        $validated = $request->validated();
        $oldImage = $user->profile_image_path;

        try {
            if ($request->hasFile('profile_image_path')) {
                $validated['profile_image_path'] = $request->file('profile_image_path')->store('profile_images', 'public');
            }
            $user->update($validated);
            if ($request->hasFile('profile_image_path') && $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            return redirect()->route('profile')->with('success', 'Profile updated successfully!');

        } catch (Exception $err) {
            Log::error('Profile Update Failed: '.$err->getMessage());
            if (isset($validated['profile_image_path']) && $request->hasFile('profile_image_path')) {
                Storage::disk('public')->delete($validated['profile_image_path']);
            }

            return redirect()->back()->withInput()->with('error', 'Something went wrong while updating your profile. Please try again.');
        }
    }
}
