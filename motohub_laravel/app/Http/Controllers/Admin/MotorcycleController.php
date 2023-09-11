<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Motorcycle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MotorcycleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role.admin']);
    }

    public function index(): View
    {
        $viewData['motorcycles'] = Motorcycle::all();
        $viewData['title'] = 'Motorcycles';

        return view('admin.motorcycle.index')->with('viewData', $viewData);
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

        return view('admin.motorcycle.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData['title'] = 'Create Motorcycle';
        $viewData['brands'] = Brand::all();

        return view('admin.motorcycle.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Motorcycle::validateMotorcycleRequest($request);
        Motorcycle::create($request->only(['name', 'model', 'brand_id', 'category', 'image', 'description', 'price', 'stock', 'state']));

        return redirect()->route('admin.motorcycle.index');
    }

    public function delete(string $id): RedirectResponse
    {
        Motorcycle::destroy($id);

        return redirect()->route('admin.motorcycle.index');
    }
}
