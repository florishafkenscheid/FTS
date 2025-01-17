<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Trip;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id) {
        $trip = Trip::findOrFail($id);
        $seats_left = 35 - $trip->bus->passengers;
        return view('busreizen.order', compact('trip'));
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
        $validatedRequest = $request->validate([
            'user_id' => 'required|numeric|exists:users,id',
            'trip_id' => 'required|numeric|exists:trips,id',
            'amount_of_tickets' => 'required|numeric|min:1',
        ]);

        $booking = Booking::create([
            'user_id' => $validatedRequest['user_id'],
            'amount_of_tickets' => $validatedRequest['amount_of_tickets'],
        ]);

        $booking->trips()->attach($validatedRequest['trip_id']);

        return view('busreizen.complete');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
