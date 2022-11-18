<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function index(){
        $popularTv =Http::get('http://api.themoviedb.org/3/tv/popular?api_key=026707dd5e250c3b3b85312474fa39af')
              ->json()['results'];

      $genersArray =Http::get('http://api.themoviedb.org/3/genre/tv/list?api_key=026707dd5e250c3b3b85312474fa39af')
              ->json()['genres'];

          $genres =collect($genersArray)->mapWithKeys(function ($genre){
              return [ $genre['id'] => $genre['name'] ]  ;
          });

          ////////playing movies
          $topRatedTvs =Http::get('http://api.themoviedb.org/3/tv/top_rated?api_key=026707dd5e250c3b3b85312474fa39af')
              ->json()['results'];


        return view('tv.index' , [
              'popularTv' =>   $popularTv ,
              'genres'        =>  $genres,
              'topRatedTvs'=>  $topRatedTvs,
          ]);
    }



    public function show($id){

        $tvshow =Http::get('http://api.themoviedb.org/3/tv/'.$id.'?api_key=026707dd5e250c3b3b85312474fa39af&append_to_response=credits,videos,images')
              ->json();

             return view('tv.show' , [
                'tvshow' =>$tvshow,
             ]);
    }
}
