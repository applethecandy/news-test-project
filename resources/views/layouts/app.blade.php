<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poiret+One&display=swap');

        .font-family-poiret {
            font-family: 'Poiret One', cursive;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white .font-family-poiret">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('index') }}">Главная</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4"
                            href="{{ route('posts.index') }}">Новости</a>
                    </li>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <li>
                                <a href="#" class="hover:text-gray-200 hover:underline px-4"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Выход
                                </a>
                            </li>
                        </form>
                    @else
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('login') }}">Вход</a></li>
                        <li><a class="hover:text-gray-200 hover:underline px-4"
                                href="{{ route('register') }}">Регистрация</a></li>
                    @endauth
                </ul>
            </nav>

        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="{{ route('index') }}">
                Новости
            </a>
            <p class="text-lg text-gray-600">
                Тестовый проект
            </p>
        </div>
    </header>

    @isset($categoriesList)
        <!-- Topic Nav -->
        <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
            <div class="block sm:hidden">
                <a href="#"
                    class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                    @click="open = !open">
                    Topics <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
                </a>
            </div>
            <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
                <div
                    class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                    @foreach ($categoriesList as $category)
                        <a href="{{ route('posts.index') }}?category={{ $category->title }}"
                            class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{ $category->title }}</a>
                    @endforeach
                </div>
            </div>
        </nav>
    @endisset

    @yield('content')

    <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">О нас</a>
                <a href="#" class="uppercase px-3">Политика конфедициальности</a>
                <a href="#" class="uppercase px-3">Связаться с нами</a>
            </div>
            <div class="uppercase pb-6">&copy; smolyakov.dev</div>
        </div>
    </footer>


</body>

</html>
