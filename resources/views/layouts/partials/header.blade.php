<header class="bg-white shadow">
    <nav class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                    {{ config('app.name') }}
                </a>

                <div class="ml-10 flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900">Главная</a>
                    <a href="{{ route('articles.index') }}" class="text-gray-600 hover:text-gray-900">Обзоры</a>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Войти</a>
                    <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Регистрация
                    </a>
                @else
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-600 hover:text-gray-900">
                            {{ auth()->user()->firstname }}
                            <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Выйти
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>
