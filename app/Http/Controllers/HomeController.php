<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\FestivalNews;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $festivals = self::getAllUpcomingFestivals();
        $news = self::getAllFestivalNews();
        return view('home.index', compact('festivals', 'news'));
    }

    public function search(Request $request) {
        $validatedRequest = $request->validate([
            'origin' => 'bail|required|string|max:64',
            'destination' => 'required|string|max:64',
            'date' => 'required|date',
            'passengers' => 'required|numeric',
        ]);

        $trips = Trip::where('destination', 'LIKE', "%{$validatedRequest['destination']}%")
        ->where('departure_scheduled_at', 'LIKE', "{$validatedRequest['date']}%")
        ->get();

        return view('busreizen.index', compact('trips'));
    }


    // Utils
    public function getAllUpcomingFestivals() {
        return Festival::all();
    }

    public function getUpcomingFestival(int $id) {
        return Festival::find($id);
    }

    public function getAllFestivalNews() {
        return FestivalNews::all();
    }

    public function getFestivalNews(int $id) {
        return FestivalNews::find($id);
    }
}
