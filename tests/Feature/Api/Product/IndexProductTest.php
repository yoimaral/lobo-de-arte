<?php

namespace Tests\Feature\Api\Tasks;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class IndexProductTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    public function it_can_test()
    {
        //$this->withoutExceptionHandling();
        //Arrange
Sanctum::actingAs(
    factory(User::class)->create()
);

        //Act

        //Assert
    }
}
