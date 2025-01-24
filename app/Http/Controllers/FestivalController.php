<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'email' => 'required|email:rfc,dns',
            'phone_number' => 'required|string|regex:/(?:\+?\(?\d{1,3}\)?[-.\s]?)?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{3,}/|min:10|max:100', // Same regex as update
            'start_at' => 'required|date|after:today',
            'end_at' => 'required|date|after:start_at'
        ]);

        Festival::create([
            'name' => $validatedRequest['name'],
            'description' => $validatedRequest['description'],
            'email' => $validatedRequest['email'],
            'phone_number' => $validatedRequest['phone_number'],
            'start_at' => $validatedRequest['start_at'],
            'end_at' => $validatedRequest['end_at'],
        ]);

        return Redirect::route('beheer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Festival $festival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Festival $festival)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Festival $festival)
    {
        $validatedRequest = $request->validate([
            'name' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string|max:1000',
            'email' => 'sometimes|nullable|email:rfc,dns',
            'phone_number' => 'sometimes|nullable|string|regex:/(?:\+?\(?\d{1,3}\)?[-.\s]?)?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{3,}/|min:10|max:100',
            'start_at' => 'sometimes|nullable|date|after:today',
            'end_at' => 'sometimes|nullable|date|after:start_at'
        ]); // Needs error handling but an admin knows how the system works in theory

        // Get rid of null values before passing to update
        $festival->update(array_filter($validatedRequest));
        
        return Redirect::route('beheer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Festival $festival)
    {
        try {
            $festival->delete();
            return redirect()->route('beheer')->with('success', 'Festival deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting festival: ' . $e->getMessage());
            return redirect()->route('beheer')->with('error', 'Failed to delete festival');
        }
    }
}
