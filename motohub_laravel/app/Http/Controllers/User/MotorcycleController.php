<?php

namespace App\Http\Controllers\User;

use App\Models\Motorcycle;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(Request $request): View
    {
        $search = $request->query('search');

        $viewData['motorcycles'] = Motorcycle::where('is_active', true)
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('category', 'LIKE', "%{$search}%")
        ->get();

        return view('user.motorcycle.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $motorcycle = Motorcycle::where('is_active', true)->findOrFail($id);
        $viewData['motorcycle'] = $motorcycle;

        return view('user.motorcycle.show')->with('viewData', $viewData);
    }

}
