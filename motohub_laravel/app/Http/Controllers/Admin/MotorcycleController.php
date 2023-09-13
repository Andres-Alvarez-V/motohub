<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Motorcycle;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MotorcycleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role.admin', 'lang']);
    }

    public function index(): View
    {
        $viewData['motorcycles'] = Motorcycle::all();

        return view('admin.motorcycle.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $viewData['motorcycle'] = $motorcycle;

        return view('admin.motorcycle.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData['brands'] = Brand::all();

        return view('admin.motorcycle.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Motorcycle::validateMotorcycleRequest($request);
        Motorcycle::create($request->only(['name', 'model', 'brand_id', 'category', 'image', 'description', 'price', 'stock', 'state']));

        return redirect()->route('admin.motorcycle.index');
    }

    public function dissable(string $id): RedirectResponse
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $motorcycle->is_active = false;
        $motorcycle->save();

        return redirect()->route('admin.motorcycle.index');
    }

    public function enable(string $id): RedirectResponse
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $motorcycle->is_active = true;
        $motorcycle->save();

        return redirect()->route('admin.motorcycle.index');
    }
}
