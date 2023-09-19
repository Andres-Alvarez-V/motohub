<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role.admin', 'lang']);
    }

    public function home(): View
    {
        return view('admin.home');
    }
}
