<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function view_Users()
    {
        $user = Factory(User::class)
        ->create(['is_admin' => '1']);
        
        $response =  $this->actingAs($user)
         ->get(route('users.index'));

         $response->assertOk();
        
        $response->assertViewHas('users');
    }
}
