@extends('layouts.app')

@section('title', '500 - Server Error')

@section('content')
    <div class="mt-5 text-center">
        <h1>500 - Something Went Wrong</h1>
        <p>We are sorry, something went wrong on our end. Please try again later.</p>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to Movie List</a>
    </div>
@endsection