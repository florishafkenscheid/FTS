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
        $festivals = Festival::all();
        $news = FestivalNews::all();
        return view('home.index', compact('festivals', 'news'));
    }
}
