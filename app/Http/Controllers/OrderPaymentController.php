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
     * Realiza la funcion de eliminar 
     * los productos del carrito
     * $this->cartService->getFromCookie()->product()->detach();
     *
     * @param Request $request
     * @param Order $order
     */
    public function store(Request $request, Order $order)
    {
        $payment = $this->PaymentService->handlePayment($order, $request);

        $this->cartService->getFromCookie()->products()->detach();

        return redirect($payment['processUrl']);

        /*         $order->payment()->create([
            'amount' => $order->total,
            'payed_at' => now()
        ]);

        $order->status = 'payed';
        $order->save();

        return redirect()
            ->route('home.index')
            ->with('message', "Gracias! su compra porvalor de \${$order->total} ha sido Exitosa"); */
    }
}
