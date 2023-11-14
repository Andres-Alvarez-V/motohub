<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MotorcycleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(Request $request): View
    {
        $search = $request->query('search');

        if($request->query('sortBy')){
            $sortBy = $request->query('sortBy');
            $viewData['motorcycles'] = Motorcycle::where('is_active', true)
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('category', 'LIKE', "%{$search}%")
                ->orderBy('price', $sortBy)
                ->get();
            return view('user.motorcycle.index')->with('viewData', $viewData);
        }

        $viewData['motorcycles'] = Motorcycle::where('is_active', true)
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->get();

        return view('user.motorcycle.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {

        $client = new Client();
        $url = "https://api.api-ninjas.com/v1/motorcycles";

        $motorcycle = Motorcycle::findOrFail($id);
        $viewData['motorcycle'] = $motorcycle;

        $apiData = $client->request('GET', $url, [
            'query'=> ['make' => $motorcycle->brand->name, 'model' => $motorcycle->name],
            'headers' => ['X-Api-key' => 'a6uay7hV8+Yqy3tj+yVf4A==KZZ4psqDm4ZJINBk']
        ]);

        $contentsData = json_decode($apiData->getBody()->getContents(), true);

        $viewData['displacement'] = $contentsData[0]['displacement'];
        $viewData['engine'] = $contentsData[0]['engine'];
        $viewData['power'] = $contentsData[0]['power'];
        $viewData['torque'] = $contentsData[0]['torque'];
        $viewData['valvesPerCylinder'] = $contentsData[0]['valves_per_cylinder'];
        $viewData['fuelSystem'] = $contentsData[0]['fuel_system'];
        $viewData['cooling'] = $contentsData[0]['cooling'];
        $viewData['frontTire'] = $contentsData[0]['front_tire'];
        $viewData['rearTire'] = $contentsData[0]['rear_tire'];
        $viewData['fuelCapacity'] = $contentsData[0]['fuel_capacity'];
        $viewData['totalWeight'] = $contentsData[0]['total_weight'];

        return view('admin.motorcycle.show')->with('viewData', $viewData);
    }
}
