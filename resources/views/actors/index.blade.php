 @extends('layouts.main')

@section('content')


    <div class="container mx-auto px-4 py-16">
        
        <div class="upcoming-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularActors as $actor)
                    <div class="actor mt-8">
                        <a href="{{ route('actors.show', $actor['id']) }}">
                            @if (!empty($actor['profile_path']))
                                <img src="https://image.tmdb.org/t/p/w235_and_h235_face/{{ $actor['profile_path'] }}" alt="Profile image" class="hover:opacity-75 transition ease-in-out duration-150">
                            @else
                                <img src="https://ui-avatars.com/api/?size=235&name={{ $actor['name'] }}" alt="">
                            @endif
                        </a>
                        <div class="mt-2">
                            <a href="" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm text-gray-400 truncate">
                                @foreach ($actor['known_for'] as $movie)
                                    {{ $movie['title'] ?? $movie['name'] }}@if (!$loop->last), @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>  <!-- END POPULAR ACTORS -->


        {{-- <div class="flex justify-between mt-16">
            @if ($previous)
                <a href="{{ route('actors.index', ['page' => $previous]) }}" class="text-orange-500 hover:underline">Previous</a>
            @else
                <span></span> 
            @endif

            @if ($next)
                <a href="{{ route('actors.index', ['page' => $next]) }}" class="text-orange-500 hover:underline">Next</a>
            @endif
        </div> --}}


        <div class="scroll-status text-center my-6">
            <div class="infinite-scroll-request spinner text-orange-500">Loading...</div>
            <p class="infinite-scroll-last text-gray-500">End of results</p>
            <p class="infinite-scroll-error text-red-500">Error loading data</p>
        </div>


    </div>
    



@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@5/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll(elem, {
            path: function () {
                return `/actors/page/${this.pageIndex + 1}`;
            },
            append: '.actor',
            history: false,
            scrollThreshold: 400, 
            status: '.scroll-status', 
        });
    </script>
@endsection
