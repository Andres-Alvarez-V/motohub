<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\OrderItem;
use App\Models\Motorcycle;

class LeafletMapController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function index(): View
    {

        $data = Motorcycle::with('orderItems')->get()->toArray();

        $initialMarkers = config('constants.DEPARTMENTS_GEODATA');
        $markersWithData = [];
        foreach($initialMarkers as $item){
            array_push($markersWithData, [
                'name' => $item['name'],
                'position' => $item['position'],
                'model' => 'R6',
                'brand' => 'Yamaha',
            ]);
        }

        return view('map.index', ['markers' => json_encode($markersWithData)]);
    }
}