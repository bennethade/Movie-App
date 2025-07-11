<div x-data="{ open: false }" class="relative">
    <input 
        wire:model.live.debounce.300ms="search"
        x-on:focus="open = true"
        x-on:click.away="open = false"
        type="text" 
        class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" 
        placeholder="Search"
    >

    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
            <path d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm9-1.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
    </div>
    
    <div 
        x-show="open && strlen(search) > 2"
        x-transition
        class="absolute bg-gray-800 rounded w-64 mt-2 z-50"
    >
        @if(count($results))
            <ul>
                @foreach($results as $result)
                    <li class="border-b border-gray-700">
                        <a 
                            href="{{ route('movies.show', $result['id']) }}" 
                            class="hover:bg-gray-700 px-3 py-3 flex items-center"
                        >
                            <img 
                                src="{{ $result['poster_path'] ? 'https://image.tmdb.org/t/p/w92/'.$result['poster_path'] : 'https://via.placeholder.com/50x75' }}" 
                                alt="poster" 
                                class="w-8"
                            >
                            <span class="ml-4">{{ $result['title'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="px-3 py-3">No results found</div>
        @endif
    </div>
</div>