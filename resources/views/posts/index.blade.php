@extends('layouts.news')

@section('articles')
    @if (count($posts))
        @if (request()->search)
            @if (count($categories))
                <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">Найдено {{ $categories->count() }} категорий</p>
                    @if (count($categories))
                        <div class="flex flex-wrap pb-2">
                            @foreach ($categories as $category)
                                <a href="{{ route('posts.index') }}?category={{ $category->title }}"
                                    class="uppercase hover:bg-gray-400 rounded py-2 px-4 mx-2">{{ $category->title }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
            @if (count($tags))
                <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                    <p class="text-xl font-semibold pb-5">Найдено {{ $tags->count() }} тем</p>
                    @if (count($tags))
                        <div class="flex flex-wrap pb-2">
                            @foreach ($tags as $tag)
                                <a href="{{ route('posts.index') }}?tag={{ $tag->title }}"
                                    class="text-gray-600 flex items-center text-xs mr-2 my-1 uppercase border border-gray-300 hover:bg-gray-200 rounded-md p-1">
                                    <i class="fas fa-tags text-gray-400 mr-1"></i>
                                    {{ $tag->title }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <p class="text-3xl font-semibold pt-5">Найдено {{ $posts->total() }} новостей</p>
        @endif

        @foreach ($posts as $post)
            <x-article-card :post="$post" />
        @endforeach

        {{ $posts->withQueryString()->links('components.pagination') }}
    @else
    @empty(request())
        <div
            class="w-full bg-white shadow flex justify-center items-center my-4 p-6 uppercase text-gray-800 hover:text-black">
            Похоже, на сайте ещё нет новостей
        </div>
    @else
        <div
            class="w-full bg-white shadow flex justify-center items-center my-4 p-6 uppercase text-gray-800 hover:text-black">
            Ничего не найдено
        </div>
    @endempty
@endif
@endsection
