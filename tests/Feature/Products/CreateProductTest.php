<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Http\UploadedFile;

class CreateProductTest extends TestCase
{
    /** @test */
    public function createProducts()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post(route('products.store'), ['img' => UploadedFile::fake()->image('avatar.jpg'), 'name' => 'ubuntu', 'description' => 'Linux', 'price' => '2309', 'stock' => '23']);

        $response->assertRedirect(route('products.create'));

        $this->assertDatabaseHas('products', ['name' => 'ubuntu']);
    }
}
