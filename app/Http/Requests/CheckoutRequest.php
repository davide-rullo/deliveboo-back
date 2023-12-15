<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'customer_name' => ['required', 'bail', 'min:3', 'max:50'],
            'customer_email' => ['required|email'],
            'customer_address' => ['required'],
            'state' => ['nullable'],
            'data' => ['nullable'],
            'tot_price' => ['required'],
            'restaurant_id' => ['required'],
            'slug' => ['required'],

        ];
    }
}
