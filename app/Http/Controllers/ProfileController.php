<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $oldImagePath = $user->profile_image_path;
        $newImagePath = null;

        try {
            DB::beginTransaction();
            if ($request->hasFile('profile_image_path')) {
                $newImagePath = $request->file('profile_image_path')->store('profile_image', 'public');
                $validated['profile_image_path'] = $newImagePath;
            }
            $user->update($validated);
            DB::commit();
            if ($newImagePath && $oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }

            return redirect()->route('profile')->with('success', 'Profile updated successfully!');
        } catch (Exception $err) {
            DB::rollBack();
            Log::error('Profile Update Failed: '.$err->getMessage());
            if ($newImagePath && Storage::disk('public')->exists($newImagePath)) {
                Storage::disk('public')->delete($newImagePath);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong while updating your profile. Please try again.');
        }
    }
}
