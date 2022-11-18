@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 pt-16">
    <div class="popular movies">
        <h2 class="uppercase tracking-wider text-red-700 text-xl font-semibold"> popular movies...</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($popularMovies as $movie )
                <x-movie-card :movie=$movie :genres=$genres ></x-movie-card>
            @endforeach
        </div>
    </div>
</div>



<!---------playing now movies---------->

<div class="container mx-auto px-4 pt-16">
    <div class="popular movies">
        <h2 class="uppercase tracking-wider text-red-700 text-xl font-semibold">Playing Now</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($playingMovies as $movie )
                  <x-movie-card :movie=$movie :genres=$genres ></x-movie-card>
            @endforeach
        </div>
    </div>
</div>

@endsection
