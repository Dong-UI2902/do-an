<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:250|required',
            'password' => 'nullable|string|min:8|max:30|confirmed',
            'email' => [
                'required',
                'string',
                'email',
                'max:250',
                Rule::unique('users')->ignore(Auth::id()),

            ],
            'phone' => [
                'nullable',
                'string',
                'regex:/^[0-9]{10}$/',
                Rule::unique('users')->ignore(Auth::id()),

            ],
            'address' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ];
    }
}
