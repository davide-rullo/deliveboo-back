<?php

namespace App\Http\Controllers\Api\Payments;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Requests\Payments\PaymentRequest;

class BrainTreeController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }


    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {
        //$product = Order::find($request->order);

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true,
            ]


            /*'price' => $product->price,
            'nonce' => $request->token,*/
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'La transazione è andata a buon fine'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "La transazione è fallita",
            ];
            return response()->json($data, 401);
        }
    }
}
