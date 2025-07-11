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