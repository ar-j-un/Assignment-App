<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'age' => 'required|integer|min:18|max:100',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'profile_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:500',
        ];
    }

    /**
     * Get the custom validation messages for the defined rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please provide your full name.',
            'name.max' => 'Name should not exceed 200 characters.',
            'phone_number.required' => 'A contact number is required.',
            'phone_number.max' => 'The phone number cannot be longer than 20 characters.',
            'age.required' => 'Please enter your age.',
            'age.integer' => 'Age must be a valid whole number.',
            'age.min' => 'You must be at least 18 years old.',
            'age.max' => 'Age cannot exceed 100 years.',
            'department.required' => 'Please select your department.',
            'designation.required' => 'Please specify your job title or designation.',
            'profile_image_path.image' => 'The uploaded file must be an image.',
            'profile_image_path.mimes' => 'The profile photo must be a file of type: jpeg, png, jpg, or gif.',
            'profile_image_path.max' => 'The profile photo size cannot be larger than 500 KB.',
        ];
    }
}
