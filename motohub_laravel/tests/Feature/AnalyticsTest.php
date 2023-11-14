<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnalyticsTest extends TestCase
{
    
    public function test_admin_analytics(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/analytics');

        $response->assertStatus(200);
    }

}
