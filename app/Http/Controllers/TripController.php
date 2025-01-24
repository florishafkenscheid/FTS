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
    public function index(?Festival $selected = null, $trips = [])
    {
        $festivals = Festival::upcoming();
        
        return view('busreizen.index', compact('festivals', 'trips', 'selected'));
    }

    public function search(Request $request) 
        {
            $validatedRequest = $request->validate([
                'origin' => 'required|string|max:64',
                'destination' => 'required|string|max:64',
                'date' => 'required|date',
                'passengers' => 'required|numeric|min:1',
            ]);
    
            $searchDate = \Carbon\Carbon::parse($validatedRequest['date']);
            
            $trips = Trip::query()
                ->where('departure_from', 'LIKE', "%{$validatedRequest['origin']}%")
                ->where('destination', 'LIKE', "%{$validatedRequest['destination']}%")
                ->whereBetween('departure_scheduled_at', [
                    $searchDate->copy()->subDay()->startOfDay(),
                    $searchDate->copy()->addDay()->endOfDay()
                ])
                ->whereHas('bus', function($query) use ($validatedRequest) {
                    $query->where('max_capacity', '>=', $validatedRequest['passengers']);
                })
                ->orderBy('departure_scheduled_at', 'asc')
                ->get();
    
            $destination = Festival::where('name', 'LIKE', "%{$validatedRequest['destination']}%")->first();
    
            return $this->index($destination, $trips);
        }

    public function searchByDestination($destination) {
        $trips = Trip::where('destination', 'LIKE', "%{$destination}%")
            ->orderBy('departure_scheduled_at', 'asc')
            ->get();

        // Get the exact upcoming festival instance by name
        $destination = Festival::upcoming()
            ->firstWhere('name', $destination);

        return $this->index($destination, $trips);
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
