<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Models\Recipe;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function create(): View
    {
        return view('portal.recipes.create');
    }

    public function store(StoreRecipeRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            if ($request->hasFile('recipe_image')) {
                $validated['recipe_image_path'] = $request->file('recipe_image')->store('recipe_images', 'public');
            }
            Recipe::create($validated);

            return redirect()->back()->with('success', 'Recipe created successfully!');
        } catch (Exception $err) {
            Log::error('Recipe Creation Failed: '.$err->getMessage());
            if (isset($validated['recipe_image_path']) && Storage::disk('public')->exists($validated['recipe_image_path'])) {
                Storage::disk('public')->delete($validated['recipe_image_path']);
            }

            return redirect()->back()->withInput()
                ->with('error', 'Something went wrong while saving your recipe. Please try again.');
        }
    }
}
