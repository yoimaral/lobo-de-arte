<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PruebaTest extends TestCase
{
    /** @test */
    public function it_loads_the_home_details_product()
    {
        $user = Factory(User::class)
        ->create(['is_admin' => '1']);

        $this->get('home.show/3')

        ->assertStatus(200)

        ->assertSee('product: 3');
    }

}
