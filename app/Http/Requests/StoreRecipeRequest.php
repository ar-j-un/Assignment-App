<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'recipe_name' => 'required|string|max:255',
            'recipe_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'cooking_time' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'additional_notes' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'recipe_name.required' => 'Please provide a recipe name.',
            'recipe_name.max' => 'Recipe name should not exceed 255 characters.',
            'recipe_image.required' => 'An image of your recipe is required.',
            'recipe_image.max' => 'The recipe image cannot be larger than 2MB.',
            'recipe_image.mimes' => 'The recipe image must be a file of type: jpeg, png, jpg, or webp.',
            'cooking_time.required' => 'Please estimate how long this takes to cook.',
            'ingredients.required' => 'Don\'t forget the ingredients!',
            'steps.required' => 'Please provide step-by-step cooking instructions.',
        ];
    }
}
