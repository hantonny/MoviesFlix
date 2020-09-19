@extends('layouts.main')

@section('content')
@section('content')
@if (session('warning'))
<div class="bg-indigo-900 text-center py-4 md:mt-5 md:mb-2 max-w-lg m-auto">
  <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Aviso</span>
    <span class="font-semibold mr-2 text-left flex-auto">{{session('warning')}}</span>
  </div>
</div>
@endif
    <div class="container mx-auto px-4 pt-5 mb-20">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wide
            text-orange-500
            text-lg font-semibold text-center">
            Filmes para Assistir Depois
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
            @foreach ($popularMovies as $movie)
            @endforeach
            @foreach ($movies as $moviesfavorited)
            @if(Auth::user()->id == $moviesfavorited->id_user && $moviesfavorited->status === 0)
            <div class="mt-8">
            
                <a href="{{route('movies.show', $moviesfavorited['id_movie'])}}">
                <img src="{{$moviesfavorited['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                
                <div class="mt-2">
                    <p class="text-lg mt-2 hover:text-gray-300 font-semibold">
                        {{$moviesfavorited['title']}}
                    </p>
                    <div class="text-gray-400 text-sm">
                    </div>
                </div>
                <a href="{{route('editStatus', [$moviesfavorited->id])}}" class="mt-1 bg-green-300 hover:bg-red-400 transition ease-in-out duration-150 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center mt-2">Já assistir esse filme</a>
            </div>
            
            @endif
            @endforeach
            
        </div>
    </div>
@endsection
