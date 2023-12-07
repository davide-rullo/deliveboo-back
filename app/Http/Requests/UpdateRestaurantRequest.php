<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // $user = Auth::user();
        // $requestedUserId = $this->input('user_id');
        // return $user->id == $requestedUserId;
        return Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => ['required', 'bail', 'min:3', 'max:50', Rule::unique('restaurants')->ignore($this->restaurant)],
            'address' => ['nullable'],
            'user_id' => ['nullable', 'exists:users,id'],
            'vat_number' => ['nullable', 'min:11', 'max:16'],
            'logo' => ['nullable', 'image', 'max:500', 'mimes:png,jpg,webp'],
            'phone' => ['nullable']
        ];
    }
}
