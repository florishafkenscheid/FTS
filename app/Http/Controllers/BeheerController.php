<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class BeheerController extends Controller
{
    public function index(?Festival $selected = null, $trips = [], ?Festival $festivalInfo = null)
    {
        $festivals = Festival::upcoming();
        
        return view('beheer.index', compact('festivals', 'trips', 'selected', 'festivalInfo'));
    }

    public function edit(int $id) {
        $festival = Festival::findOrFail($id);
        return view('beheer.edit', compact('festival'));
    }

    public function show(Festival $festivalInfo) {
        return self::index($festivalInfo, [], $festivalInfo);
    }
}
