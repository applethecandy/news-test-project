@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex flex-wrap py-6">
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            @yield('articles')

        </section>

        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <form action="{{ route('posts.index') }}">
                    <div class="flex">
                        <input type="text" placeholder="Поиск..."
                            @if (request()->search) value="{{ request()->search }}" @endif name="search"
                            class="flex w-full items-center justify-center rounded focus:border-gray-400 focus:ring-transparent border-2 px-2 py-3 border-gray-300 text-sm font-bold uppercase">
                        <input type="submit" value="Искать"
                            class="w-1/4 flex w-full ml-1 items-center justify-center rounded bg-blue-800 px-2 py-3 text-sm font-bold uppercase text-white hover:bg-blue-700">
                    </div>
                </form>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Обсуждаемые темы</p>
                {{-- {{ dd($tags) }} --}}
                @if (count($popular_tags))
                    <div class="flex flex-wrap pb-2">
                        @foreach ($popular_tags as $tag)
                            <a href="{{ route('posts.index') }}?tag={{ $tag->title }}"
                                class="text-gray-600 flex items-center text-xs mr-2 my-1 uppercase border border-gray-300 hover:bg-gray-200 rounded-md p-1">
                                <i class="fas fa-tags text-gray-400 mr-1"></i>
                                {{ $tag->title }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

        </aside>
    </div>
@endsection
