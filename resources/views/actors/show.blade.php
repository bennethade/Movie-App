@extends('layouts.main')

@section('content')

    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] ? 'https://image.tmdb.org/t/p/w300' . $actor['profile_path'] : 'https://ui-avatars.com/api/?size=235&name=' . $actor['name']  }}" alt="profile image" class="w-76">
                <ul class="flex items-center mt-4">
                    @if ($social['facebook_id'])
                        <li>
                            <a href="https://facebook.com/{{ $social['facebook_id'] }}" title="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24" height="24">
                                    <path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.406.593 24 1.325 24h11.491v-9.294H9.691v-3.622h3.125V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.464.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.312h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.406 24 22.676V1.325C24 .593 23.406 0 22.675 0z"/>
                                </svg>
                            </a>
                        </li>
                    @endif

                    @if ($social['instagram_id'])
                        <li class="ml-6">
                            <a href="https://instagram.com/{{ $social['instagram_id'] }}" title="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24" height="24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.34 3.608 1.316.975.975 1.254 2.242 1.316 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.34 2.633-1.316 3.608-.975.975-2.242 1.254-3.608 1.316-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.34-3.608-1.316-.975-.975-1.254-2.242-1.316-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.849c.062-1.366.34-2.633 1.316-3.608.975-.975 2.242-1.254 3.608-1.316C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.72.131 4.422.396 3.28 1.538 2.137 2.68 1.872 3.978 1.814 5.31.756 6.59.742 7 .742 12s.014 5.41.072 6.69c.058 1.332.323 2.63 1.466 3.772 1.142 1.142 2.44 1.407 3.772 1.466C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.332-.058 2.63-.323 3.772-1.466 1.142-1.142 1.407-2.44 1.466-3.772.058-1.28.072-1.689.072-6.69s-.014-5.41-.072-6.69c-.058-1.332-.323-2.63-1.466-3.772C19.578.396 18.28.131 16.948.072 15.668.014 15.259 0 12 0z"/>
                                    <path d="M12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zM18.406 4.594a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z"/>
                                </svg>
                            </a>
                        </li>
                    @endif

                    @if ($social['twitter_id'])
                        <li class="ml-6">
                            <a href="https://twitter.com/{{ $social['twitter_id'] }}" title="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24" height="24">
                                    <path d="M23.954 4.569c-.885.392-1.83.656-2.825.775a4.932 4.932 0 002.163-2.724 9.864 9.864 0 01-3.127 1.195 4.916 4.916 0 00-8.384 4.482A13.978 13.978 0 011.671 3.149 4.822 4.822 0 003.149 9.86a4.903 4.903 0 01-2.229-.616v.061a4.922 4.922 0 003.946 4.827 4.996 4.996 0 01-2.224.084 4.928 4.928 0 004.6 3.419A9.867 9.867 0 010 19.54 13.945 13.945 0 007.548 22c9.142 0 14.307-7.721 13.995-14.646a10.025 10.025 0 002.411-2.585z"/>
                                </svg>
                            </a>
                        </li>
                    @endif

                    @if ($actor['homepage'])
                        <li class="ml-6">
                            <a href="{{ $actor['homepage'] }}" title="Website">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24" height="24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm6.93 6h-3.17c-.12-1.4-.45-2.72-.96-3.88A8.03 8.03 0 0118.93 8zM12 4c.87 1.35 1.45 3.07 1.62 5H10.38c.17-1.93.75-3.65 1.62-5zM4.26 14a7.953 7.953 0 010-4h3.48c-.09.66-.14 1.32-.14 2s.05 1.34.14 2H4.26zm1.81 2h3.17c.12 1.4.45 2.72.96 3.88A8.03 8.03 0 016.07 16zM8.24 10H4.26a8.03 8.03 0 013.91-4.88c-.51 1.16-.84 2.48-.96 3.88zm3.76 10c-.87-1.35-1.45-3.07-1.62-5h3.24c-.17 1.93-.75 3.65-1.62 5zm2.99-7H9.01a9.723 9.723 0 010-2h6.01a9.723 9.723 0 010 2zm.01 7c.51-1.16.84-2.48.96-3.88h3.17a8.03 8.03 0 01-4.13 3.88zM16.52 14c.09-.66.14-1.32.14-2s-.05-1.34-.14-2h3.22a7.953 7.953 0 010 4h-3.22z"/>
                                </svg>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            
            <div class="md:ml-24"> 
                <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span>
                        <svg width="25" height="25" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <!-- Cake base -->
                                <rect x="10" y="30" width="44" height="24" rx="4" fill="#FFD54F" stroke="#FBC02D"/>
                                
                                <!-- Cake frosting (wavy top) -->
                                <path d="M10 30c2 0 3-2 5-2s3 2 5 2 3-2 5-2 3 2 5 2 3-2 5-2 3 2 5 2 3-2 5-2 3 2 4 2" fill="#FFF176" stroke="#FBC02D"/>
                                
                                <!-- Candles -->
                                <line x1="18" y1="30" x2="18" y2="20" stroke="#E57373"/>
                                <line x1="32" y1="30" x2="32" y2="20" stroke="#81C784"/>
                                <line x1="46" y1="30" x2="46" y2="20" stroke="#64B5F6"/>
                                
                                <!-- Flames -->
                                <path d="M18 18c0-1 1-2 1-2s1 1 1 2a1 1 0 11-2 0z" fill="#FF8A65"/>
                                <path d="M32 18c0-1 1-2 1-2s1 1 1 2a1 1 0 11-2 0z" fill="#FF8A65"/>
                                <path d="M46 18c0-1 1-2 1-2s1 1 1 2a1 1 0 11-2 0z" fill="#FF8A65"/>
                            </g>
                        </svg>

                    </span>
                    <span class="ml-2">Born: {{ $actor['birthday'] }} ({{ $age }} years old) in {{ $actor['place_of_birth'] }}</span>
                </div>
                <p class="text-gray-300 mt-8" style="text-align: justify">
                    {{ $actor['biography'] }}
                </p>

                <h4 class="font-semibold mt-12">Known For</h4>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8">

                     @foreach ($knownFor as $item)

                        @php
                            $isMovie = isset($item['title']);
                            $routeName = $isMovie ? 'movies.show' : 'tv.show';
                            $title = $item['title'] ?? $item['name'];
                            $releaseDate = $item['release_date'] ?? $item['first_air_date'];
                        @endphp
                        
                        <div class="mt-4">
                            <a href="{{ route($routeName, $item['id']) }}">
                                <img src="https://image.tmdb.org/t/p/w150_and_h225_bestv2/{{ $item['poster_path'] ?? 'placeholder.jpg' }}" alt="{{ $title }}" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <a href="{{ route($routeName, $item['id']) }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                                {{ $title }}
                            </a>
                             @if ($releaseDate)
                                <a href="{{ route($routeName, $item['id']) }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                                    {{ date('d M Y', strtotime($releaseDate)) }}
                                </a>
                            @endif
                        </div>
                    @endforeach
                    
                </div>              
            </div>
        </div>
    </div> 
    <!-- End Actor info-->


    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($allCredits as $credit)
                    <li>{{ $credit['year'] }} &middot; <strong>{{ $credit['title'] }}</strong> @if (!empty($credit['character'])) as {{ $credit['character'] }} @endif</li>
                @endforeach
            </ul>            
        </div>
    </div>
    <!--End Credits-->



    

@endsection