<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_users_when_is_admin()
    {
        //$this->withoutExceptionHandling();
        //Arrange
        $adminUser = factory(User::class)->create([
            'is_admin' => true
        ]);

        //Act
        $response = $this->actingAs($adminUser)
        ->get(route('users.index'));

        //Assert
        $response->assertOk()
        ->assertViewIs('admin.users.index')
        ->assertViewHas('users');
    }

    /** @test */
    public function it_cannot_list_users_when_user_is_not_admin()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $user = factory(User::class)->create([
            'is_admin' => false
        ]);

        //Act
        $response = $this->actingAs($user)
        ->get(route('users.index'));

        //Assert
        $response->assertRedirect('home');
    }
            /** @test */
    public function the_admin_it_can_update_users()
    {
        $this->withoutExceptionHandling();
        //Arrange

        $admin = factory(User::class)->create([
        'is_admin' => true
        ]);
        $user = factory(User::class)->create([
            'name'=>'yoimar'
            ]);
        //Act
        $response = $this->actingAs($admin)
        ->patch(route('users.update',$user), [
            'name'=>'yoma',
            'trick' =>'trick'
            ]);
        
        //Assert
        $user = $user->refresh();
        $this->assertEquals($user->name,'yoma');
        $response->assertRedirect();
    }
}
