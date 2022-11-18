@extends('layouts.app')

@section('content')

<div class="movie-info border-b border-gray-800">
 <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
    <div class="flex-none">
        <img  src="{{ 'https://image.tmdb.org/t/p/w300/'.$actor['profile_path'] }}"class="w-76"
        style="width: 24rem">
        <ul class="flex items-center mt-4 ml-2">
            @if($social['facebook_id'])
            <li class="mr-3">
                <a href="https://www.facebook.com/{{ $social['facebook_id'] }}"><i class="fa-brands fa-sharp fa-facebook"></i></a>
            </li>
             @endif
             @if ($social['instagram_id'] )
            <li class="mr-3">
                <a href="https://www.instagram.com/{{ $social['instagram_id'] }}"><i class="fa-brands fa-square-instagram"></i></a>
            </li>
            @endif
            @if ($social['twitter_id'])
            <li class="mr-3">
                <a href="https://twitter.com/{{ $social['twitter_id'] }}"><i class="fa-brands fa-twitter"></i></a>
            </li>
            @endif
        </ul>
        </div>
            <div class="ml-24">
                <h2 class="text-4xl font-semibold ">{{  $actor['name']}}</h2>
                <div class="flex items-center text-gray-400 mt-1">
                    <span class="ml-2 mt-2">{{ \Carbon\Carbon::parse($actor['birthday'])->format('M d,Y') }}| {{ $actor['place_of_birth'] }} </span>
                </div>
                <div class="text-gray-300 mt-8 p-10">
                    <p class="p-2 leading-6">{{ $actor['biography'] }}</p>
                </div>
                <div class="ml-12">
                    <h1 class="text-lg text-red-600 "># popular works</h1>
                    <ul>
                    @foreach ($works as $work )
                        @if($loop->index < 6 )
                            <li>
                            <a  class="text-lg leading-normal block text-gray-100 hover:text-white mt-2 ">
                                    {{ $work }}
                            </a>
                        </li>
                        @endif
                      @endforeach
                </ul>
                </div>
            </div>
         </div>
    </div>

@endsection
