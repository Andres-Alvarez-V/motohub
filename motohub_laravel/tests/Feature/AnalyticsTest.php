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
        $user = new User();
        $user->setAddress("test_addres");
        $user->setName("test_name");
        $user->setEmail("test@email.test");
        $user->setPassword("$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi");//12345678
        $user->setRole("ADMIN");

        $response = $this->actingAs($user)->get('/admin/analytics');

        $response->assertStatus(200);
    }

}
