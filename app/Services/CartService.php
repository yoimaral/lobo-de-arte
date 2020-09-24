<?php

namespace App\Services;

use App\Cart;
use Illuminate\Support\Facades\Cookie;


class CartService
{

    protected $cookieName = 'cart';

    /**
     * Undocumented function
     *
     * 
     */
    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookieName);

        $cart = Cart::find($cartId);

        return $cart;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getFromCookieOrCreate()
    {

        $cart = $this->getFromCookie();

        return $cart ?? Cart::create();
    }

    /**
     * Undocumented function
     *
     * @param Cart $cart
     * @return void
     */
    public function makeCookie(Cart $cart)
    {

        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function countProducts()
    {
        $cart = $this->getFromCookie();

        if ($cart != null) {

            return $cart->products->pluck('pivot.quantity')->sum();
        }
        return 0;
    }
}
