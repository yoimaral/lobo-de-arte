<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Order;
use App\Payment;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{

    public $cartService;
    public $PaymentService;
    /**
     * Undocumented function
     *
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService, PaymentService $PaymentService)
    {
        $this->PaymentService = $PaymentService;

        $this->cartService = $cartService;

        $this->middleware('auth')->only(['store']);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Order $order
     * @return void
     */
    public function index(OrderPaymentController $payment)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {

        $request = $this->PaymentService
            ->getRequestInformation('');

        return view('payment.create')->with([
            'order' => $order
        ]);
    }


    /**
     * 
     *
     * @param Request $request
     * @param Order $order
     */
    public function store(Request $request, Order $order)
    {
        $payment = $this->PaymentService->handlePayment($order, $request);

        $this->cartService->getFromCookie()->products()->detach();

        $order->requestId = $payment['requestId'];
        $order->processUrl = $payment['processUrl'];
        $order->save();

        return redirect($payment['processUrl']);
    }

    /**
     * Undocumented function
     *
     * @param Order $order
     * @param integer $payment
     * @param Request $infoPay
     * @return void
     */
    public function show(Order $order, int $payment, Request $infoPay)
    {
        $requestId = $order->requestId;

        $consul = $this->PaymentService->getRequestInformation($requestId);


        return view('payment.show', ['consul' => $consul, 'order' => $order]);
    }
}
