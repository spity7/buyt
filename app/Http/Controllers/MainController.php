<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 33.855541,
                    'lng' => 35.518968
                ],
                'draggable' => true
            ],
            [
                'position' => [
                    'lat' => 34.368845,
                    'lng' => 35.830145
                ],
                'draggable' => false
            ]
        ];

        return view('buyt.main', compact('initialMarkers'));
    }
}
