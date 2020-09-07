<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    /** @test */
    public function createProducts()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('users.store'));

        $response->assertViewHas('products.index');

        $response->assertSeeText('img');
        $response->assertSeeText('name');
        $response->assertSeeText('description');
        $response->assertSeeText('price');
        $response->assertSeeText('enviar');
    }
}
