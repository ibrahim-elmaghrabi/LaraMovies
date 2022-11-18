<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    public $search ='';
    public function render()
    {
        $searchResults =[];

        if(strlen($this ->search) >=2 )
        {
            $searchResults =Http::get('https://api.themoviedb.org/3/search/movie?api_key=026707dd5e250c3b3b85312474fa39af&query='.$this->search)
                    ->json()['results'] ;

        }


        return view('livewire.search' , [
            'searchResults' =>  collect($searchResults)->take(7) ,
        ]);
    }
}
