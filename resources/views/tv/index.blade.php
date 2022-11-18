@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 pt-16">
    <div class="popular TV">
        <h2 class="uppercase tracking-wider text-red-700 text-xl font-semibold">Popular Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($popularTv as $tvshow )
                     <x-tv-card :tvshow="$tvshow" :genres="$genres" ></x-tv-card>
            @endforeach
        </div>
    </div>
</div>



<!--------- Top Rated Shows...---------->

<div class="container mx-auto px-4 pt-16">
    <div class="popular movies">
        <h2 class="uppercase tracking-wider text-red-700 text-xl font-semibold">Top Rated Shows...</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ( $topRatedTvs as $tvshow )
                    <x-tv-card :tvshow="$tvshow" :genres="$genres" ></x-tv-card>
           @endforeach
        </div>
    </div>
</div>




















@endsection
