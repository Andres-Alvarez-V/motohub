<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\JsonResponse;

class MotorcycleApiController extends Controller
{

    public function index(): JsonResponse
    {
        $motorcycle = Motorcycle::all();

        return response()->json($motorcycle, 200);
    }

    public function show(string $motorcycleId): JsonResponse
    {
        $motorcycles = Motorcycle::findOrFail( $motorcycleId );

        return response()->json($motorcycles, 200);
    }

}