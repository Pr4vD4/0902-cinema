<footer class="bg-gray-800 text-white">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-bold mb-4">О нас</h3>
                <p class="text-gray-400">
                    Мы - команда энтузиастов кино, делимся своими впечатлениями и мнениями о фильмах.
                </p>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Навигация</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Главная</a></li>
                    <li><a href="{{ route('articles.index') }}" class="text-gray-400 hover:text-white">Обзоры</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Контакты</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>Email: info@kinomany.ru</li>
                    <li>Телефон: +7 (999) 999-99-99</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Все права защищены.</p>
        </div>
    </div>
</footer>
