<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailVerifyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_cannot_login_when_email_is_not_verify()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $user = factory(User::class)->create([
            'email_verified_at' => null
        ]);

        //Act
        $response = $this->actingAs($user)->get(route('home.index'));

        //Assert
        $response->assertRedirect(route('verification.notice'));
    }
}
