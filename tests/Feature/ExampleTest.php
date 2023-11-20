<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Auth\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $user = new User();
        $response = $this->actingAs($user)->get('/');
        $array = [];
        $response->assertStatus(302);
        $data = $response->json();
        $response->assertJson($data);
        $this->assertEquals($array, $data);
        $this->assertEquals(3, count($data));
    }
}
