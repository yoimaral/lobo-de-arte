<?php

namespace App\Services;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    public const P2P_APROBADO = 'APPROVED';
    public const P2P_RECHAZADO = 'REJECTED';
    public const P2P_PENDIENTE = 'PENDING';

    protected $endpointBase;
    protected $login;
    protected $secretKey;

    public function __construct()
    {
    $this->endpointBase = config('services.placetopay.endpoint_base');
    $this->login = config('services.placetopay.login');
    $this->secretKey = config('services.placetopay.secret_key');

    }

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
    public function handlePayment(Order $order, Request $request)
    {
        $response = Http::POST(url($this->endpointBase . '/api/session'), [
            'auth' => $this->getCredentials(),
            'payment' => [
                'reference' => $order->id,
                'description' => $request->texTarea,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $order->total,
                ],
            ],
            'expiration' => date('c', strtotime('+1 hour')),
            'returnUrl' => route('orders.show', $order->id),
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'PlacetoPay Sandbox',
        ]);

        return $response->json();
    }

    /**
     * Undocumented function
     *
     * @param [type] $requestId
     * @return void
     */
    public function getRequestInformation($requestId)
    {
        $getResponse = Http::post('https://test.placetopay.com/redirection/api/session/' . $requestId, [
            'auth' => $this->getCredentials()
        ]);

        return $getResponse->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function getCredentials()
    {
        $login = $this->login;
        $secretKey = $this->secretKey;
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
