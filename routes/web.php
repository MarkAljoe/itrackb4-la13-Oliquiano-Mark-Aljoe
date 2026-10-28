<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/whoami', function () {
    return 'Mark Aljoe D. Oliquiano | Block 4A | ITRACKB4 Laravel 12';
});

Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::get('/movies/filter/{genre?}', [MovieController::class, 'filter'])
    ->name('movies.filter');

Route::resource('/movies', MovieController::class);
