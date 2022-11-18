@extends('layouts.app')

@section('content')

<div class="movie-info border-b border-gray-800">
     <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                class="w-64 md:w-96" style="width: 24rem" />
            <div class="md:ml-24">
                <h2 class="text-4xl mb-2 font-semibold ">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-star-fill text-orange-500" viewBox="0 0 20 20">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <span class="ml-1" >{{ $movie['vote_average'] }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}</span>
                        <span class="mx-2">|</span>
                        <span>
                            @foreach ($movie['genres'] as $genre )
                                <span>{{ $genre['name'] }}</span>
                            @endforeach
                        </span>
                </div>
                <p class="text-gray-300 leading-7 mt-8">
                        {{ $movie['overview'] }}
                </p>
<!------------ movie crew --------------------------------------------------------------->
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                            @foreach ($movie['credits']['crew'] as $crew )
                                @if ($loop->index < 2)
                                    <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                                @endif
                            @endforeach
                    </div>
                </div>
<!-------------------end of mocvie crew-------------------------------------------------- ------>


<!------------ movie trailer -------------------------------------------->
            <div x-data="{ isOpen : false }">
                @if(count($movie['videos']['results']) > 0 )
                    <div class="mt-12">
                        <button
                            @click=" isOpen = true "
                            href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
                            class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600
                            transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0
                                        .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                            </svg>
                            <span class="ml-2">Play trailer</span>
                        </button>
                    </div>
                @endif
                <div style="background-color: rgba(0,0,0,.5) ;"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show.transition.opacity= " isOpen " >
                        <div class="container mx-auto lg:px-32 rounded-lg  overflow-y-auto ">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2 ">
                                    <button
                                    @click=" isOpen = false "
                                    class="text-3xl leading-none  hover:text-gray-300">&times;</button>
                                </div>
                                <div class="model-body px-8 py-8 ">
                                    <div class="responsive-container overflow-hiddden relative" style="padding-top:56.25%">
                                    <iframe width="560" height="315"
                                    class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                    src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!----- enf of the movie info class--------------------------------------------------  ---->

<!--------------------------------- movie Cast------------------------------------ ------>

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold " > Cast</h2>
        <div class="grid grid-cols-5 gap-8">
            @foreach ($movie['credits']['cast'] as $cast )
                 @if ($loop->index < 5)
                    <div class="mt-8">
                        @if($cast['profile_path'])
                        <a href=" {{ route('actors.show' , $cast['id']) }} ">
                            <img  src="https://image.tmdb.org/t/p/w500{{ $cast['profile_path'] }}"
                            class="hover:opacity-75 transition ease-in-out duration-150 " />
                        </a>
                        @else
                         <img src='https://ui-avatars.com/api/?size=900&name='.{{ $cast['name'] }} />
                        @endif
                        <div class="div mt-2">
                            <a href="#"
                            class="text-lg mt-2 hover::text-gray:300">{{ $cast['name'] }}</a>
                            <div class="text-sm text-gray-400">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                      </div>
                 @endif
            @endforeach
        </div>
    </div>
</div>

<!----------------------------- movie image----------------------------------------------->
<div class="movie-images">
        <div class="container mx-auto px-4 py-16 ">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images']['posters'] as $poster )
                    @if($loop->index < 6)
                        <div class="mt-8">
                            <a href="#" >
                                <img  src="https://image.tmdb.org/t/p/w500{{ $poster['file_path'] }}"
                                    style="height: 400px ; width: 800px ;" >
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
</div>


@endsection
