@extends('layouts.main')

@section('content')


    <div class="container mx-auto px-4 pt-16">
        
        <div class="upcoming-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Upcoming Movies</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($upcomingMovies as $movie)
                    {{-- <x-movie-card :movie="$movie" :genres="$genres"/> --}}

                    <div class="mt-8">
                        <a href="{{ route('movies.show',$movie['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path']}}" alt="{{ $movie['title'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movies.show',$movie['id']) }}" class="text-lg mt2 hover:text-gray-300">{{ $movie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><img src="{{ asset('images/star.png') }}" alt="last night" class="fill-current w-4"></span>
                                <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
                                <span class="mx-2">|</span>
                                <span>{{ date('d M, Y', strtotime($movie['release_date'])) }}</span>
                            </div>
                            
                            <div class="text-gray-400 text-sm">
                                @foreach ($movie['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if (!$loop->last),@endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>  <!-- END POPULAR MOVIES -->


        <div class="popular-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    {{-- <x-movie-card :movie="$movie" :genres="$genres"/> --}}

                    <div class="mt-8">
                        <a href="{{ route('movies.show',$movie['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path']}}" alt="{{ $movie['title'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movies.show',$movie['id']) }}" class="text-lg mt2 hover:text-gray-300">{{ $movie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><img src="{{ asset('images/star.png') }}" alt="last night" class="fill-current w-4"></span>
                                <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
                                <span class="mx-2">|</span>
                                <span>{{ date('d M, Y', strtotime($movie['release_date'])) }}</span>
                            </div>
                            
                            <div class="text-gray-400 text-sm">
                                @foreach ($movie['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if (!$loop->last),@endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>  <!-- END POPULAR MOVIES -->


        <div class="now-playing-movies py-14">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $movie)
                    {{-- <x-movie-card :movie="$movie" :genres="$genres"/> --}}

                    <div class="mt-8">
                        <a href="{{ route('movies.show',$movie['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path']}}" alt="{{ $movie['title'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movies.show',$movie['id']) }}" class="text-lg mt2 hover:text-gray-300">{{ $movie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><img src="{{ asset('images/star.png') }}" alt="last night" class="fill-current w-4"></span>
                                <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
                                <span class="mx-2">|</span>
                                <span>{{ date('d M, Y', strtotime($movie['release_date'])) }}</span>
                            </div>
                            
                            <div class="text-gray-400 text-sm">
                                @foreach ($movie['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if (!$loop->last),@endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
                
                
            </div>
        </div>  <!-- END NOW PLAYING -->

    </div>
    



@endsection