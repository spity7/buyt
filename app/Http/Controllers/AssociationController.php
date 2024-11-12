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
        $associations = Association::paginate(8);

        return view('buyt.associations_page.associations', compact('associations'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $associations = Association::paginate(8);

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
