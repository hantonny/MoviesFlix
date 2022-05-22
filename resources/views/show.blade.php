@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-3 flex flex-col md:flex-row">
            <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="{{$movie['title']}}"
            class="w-64 lg:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">
                    {{$movie['title']}}
                </h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star text-orange-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                    </svg>
                    <span class="ml-1">{{$movie['vote_average'] * 10 . '%'}}</span>
                    <span class="mx-2">|</span>
                    <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{$genre['name']}}@if(!$loop->last),@endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-3">
                    {{$movie['overview']}}
                </p>
                <div class="mt-3">
                    <h4 class="text-white font-semibold">
                        Elenco em destaque
                    </h4>
                    <div class="flex mt-1">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <div class="mr-3">
                                    <div>{{$crew['name']}}</div>
                                    <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                                </div>
                            @endif
                        @endforeach

                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" value="{{Auth::user()->id}}" name="user">
                            <input type="hidden" value="{{Auth::user()->id}}{{$movie['id']}}" name="id_movie_user">
                            <input type="hidden" value="{{$movie['id']}}" name="id_movie">
                            <input type="text" hidden value="{{$movie['title']}}" name="title">
                            <input type="text" hidden value="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" name="poster_path">
                            <button type="submit" href="#" class="-mt-1 bg-green-300 hover:bg-red-400 transition ease-in-out duration-150 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center mt-2">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-play" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                                </svg>
                                <span class="text-sm uppercase">Assistir Depois</span>
                            </button>
                            </form>
                    </div>
                </div>
                @if (count($movie['videos']['results']) > 0)
                <div class="mt-2">
                        <iframe width="100%" max-width="560" height="315" src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
