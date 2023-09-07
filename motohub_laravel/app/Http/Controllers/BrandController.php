<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
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
        $viewData['title'] = $brand->getName();
        $viewData['name'] = $brand->getName();
        $viewData['description'] = $brand->getDescription();
        $viewData['id'] = $brand->getId();
        $viewData['logo_image'] = $brand->getLogoImage();

        return view('brand.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData['title'] = 'Create Brand';

        return view('brand.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country_origin' => 'required',
            'foundation_year' => 'required',
            'logo_image' => 'required',
            'description' => 'required'
        ]);
        Brand::create($request->only(['name', 'country_origin', 'foundation_year', 'logo_image', 'description']));

        return back();
    }

    public function delete(string $id)
    {
        Brand::destroy($id);

        return redirect()->route('brand.index');
    }
}