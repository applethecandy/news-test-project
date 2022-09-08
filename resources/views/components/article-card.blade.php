<article class="flex flex-col shadow my-4">
    <!-- Article Image -->
    <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="hover:opacity-75">
        <img src="{{ $post->image }}">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="{{ route('posts.index') }}?category={{ $post->category->title }}"
            class="text-blue-700 text-sm font-bold uppercase pb-4 m-2">{{ $post->category->title }}</a>
        <a href="{{ route('posts.show', ['id' => $post->id]) }}"
            class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
        <p class="text-sm pb-3">
            <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>,
            {{ $post->created_at->format('d.m.Y, H:i') }}
        </p>
        <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="pb-6">
            {!! mb_strimwidth($post->text, 0, 420, '...') !!}
        </a>
        <a href="{{ route('posts.show', ['id' => $post->id]) }}"
            class="uppercase text-right text-gray-800 hover:text-black">Продолжить <i
                class="mx-1 fas fa-arrow-right"></i></a>
    </div>
</article>
