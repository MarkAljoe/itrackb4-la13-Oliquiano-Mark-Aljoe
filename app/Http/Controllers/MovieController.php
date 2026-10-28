<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $currentGenre  = $request->query('genre');
        $currentRating = $request->query('rating');

        $query = Movie::query();

        if ($currentGenre) {
            $query = $query->where('genre_id', $currentGenre);
        }

        if ($currentRating) {
            $query = $query->where('rating', $currentRating);
        }

        $movies = $query->with('genre')->get();
        $genres = Genre::all();
        return view('movies.index', compact('movies', 'genres', 'currentGenre', 'currentRating'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'genre_id'     => 'required|exists:genres,id',
            'release_year' => 'required|integer',
            'is_featured'  => 'required|boolean',
            'rating'       => 'nullable|string',
        ]);

        Movie::create($validated);
        return redirect()->route('movies.index');
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'genre_id'     => 'required|exists:genres,id',
            'release_year' => 'required|integer',
            'is_featured'  => 'required|boolean',
            'rating'       => 'nullable|string',
        ]);

        $movie->update($validated);
        return redirect()->route('movies.index');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}