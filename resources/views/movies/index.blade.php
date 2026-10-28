@extends('layouts.app')

@section('title', 'My Movie List')

@section('content')
    <h3 class="mt-2">Movies I Like</h3>
    <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">+ Add Movie</a>
    
    {{-- Active filter notice --}}
    @if($currentGenre || $currentRating)
        <p class="text-muted">
            Showing:
            @if($currentGenre) genre = <strong>{{ $currentGenre }}</strong> @endif
            @if($currentGenre && $currentRating) &amp; @endif
            @if($currentRating) rating ≥ <strong>{{ $currentRating }}</strong> @endif
            &nbsp;·&nbsp;
            <a href="{{ route('movies.index') }}">Clear all filters</a>
            
        </p>
    @endif

    {{-- Genre filter links --}}
    <div class="mb-2">
        <strong>Genre:</strong>
        @foreach($genres as $g)
            <a href="{{ route('movies.index', array_filter(['genre' => $g->id, 'rating' => $currentRating])) }}"
                class="btn btn-sm {{ $currentGenre == $g->id ? 'btn-dark' : 'btn-outline-secondary' }} me-1">
                    {{ $g->name }}
            </a>
        @endforeach
    </div>

    {{-- Rating filter links --}}
    <div class="mb-3">
        <strong>Min Rating:</strong>
        @foreach(['8.4','8.5','8.6','8.7','9.0'] as $r)
            <a href="{{ route('movies.index', array_filter(['genre' => $currentGenre, 'rating' => $r])) }}"
               class="btn btn-sm {{ $currentRating == $r ? 'btn-dark' : 'btn-outline-secondary' }} me-1">
                ≥ {{ $r }}
            </a>
        @endforeach
    </div>

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
                <td>{{ $movie['rating'] }}</td>
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
            <tr><td colspan="4" class="text-center text-muted">No movies match these filters.</td></tr>
        @endforelse
    </table>
    
@endsection