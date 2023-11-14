<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrandTest extends TestCase
{

    public function test_admin_brands(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/brands');

        $response->assertStatus(200);
    }
    
}
