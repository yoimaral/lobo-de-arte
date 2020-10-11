<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use App\Services\CartService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public $cartService;
    public $paymentService;

    /**
     * Undocumented function
     *
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService, PaymentService $paymentService)
    {
        $this->cartService = $cartService;
        $this->paymentService = $paymentService;

        $this->middleware('auth')->only(['store']);
    }

    public function index()
    {
        $user = auth()->user();
        $orders = Order::where('customer_id', $user->id)->get();
        return view('orders.index', ['orders' => $orders]);
    }

    public function show(Order $order)
    {
        
        $consul = $this->paymentService
        ->getRequestInformation($order->requestId);

            $order->status = $consul['status']['status'];
            $order->save();
        
        return view('orders.show', ['consul' => $consul,'order'=> $order],);
    }
    
    /**
     * Retorna a la vista la informacion del carrito 
     * accediendo al cardService
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = $this->cartService->getFromCookie();

        if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()
                ->back()
                ->withErrors("Tu carro esta vacio!");
        }

        return view('orders.create')->with(['cart' => $cart]);
    }

    /**
     * Para validar de que si allá un usuario autenticado 
     * $user = $request->user();
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart= $this->cartService->getFromCookie();
        $user = $request->user();
        $order = $user->orders()->create();
        $cartProductsWithQuantity = $cart
        ->products
        ->mapWithKeys(function ($product) {
            $element[$product->id] = [
                'quantity' => $product->pivot->quantity
            ];
            return $element;
        });
        $order->products()->attach($cartProductsWithQuantity->toArray());
        $payment = $this->paymentService->handlePayment($order, $request);
        $order->requestId = $payment['requestId'];
        $order->processUrl = $payment['processUrl'];
        $order->save();
        $this->cartService->getFromCookie()->products()->detach();

        return redirect($payment['processUrl']);
    }

    /**
     * Undocumented function
     *
     * @param Product $product
     * @param Cart $cart
     * @return void
     */
    public function destroy(Product $product, Cart $cart)
    {

        $cart->products()->detach($product->id);

        $cookie = $this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie);
    }


    /**
     * Undocumented function
     *
     * @param Order $order
     * @return void
     */
    public function repeatPayment(Order $order,Request $request)
    {

        $payment = $this->paymentService->handlePayment($order, $request);
        $order->requestId = $payment['requestId'];
        $order->processUrl = $payment['processUrl'];
        $order->save();

        return redirect($payment['processUrl']);
    }









    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
