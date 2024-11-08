<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssociationRequest;
use App\Http\Requests\UpdateAssociationRequest;
use App\Models\Association;
use App\Models\Housing;
use Illuminate\Http\Request;

class AssociationController extends Controller
{

    public function associations_page()
    {
        $governorate = null;

        if (in_array(request('house-governorates'), Housing::GOVERNORATES) && request('house-governorates') === 'بيروت') {
            $governorate = 'بيروت';
        } else if (in_array(request('house-governorates'), Housing::GOVERNORATES) && request('house-governorates') === 'جبل لبنان') {
            $governorate = 'جبل لبنان';
        } else if (in_array(request('house-governorates'), Housing::GOVERNORATES) && request('house-governorates') === 'الجنوب') {
            $governorate = 'الجنوب';
        } else if (in_array(request('house-governorates'), Housing::GOVERNORATES) && request('house-governorates') === 'النبطية') {
            $governorate = 'النبطية';
        } else if (in_array(request('house-governorates'), Housing::GOVERNORATES) && request('house-governorates') === 'البقاع') {
            $governorate = 'البقاع';
        } else if (in_array(request('house-governorates'), Housing::GOVERNORATES) && request('house-governorates') === 'الشمال') {
            $governorate = 'الشما';
        }

        $houses = Housing::when($governorate, function ($query) {
            $query->withTrashed();
        });

        $associations = Association::all();

        $housings = Housing::where('type', '!=', 'مركز')->get();
        $housings1 = Housing::where('type', '!=', 'مركز')->where('governorate', 'بيروت')->get();
        $housings2 = Housing::where('type', '!=', 'مركز')->where('governorate', 'جبل لبنان')->get();
        $housings3 = Housing::where('type', '!=', 'مركز')->where('governorate', 'الجنوب')->get();
        $housings4 = Housing::where('type', '!=', 'مركز')->where('governorate', 'النبطية')->get();
        $housings5 = Housing::where('type', '!=', 'مركز')->where('governorate', 'البقاع')->get();
        $housings6 = Housing::where('type', '!=', 'مركز')->where('governorate', 'الشمال')->get();

        $centers = Housing::where('type', 'مركز')->get();
        $centers1 = Housing::where('type', 'مركز')->where('governorate', 'بيروت')->get();
        $centers2 = Housing::where('type', 'مركز')->where('governorate', 'جبل لبنان')->get();
        $centers3 = Housing::where('type', 'مركز')->where('governorate', 'الجنوب')->get();
        $centers4 = Housing::where('type', 'مركز')->where('governorate', 'النبطية')->get();
        $centers5 = Housing::where('type', 'مركز')->where('governorate', 'البقاع')->get();
        $centers6 = Housing::where('type', 'مركز')->where('governorate', 'الشمال')->get();

        return view('buyt.associations_page', compact('associations', 'housings', 'governorate', 'housings1', 'housings2', 'housings3', 'housings4', 'housings5', 'housings6', 'centers', 'centers1', 'centers2', 'centers3', 'centers4', 'centers5', 'centers6'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $associations = Association::all();

        return view('buyt.associations.index', compact('associations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buyt.associations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssociationRequest $request)
    {
        Association::create($request->validated());

        return redirect()->route('associations.index')->with('success', 'Association added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Association $associations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        return view('buyt.associations.edit', compact('association'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssociationRequest $request, Association $association)
    {
        $association->update($request->validated());

        return redirect()->route('associations.index')->with('success', 'Association Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        $association->delete();

        return redirect()->route('associations.index')->with('success', 'Association deleted successfully!');
    }
}
