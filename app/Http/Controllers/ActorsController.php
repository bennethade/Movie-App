<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page = 1) 
    {
        $response = Http::timeout(30)
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular?page=' . $page)
            ->json();

        $data['popularActors'] = $response['results'] ?? [];
        $data['currentPage'] = $page;
        $data['previous'] = $page > 1 ? $page - 1 : null;
        $data['next'] = $page < ($response['total_pages'] ?? 500) ? $page + 1 : null;

        return view('actors.index', $data);
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
        $actor = Http::timeout(30)
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id)
            ->json();


        $social = Http::timeout(30)
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id . '/external_ids')
            ->json();


        $credits = Http::timeout(30)
            ->withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id . '/combined_credits')
            ->json();


        $knownFor = collect($credits['cast'] ?? [])
            // ->where('media_type', 'movie')  
            ->sortByDesc('popularity')
            ->take(5)
            ->values()
            ->all();


        $allCredits = collect($credits['cast'] ?? [])
            ->sortByDesc('release_date') // fallback handled below
            ->map(function ($credit) {
                // Use release_date for movies, first_air_date for TV
                $date = $credit['release_date'] ?? $credit['first_air_date'] ?? null;
                return [
                    'year' => $date ? \Carbon\Carbon::parse($date)->format('Y') : 'N/A',
                    'title' => $credit['title'] ?? $credit['name'] ?? 'Untitled',
                    'character' => $credit['character'] ?? '',
                ];
            })
            ->sortByDesc('year')
            ->values();



        // Parse birthday and calculate age
        $birthday = $actor['birthday'] ?? null;
        $age = null;

        if ($birthday) {
            $age = Carbon::parse($birthday)->age;
        }


        return view('actors.show', [
            'actor' => $actor,
            'age' => $age,
            'social' => $social,
            'credits' => $credits,
            'knownFor' => $knownFor,
            'allCredits' => $allCredits,
        ]);
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
