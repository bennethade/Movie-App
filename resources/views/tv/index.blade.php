@extends('layouts.main')

@section('content')


    <div class="container mx-auto px-4 pt-16">
        
        <div class="upcoming-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Tv Shows</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTv as $tvShows)

                    <div class="mt-8">
                        <a href="{{ route('tv.show',$tvShows['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $tvShows['poster_path']}}" alt="{{ $tvShows['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('tv.show',$tvShows['id']) }}" class="text-lg mt2 hover:text-gray-300">{{ $tvShows['name'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><img src="{{ asset('images/star.png') }}" alt="last night" class="fill-current w-4"></span>
                                <span class="ml-1">{{ $tvShows['vote_average'] * 10 }}%</span>
                                <span class="mx-2">|</span>
                                <span>{{ date('d M, Y', strtotime($tvShows['first_air_date'])) }}</span>
                            </div>
                            
                            <div class="text-gray-400 text-sm">
                                @foreach ($tvShows['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if (!$loop->last),@endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>  <!-- END POPULAR TV -->


        <div class="top-rated-tv py-14">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Shows</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($topRatedTv as $tvShows)

                    <div class="mt-8">
                        <a href="{{ route('tv.show',$tvShows['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $tvShows['poster_path']}}" alt="{{ $tvShows['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('tv.show',$tvShows['id']) }}" class="text-lg mt2 hover:text-gray-300">{{ $tvShows['name'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><img src="{{ asset('images/star.png') }}" alt="last night" class="fill-current w-4"></span>
                                <span class="ml-1">{{ $tvShows['vote_average'] * 10 }}%</span>
                                <span class="mx-2">|</span>
                                <span>{{ date('d M, Y', strtotime($tvShows['first_air_date'])) }}</span>
                            </div>
                            
                            <div class="text-gray-400 text-sm">
                                @foreach ($tvShows['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if (!$loop->last),@endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
                
                
            </div>
        </div>  <!-- END TOP RATED SHOWS -->

    </div>
    



@endsection