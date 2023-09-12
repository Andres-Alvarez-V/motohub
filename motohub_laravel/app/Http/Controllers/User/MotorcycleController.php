<?php

namespace App\Http\Controllers\User;

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
        $this->middleware(['auth', 'lang']);
    }

    public function index(): View
    {
        $viewData['motorcycles'] = Motorcycle::all();
        $viewData['title'] = 'Motorcycles';

        return view('user.motorcycle.index')->with('viewData', $viewData);
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

        return view('user.motorcycle.show')->with('viewData', $viewData);
    }

}
