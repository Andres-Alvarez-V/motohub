<?php

namespace App\Http\Controllers\User;

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
        $this->middleware(['auth', 'lang']);
    }

    public function index(): View
    {
        $viewData['brands'] = Brand::with('motorcycles')->get();
        $viewData['title'] = 'Brands';

        return view('user.brand.index')->with('viewData', $viewData);
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

        return view('user.brand.show')->with('viewData', $viewData);
    }

}
