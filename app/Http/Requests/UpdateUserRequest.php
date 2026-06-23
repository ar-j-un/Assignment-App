<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('id');

        return [
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],

            'phone_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('users')->ignore($userId),
            ],

            'age' => 'required|integer|min:18|max:100',
            'department' => 'required|string',
            'designation' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the user name.',
            'name.string' => 'The name must be a valid text value.',
            'name.max' => 'The name may not be greater than 255 characters.',

            'email.required' => 'Please enter an email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'This email address is already in use.',

            'phone_number.required' => 'Please enter a phone number.',
            'phone_number.string' => 'The phone number must be a valid text value.',
            'phone_number.max' => 'The phone number may not be greater than 20 characters.',
            'phone_number.unique' => 'This phone number is already in use.',

            'age.required' => 'Please enter the age.',
            'age.integer' => 'Age must be a valid number.',
            'age.min' => 'The minimum allowed age is 18.',
            'age.max' => 'The maximum allowed age is 100.',

            'department.required' => 'Please select a department.',
            'department.string' => 'The department must be a valid text value.',

            'designation.required' => 'Please enter a designation.',
            'designation.string' => 'The designation must be a valid text value.',
            'designation.max' => 'The designation may not be greater than 255 characters.',
        ];
    }
}
