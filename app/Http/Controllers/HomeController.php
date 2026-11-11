<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;

class HomeController extends Controller
{
    public function index()
    {
        $movieCount = Movie::count();
        $genreCount = Genre::count();

        return view('home', compact('movieCount', 'genreCount'));
    }
}