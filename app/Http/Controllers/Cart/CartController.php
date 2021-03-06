<?php

namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use App\Services\CartService;


class CartController extends Controller
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
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $cart = $this->cartService->getFromCookie();

        return view('cart.index',['cart' => $cart]);
    }

}
