<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'orderDetail.customer_name' => ['required', 'bail', 'min:3', 'max:50'],
            'orderDetail.customer_email' => ['required'],
            'orderDetail.customer_address' => ['required'],
            'orderDetail.customer_phone' => ['required'],
            'orderDetail.customer_message' => ['nullable'],
            'orderDetail.state' => ['nullable'],
            'orderDetail.data' => ['nullable'],
            'orderDetail.tot_price' => ['required'],
            'orderDetail.restaurant_id' => ['required'],
            'orderDetail.slug' => ['nullable'],
            'orderDetail.items' => ['required', 'array']
        ];
    }
}
