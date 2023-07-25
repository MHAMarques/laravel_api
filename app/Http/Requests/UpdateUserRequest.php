<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->id == $this->route('user')->id;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['sometimes', 'max:120', 'min: 2'],
            'last_name' => ['sometimes', 'max:120', 'min: 2'],
            'city' => ['sometimes', 'max:120', 'min: 2'],
            'country' => ['sometimes', 'max:120', 'min: 2'],
            'password' => ['sometimes', 'min:6', 'max:120'],
        ];
    }
}
