<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\FestivalNews;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $festivals = self::getAllUpcomingFestivals();
        $news = self::getAllFestivalNews();
        return view('home.index', compact('festivals', 'news'));
    }

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
