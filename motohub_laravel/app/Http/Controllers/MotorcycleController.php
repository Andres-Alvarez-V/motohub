<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Motorcycle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index(): View
    {
        $viewData['motorcycles'] = Motorcycle::all();
        $viewData['title'] = 'Motorcycles';

        return view('motorcycle.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $viewData['motorcycle'] = $motorcycle;
        $viewData['title'] = $motorcycle->getName();
        $viewData['name'] = $motorcycle->getName();
        $viewData['description'] = $motorcycle->getDescription();
        $viewData['id'] = $motorcycle->getId();
        $viewData['image'] = $motorcycle->getImage();
        $viewData['price'] = $motorcycle->getPrice();
        $viewData['stock'] = $motorcycle->getStock();

        return view('motorcycle.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData['title'] = 'Create Motorcycle';
        $viewData['brands'] = Brand::all();

        return view('motorcycle.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Motorcycle::validateMotorcycleRequest($request);
        Motorcycle::create($request->only(['name', 'model', 'brand_id', 'category', 'image', 'description', 'price', 'stock', 'state']));

        return back();
    }

    public function delete(string $id): RedirectResponse
    {
        Motorcycle::destroy($id);

        return redirect()->route('motorcycle.index');
    }
}
