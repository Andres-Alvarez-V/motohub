<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Brand;
use App\Models\Motorcycle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role.admin', 'lang']);
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

        return view('admin.brand.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData['title'] = 'Create Brand';

        return view('admin.brand.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        try {
            Brand::validateBrandRequest($request);
            $storeInterface = app(ImageStorage::class);
            $fileName = $storeInterface->store($request);
            $dataToStore = $request->only(['name', 'country_origin', 'foundation_year', 'description']);
            $dataToStore['logo_image'] = $fileName;
            Brand::create($dataToStore);

            return redirect()->route('admin.brand.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => trans('messages.uploadImageError')]);
        }

    }

    public function edit(int $id): View
    {
        $viewData['brand'] = Brand::findOrFail($id);

        return view('admin.brand.edit')->with('viewData', $viewData);
    }

    public function update(Request $request): RedirectResponse
    {
        try {
            Brand::validateBrandEdit($request);
            $brand = Brand::findOrFail($request->id);
            $storeInterface = app(ImageStorage::class);
            $fileName = $storeInterface->store($request);
            $dataToStore = $request->only(['name', 'country_origin', 'foundation_year', 'logo_image', 'description']);
            $dataToStore['logo_image'] = $fileName;
            $brand->update($dataToStore);

            return redirect()->route('admin.brand.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => trans('messages.uploadImageError')]);
        }
    }

    public function delete(string $id): RedirectResponse
    {
        Motorcycle::where('brand_id', $id)->delete();
        Brand::destroy($id);

        return redirect()->route('admin.brand.index');
    }
}
