<?php

namespace App\Http\Controllers;

use App\Models\Housing;
use App\Http\Requests\StoreHousingRequest;
use App\Http\Requests\UpdateHousingRequest;

class HousingController extends Controller
{
    public function housings_page()
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

        $housings = Housing::where('type', '!=', 'مركز')->where('pending', 'accepted')->paginate(8);
        $housings1 = Housing::where('type', '!=', 'مركز')->where('governorate', 'بيروت')->where('pending', 'accepted')->paginate(8);
        $housings2 = Housing::where('type', '!=', 'مركز')->where('governorate', 'جبل لبنان')->where('pending', 'accepted')->paginate(8);
        $housings3 = Housing::where('type', '!=', 'مركز')->where('governorate', 'الجنوب')->where('pending', 'accepted')->paginate(8);
        $housings4 = Housing::where('type', '!=', 'مركز')->where('governorate', 'النبطية')->where('pending', 'accepted')->paginate(8);
        $housings5 = Housing::where('type', '!=', 'مركز')->where('governorate', 'البقاع')->where('pending', 'accepted')->paginate(8);
        $housings6 = Housing::where('type', '!=', 'مركز')->where('governorate', 'الشمال')->where('pending', 'accepted')->paginate(8);

        return view('buyt.associations_page.housings', compact('governorate', 'housings',  'housings1', 'housings2', 'housings3', 'housings4', 'housings5', 'housings6'));
    }
    public function centers_page()
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

        $centers = Housing::where('type', 'مركز')->paginate(8);
        $centers1 = Housing::where('type', 'مركز')->where('governorate', 'بيروت')->paginate(8);
        $centers2 = Housing::where('type', 'مركز')->where('governorate', 'جبل لبنان')->paginate(8);
        $centers3 = Housing::where('type', 'مركز')->where('governorate', 'الجنوب')->paginate(8);
        $centers4 = Housing::where('type', 'مركز')->where('governorate', 'النبطية')->paginate(8);
        $centers5 = Housing::where('type', 'مركز')->where('governorate', 'البقاع')->paginate(8);
        $centers6 = Housing::where('type', 'مركز')->where('governorate', 'الشمال')->paginate(8);

        return view('buyt.associations_page.centers', compact('governorate', 'centers', 'centers1', 'centers2', 'centers3', 'centers4', 'centers5', 'centers6'));
    }
    public function pending_housings()
    {
        $housings = Housing::where('pending', 'pending')->paginate(8);

        return view('buyt.housings.pending_housings', compact('housings'));
    }

    public function accept_pending(Housing $housing)
    {
        $housing->update(['pending' => 'accepted']);
        $housing->save();

        return back()->with('success', 'Housing accepted successfully');
    }

    public function reject_pending(Housing $housing)
    {
        $housing->update(['pending' => 'rejected']);
        $housing->save();

        return back()->with('success', 'Housing rejected successfully');
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $pending = 'all';

        if (request('pending') === 'all') {
            $pending = 'all';
        } else if (in_array(request('pending'), Housing::PENDING) && request('pending') === 'pending') {
            $pending = 'pending';
        } else if (in_array(request('pending'), Housing::PENDING) && request('pending') === 'accepted') {
            $pending = 'accepted';
        } else if (in_array(request('pending'), Housing::PENDING) && request('pending') === 'rejected') {
            $pending = 'rejected';
        }

        $houses = housing::when($pending, function ($query) {
            $query->withTrashed();
        });

        $housings = auth()->user()->housings()->where('type', '!=', 'مركز')->paginate(8);
        $accepted_housings = auth()->user()->housings()->where('pending', 'accepted')->where('type', '!=', 'مركز')->paginate(8);
        $pending_housings = auth()->user()->housings()->where('pending', 'pending')->where('type', '!=', 'مركز')->paginate(8);
        $rejected_housings = auth()->user()->housings()->where('pending', 'rejected')->where('type', '!=', 'مركز')->paginate(8);


        return view('buyt.housings.index', compact('housings', 'pending', 'accepted_housings', 'pending_housings', 'rejected_housings'));
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

        // Generate the title using 'type', 'furnishing_status', and 'service_type'
        $housingData['title'] = ($request->input('type') ?? '') . ' ' .
            ($request->input('furnishing_status') ?? '') . ' ' .
            ($request->input('service_type') ?? '');

        // If the user has an 'admin' role, set 'pending' to 'accepted'
        if (auth()->user()->hasRole('admin')) {
            $housingData['pending'] = 'accepted';
        }

        // Create the Housing record
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

        return back()->with('success', 'Housing deleted successfully');
    }
}
