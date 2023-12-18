<?php

namespace App\Http\Requests\Payments;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'paymentData.nonce' => 'required',
            'paymentData.amount' => 'required',
            'order.customer_name' => ['required', 'string'],
            'order.customer_email' => ['required', 'string'],
            'order.customer_phone' => ['required'],
            'order.customer_address' => ['required'],
            'order.tot_price' => ['required'],
            'order.restaurant_id' => ['required'],
        ];
    }
}
