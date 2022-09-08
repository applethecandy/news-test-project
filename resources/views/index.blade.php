@extends('layouts.news')

@section('articles')
    @if (count($posts))
        @foreach ($posts as $post)
            <x-article-card :post="$post" />
        @endforeach

        <a href="{{ route('posts.index') }}"
            class="w-full bg-white shadow flex justify-center items-center my-4 p-6 uppercase text-gray-800 hover:text-black">
            Показать еще
            <i class="mx-1 fas fa-arrow-down"></i>
        </a>
    @else
        <div
            class="w-full bg-white shadow flex justify-center items-center my-4 p-6 uppercase text-gray-800 hover:text-black">
            Похоже, на сайте ещё нет новостей
        </div>
    @endif
@endsection
