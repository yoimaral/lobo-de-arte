<?php

namespace Tests\Feature\Api\Tasks;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class IndexProductTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    public function test_index()
    {
        factory(Product::class, 5)->create();

        $response = $this->getJson('/api/products');

        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(5);
    }

}
