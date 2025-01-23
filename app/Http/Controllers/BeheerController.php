<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class BeheerController extends Controller
{
    public function index(?Festival $selected = null, $trips = [])
    {
        $festivals = Festival::upcoming();
        
        return view('beheer.index', compact('festivals', 'trips', 'selected'));
    }

    public function edit(int $id) {
        $festival = Festival::findOrFail($id);
        return view('beheer.edit', compact('festival'));
    }
}
