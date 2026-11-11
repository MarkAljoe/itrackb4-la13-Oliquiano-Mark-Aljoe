@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="row align-items-center mt-4">
        <div class="col-md-8">
            <h2>Discover and Track Movies You Love</h2>
            <p class="lead">Browse a curated collection of films across genres,
            mark your favourites, and keep track of what you have watched.
            Whether you love action, drama or sci-fi, there is something here for you.</p>
            <a href="{{ route('movies.index') }}" class="btn btn-primary btn-lg">Browse Movies</a>
        </div>
        <div class="col-md-4 text-center">
            <img src="{{ asset('img/photo.jpg') }}" width="96" height="96" class="rounded-circle mb-2">
            <p class="mb-0"><strong>Mark Aljoe D. Oliquiano</strong></p>
            <p class="text-muted small">BSIT · 2026 · Block 4A</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h3>{{ $movieCount }}</h3>
                <p class="mb-0">Movies in the collection</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h3>{{ $genreCount }}</h3>
                <p class="mb-0">Genres available</p>
            </div>
        </div>
    </div>
@endsection