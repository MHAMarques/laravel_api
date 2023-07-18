<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:120', 'min: 7'],
            'first_name' => ['required', 'max:120', 'min: 2'],
            'last_name' => ['required', 'max:120', 'min: 2'],
            'city' => ['required', 'max:120', 'min: 2'],
            'country' => ['required', 'max:120', 'min: 2'],
            'password' => ['required', 'min:6', 'max:120'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not valid.',
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password minimum length is 6.',
            'city.required' => 'City is required.',
            'country.required' => 'Country is required.',
        ];
    }
}
