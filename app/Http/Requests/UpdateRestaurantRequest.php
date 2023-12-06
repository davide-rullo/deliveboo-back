<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        $requestedUserId = $this->input('user_id');
        return $user->id == $requestedUserId;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => ['required', 'bail', 'min:3', 'max:50', 'unique:restaurants'],
            'address' => ['nullable'],
            'user_id' => ['nullable', 'exists:users,id'],
            'vat_number' => ['nullable', 'min:9', 'max:20'],
            'logo' => ['nullable', 'image', 'max:500', 'mimes:png,jpg'],
            'phone' => ['nullable']
        ];
    }
}
