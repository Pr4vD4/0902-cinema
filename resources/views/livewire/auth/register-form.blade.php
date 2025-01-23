<div class="bg-white rounded-lg shadow-xl overflow-hidden">
    <div class="p-6 sm:p-8">
        <form wire:submit.prevent="register">
            <div class="space-y-6">
                {{-- Имя --}}
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700">
                        Имя
                    </label>
                    <div class="mt-1">
                        <input wire:model.live="firstname" type="text" id="firstname"
                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm
                            @error('firstname') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                        >
                        @error('firstname')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Фамилия --}}
                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700">
                        Фамилия
                    </label>
                    <div class="mt-1">
                        <input wire:model.live="lastname" type="text" id="lastname"
                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm
                            @error('lastname') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                        >
                        @error('lastname')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Отчество --}}
                <div>
                    <label for="patronymic" class="block text-sm font-medium text-gray-700">
                        Отчество
                    </label>
                    <div class="mt-1">
                        <input wire:model.live="patronymic" type="text" id="patronymic"
                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm
                            @error('patronymic') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                        >
                        @error('patronymic')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Логин --}}
                <div>
                    <label for="login" class="block text-sm font-medium text-gray-700">
                        Логин
                    </label>
                    <div class="mt-1">
                        <input wire:model.live="login" type="text" id="login"
                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm
                            @error('login') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                        >
                        @error('login')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email
                    </label>
                    <div class="mt-1">
                        <input wire:model.live="email" type="email" id="email"
                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm
                            @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Пароль --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Пароль
                    </label>
                    <div class="mt-1">
                        <input wire:model.live="password" type="password" id="password"
                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm
                            @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                        >
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Подтверждение пароля --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Подтверждение пароля
                    </label>
                    <div class="mt-1">
                        <input wire:model.live="password_confirmation" type="password" id="password_confirmation"
                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                        >
                    </div>
                </div>

                {{-- Согласие с условиями --}}
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input wire:model.live="agree" type="checkbox" id="agree"
                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >
                    </div>
                    <div class="ml-3">
                        <label for="agree" class="text-sm text-gray-700">
                            Я согласен с условиями использования
                        </label>
                        @error('agree')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <button type="submit"
                    class="flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Зарегистрироваться
                </button>
            </div>

            <div class="mt-6 text-center text-sm text-gray-600">
                Уже есть аккаунт?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Войти
                </a>
            </div>
        </form>
    </div>
</div>
