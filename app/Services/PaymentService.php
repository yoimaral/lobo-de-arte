<?php

namespace App\Http\Services;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function handlePayment()
    {
        $response = Http::POST(url('https://test.placetopay.com/redirection/api/session'), [
            'auth' => $this->getCredentials(),
            'payment' => [
                'reference' => '2020sep30013859',
                'description' => 'Cuadro de la cosa',
                'amount' => [
                    'currency' => 'COP',
                    'total' => '50000',
                ],
            ],
            'expiration' => date('c', strtotime('+1 hour')),
            'returnUrl' => 'http://127.0.0.1:8000',
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'PlacetoPay Sandbox',
        ]);

        return $response->json();
    }

    public function getRequestInformation($requestId)
    {
        $response = Http::post('https://test.placetopay.com/redirection/api/session/' . $requestId, [
            'auth' => $this->getCredentials()
        ]);

        return $response->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function getCredentials()
    {
        $login = '6dd490faf9cb87a9862245da41170ff2';
        $secretKey = '024h1IlD';
        $seed = date('c');
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }

        $nonceBase64 = base64_encode($nonce);

        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));

        return [

            'login' => $login,
            'seed' => $seed,
            'nonce' => $nonceBase64,
            'tranKey' => $tranKey,

        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
