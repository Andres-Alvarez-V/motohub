<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Brand;
use App\Models\Motorcycle;
use App\Models\State;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MotorcycleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role.admin', 'lang']);
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

        return view('admin.motorcycle.index')->with('viewData', $viewData);
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

    public function create(): View
    {
        $viewData['brands'] = Brand::all();
        $viewData['states'] = State::all();

        return view('admin.motorcycle.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        try {
            Motorcycle::validateMotorcycleRequest($request);
            $storeInterface = app(ImageStorage::class);
            $fileName = $storeInterface->store($request);
            $dataToStore = $request->only(['name', 'model', 'brand_id', 'category', 'description', 'price', 'stock', 'state']);
            $dataToStore['image'] = $fileName;
            Motorcycle::create($dataToStore);

            return redirect()->route('admin.motorcycle.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => trans('messages.uploadImageError')]);
        }
    }

    public function edit(int $id): View
    {
        $viewData['brands'] = Brand::all();
        $viewData['states'] = State::all();
        $viewData['motorcycle'] = Motorcycle::findOrFail($id);

        return view('admin.motorcycle.edit')->with('viewData', $viewData);
    }

    public function update(Request $request): RedirectResponse
    {
        Motorcycle::validateMotorcycleEdit($request);
        $motorcycle = Motorcycle::findOrFail($request->id);
        $storeInterface = app(ImageStorage::class);
        $fileName = $storeInterface->store($request);
        $dataToStore = $request->only(['name', 'model', 'brand_id', 'category', 'description', 'price', 'stock']);
        $dataToStore['image'] = $fileName;
        $motorcycle->update($dataToStore);

        return redirect()->route('admin.motorcycle.index');
    }

    public function disable(string $id): RedirectResponse
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $motorcycle->update(['is_active' => false]);

        return redirect()->route('admin.motorcycle.index');
    }

    public function enable(string $id): RedirectResponse
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $motorcycle->update(['is_active' => true]);

        return redirect()->route('admin.motorcycle.index');
    }
}
