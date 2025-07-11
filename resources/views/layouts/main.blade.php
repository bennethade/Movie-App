<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>

    @vite('resources/css/app.css')

    @livewireStyles
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}



</head>
<body class="font-sans bg-gray-900 text-white">
    
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="/">
                        <img src="{{ asset('images/logo.png') }}" class="w-30" viewBox="0 0 96 24" fill="none" alt="">
                    </a>
                </li>

                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">TV Shows</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">Actors</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('movies.top_rated') }}" class="hover:text-gray-300">Top Rated</a>
                </li>
            </ul>

            <div class="flex flex-col md:flex-row items-center">

                {{-- <livewire:search-dropdown> --}}

                <div x-data="searchDropdown()" class="relative">
                    <input
                        x-model="search"
                        x-on:focus="open = true"
                        x-on:click.away="open = false"

                        x-ref="search"
                        @keydown.window="
                            if(event.keyCode === 191){
                                event.preventDefault();
                                $refs.search.focus();
                            }
                        "

                        x-on:keydown.window.escape="open = false"
                        type="text"
                        placeholder="Search"
                        class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 pr-10 focus:outline-none focus:shadow-outline"
                    >

                    <!-- Left-side Search Icon -->
                    <div class="absolute top-0 left-0">
                        <img src="{{ asset('images/search-symbol.png') }}" class="w-4 text-gray-500 mt-2 ml-2">
                    </div>

                    <!-- Right-side Spinner -->
                    <div class="absolute top-0 right-0 flex items-center h-full pr-3" x-show="loading">
                        <svg class="animate-spin h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                    </div>

                    <div
                        x-show="open && (results.length || (!results.length && search.length >= 3))"
                        x-transition
                        class="absolute bg-gray-800 rounded w-64 mt-2 z-50"
                    >
                        <template x-for="result in results" :key="result.id">
                            <a
                                :href="'/movies/' + result.id"
                                class="border-b border-gray-700 hover:bg-gray-700 px-3 py-3 flex items-center"
                            >
                                <img
                                    :src="result.poster_path ? 'https://image.tmdb.org/t/p/w92/' + result.poster_path : 'https://via.placeholder.com/50x75'"
                                    alt="poster"
                                    class="w-8"
                                >
                                <span class="ml-4" x-text="result.title"></span>
                            </a>
                        </template>

                        <div x-show="!results.length && search.length >= 3" class="px-3 py-3">No results found</div>
                    </div>
                </div>

                    
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="">
                        <img src="{{ asset('images/user-avater.png') }}" alt="" class="rounded-full w-8 h-8">
                    </a>
                </div>
                
            </div>

            

        </div>
    </nav>

    @yield('content')

<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Custom Alpine Component -->
<script>
    function searchDropdown() {
        return {
            search: '',
            results: [],
            open: false,
            loading: false,
            timeout: null,

            init() {
                this.$watch('search', value => {
                    clearTimeout(this.timeout);
                    if (value.length >= 3) {
                        this.open = true;
                        this.loading = true;
                        this.timeout = setTimeout(() => this.fetchResults(value), 300);
                    } else {
                        this.results = [];
                        this.open = false;
                        this.loading = false;
                    }
                });
            },

            async fetchResults(query) {
                this.loading = true;
                try {
                    const response = await axios.get(`/search-tmdb?query=${encodeURIComponent(query)}`);
                    this.results = response.data;
                } catch (error) {
                    console.error('Search failed:', error);
                } finally {
                    this.loading = false;
                }
            }
        };
    }
</script>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


</body>
</html>