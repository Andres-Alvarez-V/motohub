<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LeafletMapController extends Controller
{
    public function index(): View
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 28.625485,
                    'lng' => 79.821091
                ],
                'draggable' => true
            ],
            [
                'position' => [
                    'lat' => 28.625293,
                    'lng' => 79.817926
                ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => 28.625182,
                    'lng' => 79.81464
                ],
                'draggable' => true
            ]
        ];

        return view('map.index', ['markers' => json_encode($initialMarkers)]);
    }
}