<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class PagosTest extends TestCase
{
    /** @test */
    public function view_Products()
    {
         $user = Factory(User::class)->create();

         $response = $this->actingAs($user)
         ->get(route('home.index'));

         $response->assertOk();

         $response->assertViewHas('products');

    
    }

     /** @test */
     public function payment()
    {
         $user = Factory(User::class)->create();

          $cart = $this->cartService;
         $response = $this->actingAs($user)
         ->get('carts.index',$cart);
/* 
         $cart = Factory(Cookie::class()->create());
         $response->return('cart.index', ['cart' => $cart]); */

         $response->assertViewIs('carts.index');

         $response->assertStatus(200);
      /*    ->press('addtocard'); */
    }
}
