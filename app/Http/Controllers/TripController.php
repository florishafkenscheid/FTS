<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($trips = null)
    {
        $festivals = Festival::upcoming();
        return view('busreizen.index', compact('festivals', 'trips'));
    }

    public function search(Request $request) {
        $validatedRequest = $request->validate([
            'origin' => 'bail|required|string|max:64',
            'destination' => 'required|string|max:64',
            'date' => 'required|date',
            'passengers' => 'required|numeric',
        ]);

        $trips = Trip
        ::where('departure_from', 'LIKE', "%{$validatedRequest['origin']}%")
        ->where('destination', 'LIKE', "%{$validatedRequest['destination']}%")
        ->where('departure_scheduled_at', 'LIKE', "{$validatedRequest['date']}%")
        ->get();

        if ($trips->isEmpty()) {
            $trips = null;
        }

        return $this->index($trips);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
