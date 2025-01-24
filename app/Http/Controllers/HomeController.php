<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\FestivalNews;
use App\Models\Trip;

class HomeController extends Controller
{
    public function index()
        {
            return view('home.index', [
                'trips' => Trip::all(),
                'festivals' => Festival::upcoming(),
                'news' => FestivalNews::latest()->take(6)->get(),
            ]);
        }
}
