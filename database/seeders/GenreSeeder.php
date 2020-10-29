<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::truncate(); //empty the table prior to inserting the records

        $genres = [
            'Romance',
            'Young Adult',
            'Crime',
            'Fantasy',
            'Sci-Fi',
            'Biography',
            'Fairytale',
            'For kids'
        ];

        foreach ($genres as $genre) {
            $new_genre = new Genre;
            $new_genre->name = $genre;
            $new_genre->slug = Str::slug($genre);
            $new_genre->save();
        }
    }
}
