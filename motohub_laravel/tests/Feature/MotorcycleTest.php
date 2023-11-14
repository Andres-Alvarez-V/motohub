<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MotorcycleTest extends TestCase
{

    public function test_admin_motorcycles(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/motorcycles');

        $response->assertStatus(200);
    }

}
