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


    /**
     * Retorna lavista de crear el
     * carrito
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
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
     *Para validar de que si allá un usuario autenticado 
     * $user = $request->user();
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product, Cart $cart): \Illuminate\Http\RedirectResponse
    {

        $cart->products()->detach($product->id);

        $cookie = $this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie);
    }


  
    /**
     * Undocumented function
     *
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function repeatPayment(Order $order,Request $request): \Illuminate\Routing\Redirector
    {

        $payment = $this->paymentService->handlePayment($order, $request);
        $order->requestId = $payment['requestId'];
        $order->processUrl = $payment['processUrl'];
        $order->save();

        return redirect($payment['processUrl']);
    }

    /**
     * Undocumented function
     *
     * @param Order $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order): \Illuminate\View\View
    {
        
        $consul = $this->paymentService
            ->getRequestInformation($order->requestId);
        $currentStatus = $this->currentStatus($consul['status']['status']);
        $order->status = $currentStatus;
        $order->save();
        
        return view('orders.show', ['consul' => $consul,'order'=> $order]);
    }

    /**
     * Undocumented function
     *
     * @param [type] $paymentStatus
     */
    public static function currentStatus($paymentStatus)
    {
        switch ($paymentStatus) {
            case PaymentService::P2P_APROBADO:
                return Order::APROBADO;
            case PaymentService::P2P_RECHAZADO:
                return Order::RECHAZADO;
            case PaymentService::P2P_PENDIENTE:
                return Order::PENDIENTE;
            default:
                return Order::PROCESANDO;
        }
    }

public function reportVew()
{
    return view('orders.report');
}

    public function report(Request $request)
    {

        $order = Order::where('status', 'rechazado')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('DATE(status) as status')
            )
            ->orderBy('id','DESC')
            ->get();

/*     $order = DB::table('orders')
    ->select('orders.*')
    ->orderBy('id','DESC')
    ->get();*/


    return response(json_decode($order),200)->header('Content-type','text/plain'); 

        /* return view('orders.report'); */
    }

}
