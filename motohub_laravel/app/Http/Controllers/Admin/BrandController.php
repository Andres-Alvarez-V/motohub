<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Motorcycle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role.admin']);
    }

    public function index(): View
    {
        $viewData['brands'] = Brand::with('motorcycles')->get();
        $viewData['title'] = 'Brands';

        return view('admin.brand.index')->with('viewData', $viewData);
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

        return view('admin.brand.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData['title'] = 'Create Brand';

        return view('admin.brand.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Brand::validateBrandRequest($request);
        Brand::create($request->only(['name', 'country_origin', 'foundation_year', 'logo_image', 'description']));

        return redirect()->route('admin.brand.index');
    }

    public function delete(string $id): RedirectResponse
    {
        Motorcycle::where('brand_id', $id)->delete();
        Brand::destroy($id);

        return redirect()->route('admin.brand.index');
    }
}
