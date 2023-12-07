<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlatesRequest extends FormRequest
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
            'name' => ['required', 'bail', 'min:3', 'max:50'],
            'description' => ['nullable'],
            'ingredients' => ['nullable'],
            'cover_image' => ['nullable', 'image', 'max:500', 'mimes:png,jpg,webp'],
            'price' => ['required'],
            'is_available' => ['nullable'],
        ];
    }
}
