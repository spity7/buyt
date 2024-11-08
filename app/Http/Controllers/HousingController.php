<?php

namespace App\Http\Controllers;

use App\Models\Housing;
use App\Http\Requests\StoreHousingRequest;
use App\Http\Requests\UpdateHousingRequest;

class HousingController extends Controller
{
    public function pending_housings()
    {
        $housings = Housing::where('pending', '1')->get();

        return view('buyt.housings.pending_housings', compact('housings'));
    }

    public function accept_pending(Housing $housing)
    {
        $housing->update(['pending' => 0]);
        $housing->save();

        return redirect()->route('pending_housings')->with('success', 'Housing accepted successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $housings = auth()->user()->housings()->get();

        return view('buyt.housings.index', compact('housings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buyt.housings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHousingRequest $request)
    {
        $housingData = $request->validated();
        $housingData['user_id'] = auth()->id();

        Housing::create($housingData);

        return redirect()->route('housings.create')->with('success', 'تمت إضافة السكن بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Housing $housing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Housing $housing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHousingRequest $request, Housing $housing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Housing $housing)
    {
        $housing->delete();
        $housing->save();

        return redirect()->route('users.index')->with('success', 'Users deleted successfully');
    }
}
