<?php

namespace App\Http\Controllers\User;

use App\Models\Motorcycle;
use Illuminate\View\View;
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

        return view('user.motorcycle.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $viewData['motorcycle'] = $motorcycle;

        return view('user.motorcycle.show')->with('viewData', $viewData);
    }

}
