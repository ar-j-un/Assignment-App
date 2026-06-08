<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'age' => 'required|integer|min:18|max:100',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'profile_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:500',
        ];
    }
}
