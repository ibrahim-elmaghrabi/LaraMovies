<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{
    public function index($page = 1){

         abort_if($page > 500 ,204 );

        $popularActors = Http::get('https://api.themoviedb.org/3/person/popular?api_key=026707dd5e250c3b3b85312474fa39af&page='.$page)
        ->json()['results'];


        $previous =  $page > 1  ? $page-1 : null ;

        $next =   $page < 500  ? $page + 1 : null ;

        return view('actors.index' , [
                'popularActors' => $popularActors,
                 'page'         =>$page ,
                'previous'     => $previous,
                'next'         => $next ,
        ]) ;
    }




    public function show($id){

         $actor = Http::get('https://api.themoviedb.org/3/person/'.$id.'?api_key=026707dd5e250c3b3b85312474fa39af')
        ->json();


         $credits = Http::get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits?api_key=026707dd5e250c3b3b85312474fa39af')
        ->json();

         $social = Http::get('https://api.themoviedb.org/3/person/'.$id.'/external_ids?api_key=026707dd5e250c3b3b85312474fa39af')
        ->json();

        $works =   collect($credits['cast'] )->where('media_type' , 'movie')->pluck('title')->union(
                    collect($credits['cast'] )->where('media_type' , 'tv')->pluck('name'),
                    )  ;

//            dd($credits) ;
        return view('actors.show' , [
            'actor'   =>$actor ,
            'social'  =>$social ,
            'credits' =>$credits ,
            'works'   =>$works
        ]);

    }
}
