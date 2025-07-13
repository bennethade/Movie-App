<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['popularMovies'] = Http::timeout(30) // Wait 30 seconds instead of default 10
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];


        $data['nowPlayingMovies'] = Http::timeout(30) // Wait 30 seconds instead of default 10
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];


        // $data['upcomingMovies'] = Http::timeout(30) 
        //     ->withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/upcoming')
        //     ->json()['results'];

        

        $upcomingResponse = Http::timeout(30)
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming',[
                // 'region' => 'US'
            ])->json();

        $data['upcomingMovies'] = collect($upcomingResponse['results'])
            ->filter(function ($movie) {
                if (!isset($movie['release_date'])) {
                    return false;
                }
                $releaseDate = Carbon::parse($movie['release_date']);
                return $releaseDate->isAfter(now());
            })
            ->take(20)
            ->values() 
            ->toArray();



        // $regions = ['GB', 'CA', 'ZA', 'DE', 'BR', 'MX', 'JP', 'KR', 'CN', 'RU', 'AE']; 
        // $upcomingMovies = collect();

        // foreach ($regions as $region) {
        //     $response = Http::timeout(30)
        //         ->withToken(config('services.tmdb.token'))
        //         ->get('https://api.themoviedb.org/3/movie/upcoming', [
        //             'region' => $region,
        //         ])
        //         ->json();

        //     $filteredMovies = collect($response['results'])
        //         ->filter(function ($movie) {
        //             return isset($movie['release_date']) && 
        //                 Carbon::parse($movie['release_date'])->isAfter(now());
        //         });

        //     $upcomingMovies = $upcomingMovies->merge($filteredMovies);
        // }

        // $data['upcomingMovies'] = $upcomingMovies
        //     ->unique('id') 
        //     ->shuffle()
        //     ->take(10)     
        //     ->values()
        //     ->toArray();



        




        $genresArray = Http::timeout(30) 
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list') //To fetch the Movie genre
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });


        return view('movies.index', $data, [
                'genres' => $genres
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['movie'] = Http::timeout(30) // Wait 30 seconds instead of default 10
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
            ->json();

        return view('movies.show', $data);
    }


    public function topRated()
    {
        $data['topRatedMovies'] = Http::timeout(30)
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated', [
                'page' => 1, // First page (1-20 movies)
            ])
            ->json()['results'];

        // Fetch the second page (21-40 movies)
        $page2Movies = Http::timeout(30)
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated', [
                'page' => 2, // Second page (21-40 movies)
            ])
            ->json()['results'];

        // Merge both pages (total 40 movies)
        $data['topRatedMovies'] = array_merge($data['topRatedMovies'], $page2Movies);



        $genresArray = Http::timeout(30) 
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list') //To fetch the Movie genre
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });


        return view('movies.top_rated', $data, [
                'genres' => $genres
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
