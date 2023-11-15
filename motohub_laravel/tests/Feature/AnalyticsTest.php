<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\AnalyticsController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnalyticsTest extends TestCase
{
    
    public function testIndex()
    {
        $controller = new AnalyticsController();
        $view = $controller->index();

        $this->assertEquals('admin.analytics.index', $view->getName());
    }

}
