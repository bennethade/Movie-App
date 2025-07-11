<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

            //USE THE BELOW CALL IF cURL GIVES ERROR
        // $data['popularMovies'] = Http::withOptions(['verify' => false])
        //     ->withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/popular')
        //     ->json();


        $genresArray = Http::timeout(30) 
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list') //To fetch the Movie genre
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });


        return view('index', $data, [
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

        return view('show', $data);
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
