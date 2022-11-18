<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(){

        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=026707dd5e250c3b3b85312474fa39af')
        ->json()['results'];

        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=026707dd5e250c3b3b85312474fa39af')
        ->json()['genres'];

        $genres =collect($genresArray)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name'] ] ;
        });

        $playingNow_Movies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=026707dd5e250c3b3b85312474fa39af')
            ->json()['results'];



        return view('movies.index' , [
            'popularMovies'  => $popularMovies ,
            'genres'         => $genres ,
            'playingMovies'  => $playingNow_Movies ,
            ]) ;
    }



    public function show($id){
        $singleMovie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=026707dd5e250c3b3b85312474fa39af&append_to_response=credits,videos,images')
        ->json();
         //dd($singleMovie) ;

        return view('movies.show' , ['movie' => $singleMovie]) ;
    }
}
