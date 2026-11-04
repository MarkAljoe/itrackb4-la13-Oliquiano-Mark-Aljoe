@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
    <div class="mt-5 text-center">
        <h1>404 - Page Not Found</h1>
        <p>The movie you are looking for does not exist or may have been removed.</p>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to Movie List</a>
    </div>
@endsection