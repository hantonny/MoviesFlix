<div class="relative mt-3 md:mt-0">
                    <input type="text" wire:model.debounce.500ms="search" class="bg-gray-800 text-sm rounded-full w-64
                    px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
                    placeholder="Buscar Filmes">
                    <div class="absolute top-0">
                        <svg class="fill-current text-gray-500 w-4 mt-2 ml-2" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                          </svg>
                    </div>
                    @if(strlen($search) > 2)
                    <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
                    @if($searchResults->count() > 0)
                    <ul>
                            @foreach ($searchResults as $result)
                            <li class="border-b border-gray-700">
                                <a href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                                @if ($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $result['title'] }}</span>
                                </a>
                            </li>
                            @endforeach
                       </ul>
                    @else
                        <div class="px-3 py-3">
                            Sem resultados para "{{$search}}"
                        </div>
                    @endif
                    </div>
                    @endif
                </div>
