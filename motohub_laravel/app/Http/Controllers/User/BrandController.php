<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(): View
    {
        $viewData['brands'] = Brand::with('motorcycles')->get();

        return view('user.brand.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $brand = Brand::findOrFail($id);
        $viewData['brand'] = $brand;

        return view('user.brand.show')->with('viewData', $viewData);
    }

}
