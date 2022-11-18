@extends('layouts.app')

@section('content')

<div class="tv-info border-b border-gray-800">
 <div class="container mx-auto px-4 py-16 flex">
    <div class="flex-none">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'] }}"
            class="w-64" style="width: 24rem">
    </div>
        <div class="ml-24">
            <h2 class="taxt-4xl font-semibold ">{{ $tvshow['name'] }}</h2>

            <div class="flex items-center text-gray-400 mt-1">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-star-fill text-orange-500" viewBox="0 0 20 20">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg></span>
            <span class="ml-1" >{{ $tvshow['vote_average'].' Rate' }}</span>
            <span class="mx-2">|</span>
            <span>{{ \Carbon\Carbon::parse($tvshow['first_air_date'])->format('M d,Y') }}</span>
            <span class="mx-2">|</span>
            <span>
                @foreach ($tvshow['genres'] as $genre )
                {{ $genre['name'] }}@if( ! $loop->last) , @endif
                @endforeach
            </span>
        </div>
        <div class="text-gray-300 mt-8 p-10">
            <p class="p-2">
                {{ $tvshow['overview'] }}
            </p>


                <!------- Tv crew ----->
        <div class="mt-12">
            <div class="flex mt-4">
                @foreach ($tvshow['created_by'] as $crew)
                    @if($loop->index  < 2 )
                    <div class="mr-8">
                        <div>{{ $crew['name'] }}</div><br>
                        <div class="text-sm text-gary-400">Creator</div>
                    </div>
                    @else
                            @break
                @endif
            @endforeach
                </div>
        </div>
                <!-------end of Tv crew ------>

<!------------ Tv trailer ---->
    <div x-data="{ isOpen : false }">
        @if(count($tvshow['videos']['results']) > 0 )
            <div class="mt-12">
                <button
                    @click=" isOpen = true "
                    href="https://youtube.com/watch?v={{ $tvshow['videos']['results'][0]['key'] }}"
                    class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600
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
                            src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}"
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
 </div><!----- enf of the tv info class  ---->

<!--------------------------------- tv Cast------------------------------------ ------>

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold " > Cast</h2>
        <div class="grid grid-cols-5 gap-8">
            @foreach ( $tvshow['credits']['cast'] as $cast )
            @if($loop->index < 5)
            <div class="mt-8">
                <a href=" {{ route('actors.show' , $cast['id']) }}" >
                    <img  src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}"
                       class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="div mt-2">
                    <a href="{{ route('actors.show' , $cast['id']) }}"
                      class="text-lg mt-2 hover::text-gray:300">{{ $cast['name'] }}</a>
                    <div class="text-sm text-gray-400">
                        {{ $cast['character'] }}
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

<!----------------------------- tv image--------------------------------------->
<div class="movie-images">
    <div class="container mx-auto px-4 py-16 ">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-3 gap-8">
        @foreach ( $tvshow['images']['backdrops'] as $image )
        @if($loop->index < 9)
        <div class="mt-8">
            <a href="#" >
                <img  src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" >
            </a>
        </div>
        @else
            @break
        @endif
        @endforeach
    </div>
</div>
</div>


@endsection
