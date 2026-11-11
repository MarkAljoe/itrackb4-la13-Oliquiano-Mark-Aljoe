<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MoviesSeeder extends Seeder
{
    public function run(): void
    {
        $scifi    = Genre::create(['name' => 'Sci-Fi']);
        $action   = Genre::create(['name' => 'Action']);
        $thriller = Genre::create(['name' => 'Thriller']);
        $comedy   = Genre::create(['name' => 'Comedy']);
        $drama    = Genre::create(['name' => 'Drama']);

        $movies = [
            ['title' => 'Inception',                          'genre_id' => $scifi->id,    'release_year' => 2010, 'is_featured' => true,  'rating' => 'PG-13'],
            ['title' => 'Interstellar',                       'genre_id' => $scifi->id,    'release_year' => 2014, 'is_featured' => true,  'rating' => null],
            ['title' => 'The Matrix',                         'genre_id' => $scifi->id,    'release_year' => 1999, 'is_featured' => true,  'rating' => 'R'],
            ['title' => 'Arrival',                            'genre_id' => $scifi->id,    'release_year' => 2016, 'is_featured' => false, 'rating' => 'PG-13'],
            ['title' => 'Dune',                               'genre_id' => $scifi->id,    'release_year' => 2021, 'is_featured' => true,  'rating' => 'PG-13'],
            ['title' => 'The Dark Knight',                    'genre_id' => $action->id,   'release_year' => 2008, 'is_featured' => true,  'rating' => 'PG-13'],
            ['title' => 'Mad Max: Fury Road',                 'genre_id' => $action->id,   'release_year' => 2015, 'is_featured' => true,  'rating' => 'R'],
            ['title' => 'John Wick',                          'genre_id' => $action->id,   'release_year' => 2014, 'is_featured' => false, 'rating' => 'R'],
            ['title' => 'Top Gun: Maverick',                  'genre_id' => $action->id,   'release_year' => 2022, 'is_featured' => true,  'rating' => 'PG-13'],
            ['title' => 'Mission Impossible: Fallout',        'genre_id' => $action->id,   'release_year' => 2018, 'is_featured' => false, 'rating' => 'PG-13'],
            ['title' => 'Parasite',                           'genre_id' => $thriller->id, 'release_year' => 2019, 'is_featured' => true,  'rating' => 'R'],
            ['title' => 'Gone Girl',                          'genre_id' => $thriller->id, 'release_year' => 2014, 'is_featured' => false, 'rating' => 'R'],
            ['title' => 'Knives Out',                         'genre_id' => $thriller->id, 'release_year' => 2019, 'is_featured' => true,  'rating' => 'PG-13'],
            ['title' => 'Se7en',                              'genre_id' => $thriller->id, 'release_year' => 1995, 'is_featured' => false, 'rating' => 'R'],
            ['title' => 'The Grand Budapest Hotel',           'genre_id' => $comedy->id,   'release_year' => 2014, 'is_featured' => false, 'rating' => 'R'],
            ['title' => 'Everything Everywhere All at Once',  'genre_id' => $comedy->id,   'release_year' => 2022, 'is_featured' => true,  'rating' => 'R'],
            ['title' => 'The Truman Show',                    'genre_id' => $comedy->id,   'release_year' => 1998, 'is_featured' => false, 'rating' => 'PG'],
            ['title' => 'The Shawshank Redemption',           'genre_id' => $drama->id,    'release_year' => 1994, 'is_featured' => true,  'rating' => 'R'],
            ['title' => 'Forrest Gump',                       'genre_id' => $drama->id,    'release_year' => 1994, 'is_featured' => true,  'rating' => 'PG-13'],
            ['title' => 'A Beautiful Mind',                   'genre_id' => $drama->id,    'release_year' => 2001, 'is_featured' => false, 'rating' => 'PG-13'],
            ['title' => 'Whiplash',                           'genre_id' => $drama->id,    'release_year' => 2014, 'is_featured' => true,  'rating' => 'R'],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}