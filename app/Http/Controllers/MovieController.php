<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    public function index(Request $request)
{
    $currentGenre  = $request->query('genre');
    $currentRating = $request->query('rating');
    $search        = $request->query('search');
    $featured      = $request->query('featured');
    $sort          = $request->query('sort', 'title');

    if (!in_array($sort, ['title', 'release_year'])) {
        $sort = 'title';
    }

    $query = Movie::query()->with('genre');

    if ($search) {
        $query = $query->where('title', 'like', "%{$search}%");
    }

    if ($currentGenre) {
        $query = $query->where('genre_id', $currentGenre);
    }

    if ($featured !== null && $featured !== '') {
        $query = $query->where('is_featured', $featured);
    }

    $movies = $query->orderBy($sort)->paginate(7)->withQueryString();
    $genres = Genre::all();

    return view('movies.index', compact('movies', 'genres', 'currentGenre', 'currentRating', 'search', 'featured', 'sort'));
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

    $movie = Movie::create($validated);

    Log::info('Movie saved', [
        'id' => $movie->id,
    ]);

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
    abort_if($movie->genre->movies()->count() === 1, 403);

    $movie->delete();
    return redirect()->route('movies.index');
}
}