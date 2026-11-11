@extends('layouts.app')

@section('title', 'My Movie List')

@section('content')
    <h3 class="mt-2">Movies I Like</h3>
    <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">+ Add Movie</a>

    <form method="GET" action="{{ route('movies.index') }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="text" name="search" value="{{ request('search') }}"
                   class="form-control" placeholder="Search title...">
        </div>
        <div class="col-md-2">
            <select name="genre" class="form-select">
                <option value="">All Genres</option>
                @foreach($genres as $g)
                    <option value="{{ $g->id }}"
                        @selected(request('genre') == $g->id)>{{ $g->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select name="featured" class="form-select">
                <option value="">Any</option>
                <option value="1" @selected(request('featured') === '1')>Featured</option>
                <option value="0" @selected(request('featured') === '0')>Not Featured</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="title" @selected(request('sort') === 'title')>Sort by Title</option>
                <option value="release_year" @selected(request('sort') === 'release_year')>Sort by Year</option>
            </select>
        </div>
        <div class="col-md-auto">
            <button class="btn btn-primary">Apply</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Clear</a>
        </div>
    </form>

    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Action</th>
        </tr>
        @forelse ($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->genre->name }}</td>
                <td>{{ $movie->rating }}</td>
                <td>
                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST"
                          style="display:inline"
                          onsubmit="return confirm('Delete this movie?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center text-muted">No movies found.</td></tr>
        @endforelse
    </table>

    {{ $movies->links() }}
@endsection