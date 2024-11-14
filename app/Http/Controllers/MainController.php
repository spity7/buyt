<?php

namespace App\Http\Controllers;

use App\Models\Housing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        // Group housings by city, and also include individual housing prices
        $cityHousings = Housing::with('city')
            ->select('city_id', 'price', DB::raw('count(*) as count'))
            ->groupBy('city_id', 'price')
            ->with('city') // Ensures we get the city details
            ->get();

        return view('buyt.main', compact('cityHousings'));
    }
}
