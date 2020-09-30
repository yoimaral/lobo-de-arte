<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class IndexTest extends TestCase
{

    /** @test */
    public function ListUsers()
    {
        /*  $this->withoutExceptionHandling(); */

        $response = $this->get(route('login'))
            ->assertStatus(200)
            ->assertViewIs('auth.login');

        /*        $response->assertSeeText('email', 'yoimar@gmail.com');
        $response->assertSeeText('password', '12345678');
        $response->assertSeeText('Login'); */
        /* Confirmamos que sea el nombre de la vista */

        /* $response =>$this->get(route('admin/users/index'))
            ->assertStatus(200); */

        /*  $response->assertViewIs('welcome');
        $response->assertViewHas('users'); */
    }
}
