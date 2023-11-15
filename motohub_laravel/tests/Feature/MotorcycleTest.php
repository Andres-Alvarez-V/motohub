<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\MotorcycleController;
use App\Models\User;
use Tests\TestCase;

class MotorcycleTest extends TestCase
{

    public function test_admin_motorcycles(): void
    {
        $controller = new MotorcycleController();
        $view = $controller->show(1);

        $this->assertEquals('admin.motorcycle.show', $view->getName());
    }

}
