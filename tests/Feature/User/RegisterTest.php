<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_view_register_form()
    {
        //$this->withoutExceptionHandling();
        //Arrange

        //Act
        $response = $this->get(route('register'));
    
        //Assert
        $response->assertOk()
        ->assertSee('name')
        ->assertSee('email')
        ->assertSee('password');
    }

    /** @test */
    public function it_can_register()
    {
        $this->withoutExceptionHandling();
        //Arrange

        //Act
        $response = $this->post(route('register', [
            'name' => 'Yoimar',
            'email' => 'yoimar@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]));
    
        $user = User::latest()->first();

        //Assert
        $response->assertRedirect('/home');
        $this->assertEquals($user->name, 'Yoimar');
    }
}
