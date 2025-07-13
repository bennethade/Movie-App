@extends('layouts.main')

@section('content')

    <div class="tv-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $tvShow['poster_path']}}" alt="" class="w-64 md:w-96" style="width: 24rem">
            <div class="md:ml-24"> 
                <h2 class="text-4xl font-semibold">{{ $tvShow['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span><img src="{{ asset('images/star.png') }}" alt="last night" class="fill-current w-4"></span>
                    <span class="ml-1">{{ $tvShow['vote_average'] * 10 }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ date('d M, Y', strtotime($tvShow['first_air_date'])) }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($tvShow['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last),@endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8" style="text-align: justify">
                    {{ $tvShow['overview'] }}
                </p>

                <div class="mt-12">
                    <div class="flex mt-4">
                        @foreach ($tvShow['created_by'] as $crew)
                            {{-- @if ($loop->index < 5) --}}
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">Creator</div>
                                </div>
                            {{-- @endif --}}
                        @endforeach
                    </div>
                </div>

                <div x-data="{isOpen: false}">
                    @if (count($tvShow['videos']['results']) > 0)
                        <div class="mt-12">
                            <button 
                                @click="isOpen = true"
                                class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <span><img src="{{ asset('images/play-button.png') }}" alt="last night" class="fill-current w-4"></span>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                    @endif

                    <div style="background-color: rgba(0, 0, 0, .5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show.transition.opacity="isOpen">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-auto"  @click="isOpen = false">
                            <div class="flex justify-end pr-4 pt-2">
                                <button 
                                    @click="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="text-3xl leading-none hover:text-gray-300">&times;
                                </button>
                            </div>

                            <div class="modal-body px-8 py-8">
                                <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                    @if (!empty($tvShow['videos']['results'][0]['key'] ))
                                        <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="http://www.youtube.com/embed/{{ $tvShow['videos']['results'][0]['key'] }}" style="border: 0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    @else
                                        <p>Triller not available</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                 
            </div>
        </div>
    </div> 
    <!-- End tv info-->


    <div class="tvShow-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($tvShow['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                        <div class="mt-8">
                            <a href="{{ route('actors.show', $cast['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300' . $cast['profile_path']}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150" style="width: 24rem">
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt2 hover:text-gray-300">{{ $cast['name'] }}</a>
                                <div class="flex items-center text-gray-400 text-sm mt-1">
                                    <a href="" class="text-lg mt2 hover:text-gray-300">{{ $cast['character'] }}</a>
                                </div>
                            </div>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach              
                
            </div>
        </div>
    </div>
    <!--End Cast-->



    <div class="tvShow-images" x-data="{isOpen:false, image:''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">tvShow Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($tvShow['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                        <div class="mt-8">
                            <a href="" @click.prevent="
                                isOpen = true
                                image='{{ 'https://image.tmdb.org/t/p/original' . $image['file_path']}}'
                                "
                            >
                                <img src="{{ 'https://image.tmdb.org/t/p/w300' . $image['file_path']}}" alt="last night" class="hover:opacity-75 w-150 h-60">
                            </a>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>

            <div style="background-color: rgba(0, 0, 0, .5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show="isOpen">
                <div class="container mx-auto lg:px-32 rounded-lg overflow-auto"  @click="isOpen = false">
                    <div class="flex justify-end pr-4 pt-2">
                        <button 
                            @click="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            class="text-3xl leading-none hover:text-gray-300">&times;
                        </button>
                    </div>

                    <div class="modal-body px-8 py-8">
                        <img :src="image" alt="poster">
                    </div>

                </div>
            </div>

            

        </div>
    </div>


@endsection