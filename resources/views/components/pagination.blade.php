@if ($paginator->hasPages())
    <div class="flex items-center py-8">
        @if ($paginator->onFirstPage())
            <a
                class="disabled h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center mx-5">
                <i class="fas fa-arrow-left mr-2"></i>
                Назад
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center mx-5">
                <i class="fas fa-arrow-left mr-2"></i>
                Назад
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <a
                    class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">{{ $element }}</a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a
                            class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}"
                            class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center mx-5">Далее
                <i class="fas fa-arrow-right ml-2"></i></a>
        @else
            <a href="{{ $paginator->nextPageUrl() }}"
                class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center mx-5">Далее
                <i class="fas fa-arrow-right ml-2"></i></a>
        @endif
    </div>
@endif
