@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-16">
    <div class="popular Actors">
        <h2 class="uppercase tracking-wider text-red-700 text-xl font-semibold">
            popular Actors...
         </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
             @foreach ($popularActors as $actor )
                <div class="actors mt-8">
                    @if($actor['profile_path'])
                        <a href="{{ route('actors.show' ,['actor' => $actor['id'] ] ) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w235_and_h235_face'.$actor['profile_path'] }}"
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        @else
                        <img src='https://ui-avatars.com/api/?size=235&name='.{{ $actor['name'] }} />
                    @endif
                    <div class="mt-2" >
                        <a href="{{ route('actors.show' , $actor['id'] ) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                        <div class="text-sm truncate text-gray-400 mt-2 ">
                            {{ collect($actor['known_for'])->where('media_type' , 'movie')->pluck('title')->union(
                                    collect($actor['known_for'])->where('media_type' , 'tv')->pluck('name')
                            )-> implode(', ') }}
                        </div>
                    </div>
                </div>

             @endforeach

        </div>
    </div>
<!------ pagination ----->
    <div class="flex justify-between mt-16"  >
            @if( $previous )
                <button  style="border-color: #2196F3;
                    color: dodgerblue ;  padding: 4px 10px; border: 2px solid blue;  cursor: pointer;">
                    <a href="/actors/page/{{ $previous }}">Previous</a>
                </button>
            @else
                    <div></div>
            @endif
            @if($next)
                <button  style="border-color: #2196F3;
                    color: dodgerblue ;  padding: 4px 10px; border: 2px solid blue;  cursor: pointer;" >
                    <a href="/actors/page/{{ $next }}">Next</a>
                </button>
            @else
                    <div></div>
            @endif
    </div>

</div>
@endsection
