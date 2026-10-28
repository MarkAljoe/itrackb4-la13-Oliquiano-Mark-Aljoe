@extends('layouts.app')

@section('title', $movie->title)

@section('content')
    <h3 class="mt-2">{{ $movie->title }}</h3>

    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Genre</th>
            <td>{{ $movie->genre->name }}</td>
        </tr>
        <tr>
            <th>Release Year</th>
            <td>{{ $movie->release_year }}</td>
        </tr>
        <tr>
            <th>Featured</th>
            <td>{{ $movie->is_featured ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <th>Rating</th>
            <td>{{ $movie->rating ?? 'N/A' }}</td>
        </tr>
    </table>

    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning btn-sm">Edit</a>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary btn-sm">Back to list</a>
@endsection