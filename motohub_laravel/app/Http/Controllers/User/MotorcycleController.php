<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MotorcycleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(Request $request): View
    {
        $search = $request->query('search');

        if($request->query('sortBy')){
            $sortBy = $request->query('sortBy');
            $viewData['motorcycles'] = Motorcycle::where('is_active', true)
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('category', 'LIKE', "%{$search}%")
                ->orderBy('price', $sortBy)
                ->get();
            return view('user.motorcycle.index')->with('viewData', $viewData);
        }

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
