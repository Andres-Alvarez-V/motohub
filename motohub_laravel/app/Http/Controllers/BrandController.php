<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Contracts\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $viewData['brands'] = Brand::with('motorcycles')->get();
        $viewData['title'] = 'Brands';

        return view('brand.index')->with("viewData", $viewData);
    }

    public function show(int $id): View
    {
        $brand = Brand::findOrFail($id);
        $viewData['brand'] = $brand;
        $viewData['title'] = $brand->name;
        $viewData['name'] = $brand->name;
        $viewData['description'] = $brand->description;
        $viewData['id'] = $brand->id;

        return view('brand.show')->with("viewData", $viewData);
    }

    public function delete(string $id)
    {
        Brand::destroy($id);

        return redirect()->route('brand.index');
    }
}