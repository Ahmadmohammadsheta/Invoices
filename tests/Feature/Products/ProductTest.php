<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_all_products(): void
    {
        $user = new User();
        $response = $this->actingAs($user)->get('products/all_products');

        $data = $response->json();
        $response->assertJson($data);
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $user = new User();
        $response = $this->actingAs($user)->get('products');

        $data = $response->json();
        $response->assertJson($data);
        $response->assertStatus(200);
    }
}
