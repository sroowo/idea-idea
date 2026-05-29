<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', [
            'movies' => $movies
        ]);
    }
    public function like(Request $request, Movie $movie)
    {
        $user=$request->user();
        $user->movies()->attach($movie->id);
        return redirect('/movie');
    }


    public function import()
    {
        for ($page = 1; $page <= 2; $page++) {
            $response = Http::get(
                'https://api.themoviedb.org/3/movie/popular',
                [
                    'api_key' => env('TMDB_API_KEY'),
                    'page' => $page,
                ]

            );
            // dd($response);
            foreach ($response->json()['results'] as $movie) {
                Movie::updateOrCreate(
                    ['tmdb_id' => $movie['id']],
                    ['title' => $movie['title']]
                );
            }
        }
        return 'Movies Imported';
    }
}
