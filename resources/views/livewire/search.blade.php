
<div class="relative mt-3 md:mt-0" x-data="{ isOpen : true  }" @click.away=" isOpen = false ">
<input
        wire:model="search"
        type="search"
        class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 "
        placeholder="Search"
        aria-label="Search"
        aria-describedby="search-addon"
        @focus= " isOpen = true "
        @keydown = " isOpen = true "
        @keydown.escape.window = " isOpen = false"
        @keydown.shift.tab = " isOpen = false"
    />
    <div class="absolute top-0">
    <i class="fa fa-magnifying-glass fill-current text-gray-500 w-4 mt-1 ml-2"></i>
    </div>


 @if(strlen($search) >= 2 )
        <div class="z-50 absolute bg-gray-800  rounded w-64  mt-4 "
          x-show.transition.opacity="isOpen"

           >
            @if($searchResults->count() > 0 )
            <ul>
                @foreach ($searchResults as $result )
                    <li class="border-b border-gray-700 rounded ">
                        <a
                        href="{{ route('movies.show'  , $result['id']) }}"
                        class="flex hover:bg-gray-700 px-3 py-3  items-center"

                        @if($loop->last) @keydown.tab.exact = " isOpen = false" @endif

                        >
                        @if($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}"  alt="poster"
                                class="w-8" >
                        @else
                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8" >
                        @endif
                        <span class="ml-4">{{ $result['title'] }}</span>
                        </a>
                    </li>
            @endforeach
            </ul>
            @else
            <div class="px-3 py-3 ">No results for "{{ $search  }}"</div>
            @endif
          </div>

    @endif

</div>
