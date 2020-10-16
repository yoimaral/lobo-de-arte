<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class pagosTest extends TestCase
{
    /** @test */
    public function viewProducts()
    {
         $user = factory(User::class)->create();

         $response = $this->actingAs($user)
         ->get(route('home.index'));

         $response->assertOk();

         $response->assertViewHas('products');

      /*    ->press('addtocard')
         ->post(route('')); */
    }
    
/** @test */
public function addCart(){

       $user = factory(User::class)->create();

         $response = $this->actingAs($user)
         ->get(route('home.index'));

         $response->assertOk();

         $response->assertViewHas('products');

}

}
