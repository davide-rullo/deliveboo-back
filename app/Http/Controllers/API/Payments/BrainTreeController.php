<?php

namespace App\Http\Controllers\Api\Payments;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Requests\Payments\PaymentRequest;

class BrainTreeController extends Controller
{
    //Generazione del token per autorizzare il pagamento
    public function generate(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'mtzf6rx8gksx2k3v',
            'publicKey' => 'gbkd3mbpwhp65tp9',
            'privateKey' => '1f572d2f9210c941ba7d9875e960b627'
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
            'paymentMethodNonce' => $request['paymentData']['token'],
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
