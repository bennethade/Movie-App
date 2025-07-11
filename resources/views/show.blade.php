@extends('layouts.main')

@section('content')

    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path']}}" alt="" class="w-64 md:w-96" style="width: 24rem">
            <div class="md:ml-24"> 
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span><img src="{{ asset('images/star.png') }}" alt="last night" class="fill-current w-4"></span>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ date('d M, Y', strtotime($movie['release_date'])) }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last),@endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div> 
                            @endif
                        @endforeach
                    </div>
                </div>

                @if (count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <span><img src="{{ asset('images/play-button.png') }}" alt="last night" class="fill-current w-4"></span>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div> 
    <!-- End movie info-->


    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                        <div class="mt-8">
                            <a href="">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300' . $cast['profile_path']}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150" style="width: 24rem">
                            </a>
                            <div class="mt-2">
                                <a href="" class="text-lg mt2 hover:text-gray-300">{{ $cast['name'] }}</a>
                                <div class="flex items-center text-gray-400 text-sm mt-1">
                                    <a href="" class="text-lg mt2 hover:text-gray-300">{{ $cast['character'] }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach              
                
            </div>
        </div>
    </div>
    <!--End Cast-->



    <div class="movie-images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Movie Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                        <div class="mt-8">
                            <img src="{{ 'https://image.tmdb.org/t/p/w300' . $image['file_path']}}" alt="last night" class="hover:opacity-75 w-150 h-60">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>


@endsection