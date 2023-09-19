<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(Request $request): View
    {
        $search = $request->query('search');

        $viewData['brands'] = Brand::where('name', 'LIKE', "%{$search}%")
            ->with('motorcycles')
            ->get();

        return view('user.brand.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $brand = Brand::findOrFail($id);
        $viewData['brand'] = $brand;

        return view('user.brand.show')->with('viewData', $viewData);
    }
}
