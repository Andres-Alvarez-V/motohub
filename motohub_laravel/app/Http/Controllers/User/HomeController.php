<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(): RedirectResponse
    {
        if (auth()->user()->role == config('constants.ROLE_ADMIN')) {
            return redirect()->route('admin.home');

        }

        return redirect()->route('user.home');
    }

    public function home(): View
    {
        return view('user.home');
    }
}
