<?php

namespace App\Http\Controllers\Api\Payments;

use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Requests\Payments\PaymentRequest;
use App\Models\Order;

class BrainTreeController extends Controller
{
    //Generazione del token per autorizzare il pagamento
    public function generate(Request $request)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        return response()->json($data, 200);
    }


    public function makePayment(PaymentRequest $request)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);


        $result = $gateway->transaction()->sale([
            'amount' => $request['paymentData']['amount'],
            'paymentMethodNonce' => $request['paymentData']['nonce'],
            'options' => [
                'submitForSettlement' => true,
            ]
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
            return response()->json($result, 401);
        }
    }
}
