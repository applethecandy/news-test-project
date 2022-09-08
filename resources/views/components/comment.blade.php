<div {{ $attributes->merge() }}>
    <div class="w-full items-end flex pb-1">
        <img src="{{ $comment->user->image }}" class="rounded-full shadow h-9 w-9">
        <div>
            <a href="#" class="ml-2 text-sm">{{ $comment->user->name }}</a>
            <div class="ml-2 text-xs">{{ $comment->created_at->format('d.m.Y H:i') }}</div>
        </div>
    </div>
    <div class="comment-text flex-1 flex flex-col" data-id="{{ $comment->id }}">{!! $comment->text !!}</div>

    <div class="flex">
        @if ($comment->level < 8)
            <button data-id="{{ $comment->id }}" class="reply-button text-gray-600">
                Ответить
            </button>
        @endif
        {{-- @auth
            @if (Auth::user()->id == $comment->user->id)
                <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="ml-3 reply-button text-gray-600 cursor-pointer" value="Удалить">
                </form>
            @endif
        @endauth --}}
    </div>

    @if ($comment->comments->count())
        <div class="border-l-2 border-gray-500">
            <div class="ml-4">
                @foreach ($comment->comments as $childComment)
                    <x-comment :comment="$childComment" />
                @endforeach
            </div>
        </div>
    @endif
</div>
