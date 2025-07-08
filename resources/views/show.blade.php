@extends('layouts.main')

@section('content')

    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhXxaHqLwrzvVQ58G9ozvTBlL-XiYe4QdPZwAD7ZLFLgJtgMwatpFgp36N5nPZpD79cvTdeUHWPDBYAHJrReZREfetUXY2FMtuX5JMo9VRu1ZXQ_qIw7SoI4ywG_2cs293g902AvHT_CuE/s1600/Make+a+Movie+Poster+Style+Photo+Effect+in+Photoshop.jpg" alt="last night" class="w-64 md:w-96" style="width: 24rem">
            <div class="md:ml-24"> 
                <h2 class="text-4xl font-semibold">Last Night (2020)</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span><img src="{{ asset('images/star.png') }}" alt="last night" class="fill-current w-4"></span>
                    <span class="ml-1">85%</span>
                    <span class="mx-2">|</span>
                    <span>Feb 28, 2020</span>
                    <span class="mx-2">|</span>
                    <span>Action, Thriller, Comedy</span>
                </div>
                <p class="text-gray-300 mt-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur mollitia corporis temporibus. Magni tempora id a quas. Numquam temporibus dolores ducimus modi similique nostrum dignissimos. Rem autem at doloremque rerum obcaecati numquam quaerat error sit, odio modi eos! Ad, at! Magni minima excepturi mollitia, eligendi alias aliquid laudantium labore sit.
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Bong Joon-ho</div>
                            <div class="text-sm text-gray-400">Screenplay, Director, Story</div>
                        </div>
                        <div class="ml-8">
                            <div>Han Jin-won</div>
                            <div class="text-sm text-gray-400">Screenplay</div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                        <span><img src="{{ asset('images/play-button.png') }}" alt="last night" class="fill-current w-4"></span>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div>
    </div> 
    <!-- End movie info-->


    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8">
                    <a href="">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhXxaHqLwrzvVQ58G9ozvTBlL-XiYe4QdPZwAD7ZLFLgJtgMwatpFgp36N5nPZpD79cvTdeUHWPDBYAHJrReZREfetUXY2FMtuX5JMo9VRu1ZXQ_qIw7SoI4ywG_2cs293g902AvHT_CuE/s1600/Make+a+Movie+Poster+Style+Photo+Effect+in+Photoshop.jpg" alt="last night" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt2 hover:text-gray-300">Last Night</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <a href="" class="text-lg mt2 hover:text-gray-300">John Smith</a>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhXxaHqLwrzvVQ58G9ozvTBlL-XiYe4QdPZwAD7ZLFLgJtgMwatpFgp36N5nPZpD79cvTdeUHWPDBYAHJrReZREfetUXY2FMtuX5JMo9VRu1ZXQ_qIw7SoI4ywG_2cs293g902AvHT_CuE/s1600/Make+a+Movie+Poster+Style+Photo+Effect+in+Photoshop.jpg" alt="last night" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt2 hover:text-gray-300">Last Night</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <a href="" class="text-lg mt2 hover:text-gray-300">John Smith</a>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhXxaHqLwrzvVQ58G9ozvTBlL-XiYe4QdPZwAD7ZLFLgJtgMwatpFgp36N5nPZpD79cvTdeUHWPDBYAHJrReZREfetUXY2FMtuX5JMo9VRu1ZXQ_qIw7SoI4ywG_2cs293g902AvHT_CuE/s1600/Make+a+Movie+Poster+Style+Photo+Effect+in+Photoshop.jpg" alt="last night" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt2 hover:text-gray-300">Last Night</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <a href="" class="text-lg mt2 hover:text-gray-300">John Smith</a>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhXxaHqLwrzvVQ58G9ozvTBlL-XiYe4QdPZwAD7ZLFLgJtgMwatpFgp36N5nPZpD79cvTdeUHWPDBYAHJrReZREfetUXY2FMtuX5JMo9VRu1ZXQ_qIw7SoI4ywG_2cs293g902AvHT_CuE/s1600/Make+a+Movie+Poster+Style+Photo+Effect+in+Photoshop.jpg" alt="last night" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt2 hover:text-gray-300">Last Night</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <a href="" class="text-lg mt2 hover:text-gray-300">John Smith</a>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhXxaHqLwrzvVQ58G9ozvTBlL-XiYe4QdPZwAD7ZLFLgJtgMwatpFgp36N5nPZpD79cvTdeUHWPDBYAHJrReZREfetUXY2FMtuX5JMo9VRu1ZXQ_qIw7SoI4ywG_2cs293g902AvHT_CuE/s1600/Make+a+Movie+Poster+Style+Photo+Effect+in+Photoshop.jpg" alt="last night" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt2 hover:text-gray-300">Last Night</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <a href="" class="text-lg mt2 hover:text-gray-300">John Smith</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Cast-->



    <div class="movie-images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="mt-8">
                    <img src="{{ asset('images/movie-images/movie-image-1.jpg') }}" alt="last night" class="hover:opacity-75 w-150 h-80">
                </div>

                <div class="mt-8">
                    <img src="{{ asset('images/movie-images/movie-image-2.jpg') }}" alt="last night" class="hover:opacity-75 w-150 h-80">
                </div>

                <div class="mt-8">
                    <img src="{{ asset('images/movie-images/movie-image-3.jpg') }}" alt="last night" class="hover:opacity-75 w-150 h-80">
                </div>
            </div>
        </div>
    </div>


@endsection