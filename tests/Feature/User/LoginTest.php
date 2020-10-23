<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_login()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $user = factory(User::class)->create([
            'email' => 'yoimar@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        //Act
        $response = $this->post(route('login', [
            'email' => 'yoimar@gmail.com',
            'password' => '12345678'
        ]));

        //Assert
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }
}
