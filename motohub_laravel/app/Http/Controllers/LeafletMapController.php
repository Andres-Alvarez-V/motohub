<?php

namespace App\Http\Controllers;

use App\Models\MotorcyclesPerState;
use App\Models\OrderItem;
use Illuminate\View\View;

class LeafletMapController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'lang']);
    }

    public function getMostSelledMotorcycleAtStateId(int $stateId): array
    {
        $data = MotorcyclesPerState::with('motorcycle')->where('state_id', $stateId)->orderBy('quantity', 'desc')->first();
        if (! $data) {
            return [
                'name' => 'No hay motos',
                'brand' => 'No hay motos',
            ];
        }
        $response = [
            'name' => $data->getMotorcycle()->getName(),
            'brand' => $data->getMotorcycle()->getBrand()->getName(),
        ];

        return $response;
    }

    public function index(): View
    {

        $allOrders = OrderItem::with('motorcycle')->get();
        $ordersQtyPerModel = [];

        foreach ($allOrders as $item) {
            if (array_key_exists($item->getMotorcycle()->getId(), $ordersQtyPerModel)) {
                $ordersQtyPerModel[$item->getMotorcycle()->getId()]['qty'] = $ordersQtyPerModel[$item->getMotorcycle()->getId()]['qty'] + $item->getQuantity();
            } else {
                $ordersQtyPerModel[$item->getMotorcycle()->getId()]['qty'] = $item->getQuantity();
                $ordersQtyPerModel[$item->getMotorcycle()->getId()]['state_id'] = $item->getMotorcycle()->getStateId();
            }
        }

        foreach ($ordersQtyPerModel as $key => $value) {
            $motorcyclePerState = new MotorcyclesPerState();
            $motorcyclePerState->setMotorcycleId($key);
            $motorcyclePerState->setQuantity($value['qty']);
            $motorcyclePerState->setStateId($value['state_id']);
            $motorcyclePerState->save();
        }

        $initialMarkers = config('constants.DEPARTMENTS_GEODATA');
        $markersWithData = [];
        foreach ($initialMarkers as $item) {
            $topSelledMotorcycle = $this->getMostSelledMotorcycleAtStateId($item['id']);
            array_push($markersWithData, [
                'name' => $item['name'],
                'position' => $item['position'],
                'model' => $topSelledMotorcycle['name'],
                'brand' => $topSelledMotorcycle['brand'],
            ]);
        }

        return view('map.index', ['markers' => json_encode($markersWithData)]);
    }
}
