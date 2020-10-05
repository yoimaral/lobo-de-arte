<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public $cartService;

    /**
     * Undocumented function
     *
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;

        $this->middleware('auth')->only(['store']);
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
        return DB::transaction(function () use ($request) {

            $user = $request->user();

            $order = $user->orders()->create([
                'status' => 'in process'
            ]);

            $cart = $this->cartService->getFromCookie();

            $cartProductsWithQuantity = $cart->products->mapWithKeys(function ($product) {
                $element[$product->id] = ['quantity' => $product->pivot->quantity];

                return $element;
            });

            $order->products()->attach($cartProductsWithQuantity->toArray());
            return redirect()->route('orders.payments.create', ['order' => $order]);
        });
    }
}
