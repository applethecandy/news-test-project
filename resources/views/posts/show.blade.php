@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex flex-wrap py-6 justify-center">

        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <img src="{{ $post->image }}">
                <div class="bg-white flex flex-col justify-start p-6">

                    <a href="{{ route('posts.index') }}?category={{ $post->category->title }}"
                        class="text-blue-700 text-sm font-bold uppercase pb-4 m-2">{{ $post->category->title }}</a>

                    @if (count($post->tags))
                        <div class="flex pb-2">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.index') }}?tag={{ $tag->title }}"
                                    class="text-gray-600 flex items-center text-xs mr-2 uppercase border border-gray-300 hover:bg-gray-200 rounded-md p-1">
                                    <i class="fas fa-tags text-gray-400 mr-1"></i>
                                    {{ $tag->title }}
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <a class="text-3xl font-bold pb-4">{{ $post->title }}</a>
                    <p class="text-sm pb-8">
                        <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>
                        {{ $post->created_at->format('d.m.Y, H:i') }}
                    </p>
                    {{-- header: text-2xl font-bold pb-3
                        p: pb-3 --}}
                    {!! $post->text !!}
                </div>
            </article>

            <div class="w-full flex justify-between pt-6">
                @isset($post->previous)
                    <a href="{{ route('posts.show', ['id' => $post->previous->id]) }}"
                        class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                            Предыдущее</p>
                        <p class="pt-2">{{ $post->previous->title }}</p>
                    </a>
                @else
                    <a></a>
                @endisset
                @isset($post->next)
                    <a href="{{ route('posts.show', ['id' => $post->next->id]) }}"
                        class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Следующее <i
                                class="fas fa-arrow-right pl-1"></i></p>
                        <p class="pt-2">{{ $post->next->title }}</p>
                    </a>
                @else
                    <a></a>
                @endisset
            </div>

            <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 p-6">
                <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                    <img src="{{ $post->user->image }}" class="rounded-full shadow h-32 w-32">
                </div>
                <div class="flex-1 flex flex-col justify-center md:justify-start">
                    <a href="#" class="font-semibold text-2xl">{{ $post->user->name }}</a>
                    <p class="pt-2">{{ $post->user->description }}</p>
                </div>
            </div>

            <x-comment-block post="{{ $post->id }}" :comments="$post
                ->comments()
                ->newest()
                ->get()" />
        </section>

    </div>
@endsection
