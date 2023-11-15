<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\BrandController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Request;
use Tests\TestCase;

class BrandTest extends TestCase
{

    public function test_admin_brands(): void
    {
        $controller = new BrandController();
        $view = $controller->show(1);

        $this->assertEquals('admin.brand.show', $view->getName());
    }
    
}
