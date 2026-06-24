<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\ImageService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function __construct(
        private ImageService $imageService
    ) {}
    
    public function create(): View
    {
        return view('portal.recipes.create');
    }

    public function store(StoreRecipeRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            if ($request->hasFile('recipe_image')) {
                  $validated['recipe_image_path'] = $this->imageService->upload($request->file('recipe_image'));
            }
            unset($validated['recipe_image']);
            if (! empty($validated['ingredients'])) {
                $validated['ingredients'] = array_filter(array_map('trim', explode(',', $validated['ingredients'])));
            }
            $request->user()->recipes()->create($validated);

            return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
        } catch (Exception $err) {
            Log::error('Recipe Creation Failed: '.$err->getMessage());
            if (isset($validated['recipe_image_path'])) {
                $this->imageService->delete($validated['recipe_image_path']);
            }

            return redirect()->back()->withInput()
                ->with('error', 'Something went wrong while saving your recipe. Please try again.');
        }
    }

    public function index(Request $request): View
    {
        $recipes = $request->user()->recipes()->latest()->get();

        return view('portal.recipes.index', [
            'recipes' => $recipes,
        ]);
    }

    public function show(Recipe $recipe): View
    {
        Gate::authorize('view', $recipe);

        return view('portal.recipes.show', [
            'recipe' => $recipe,
        ]);
    }

    public function edit(Recipe $recipe): View
    {
        Gate::authorize('update', $recipe);

        return view('portal.recipes.edit', [
            'recipe' => $recipe,
        ]);
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        Gate::authorize('update', $recipe);
        $validated = $request->validated();
        try {
            $validated['ingredients'] = array_filter(array_map('trim', explode(',', $validated['ingredients']))
            );
            if ($request->hasFile('recipe_image')) {
                $newImagePath = $request->file('recipe_image')->store('recipe_images', 'public');
                $validated['recipe_image_path'] = $newImagePath;
                if ($recipe->recipe_image_path &&
                    Storage::disk('public')->exists($recipe->recipe_image_path)) {
                    Storage::disk('public')->delete($recipe->recipe_image_path);
                }
            }
            unset($validated['recipe_image']);
            $recipe->update($validated);

            return redirect()
                ->route('recipes.show', $recipe)
                ->with('success', 'Recipe updated successfully!');
        } catch (Exception $err) {
            Log::error('Recipe Update Failed: '.$err->getMessage());
            if (isset($newImagePath) &&
                Storage::disk('public')->exists($newImagePath)) {
                Storage::disk('public')->delete($newImagePath);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while updating your recipe. Please try again.');
        }
    }

    public function destroy(Recipe $recipe): JsonResponse
    {
        Gate::authorize('delete', $recipe);
        $recipe->delete();

        return response()->json([
            'success' => true,
            'message' => 'Recipe deleted successfully.',
        ]);
    }

    public function comments(Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        $comments = Http::get(
            'https://jsonplaceholder.typicode.com/comments',
            [
                'postId' => $recipe->id,
            ]
        )->json();

        return response()->json($comments);
    }
}
