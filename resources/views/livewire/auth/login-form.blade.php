<div>
    <div class="bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="p-6 sm:p-8">
            <form wire:submit="login">
                <div class="space-y-6">
                    {{-- Логин --}}
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700">
                            Логин
                        </label>
                        <div class="mt-1">
                            <input
                                wire:model.live="login"
                                type="text"
                                id="login"
                                class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            >
                            @error('login')
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
                            <input
                                wire:model.live="password"
                                type="password"
                                id="password"
                                class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            >
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Запомнить меня --}}
                    <div class="flex items-center">
                        <input
                            wire:model.live="remember"
                            type="checkbox"
                            id="remember"
                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Запомнить меня
                        </label>
                    </div>

                    <button
                        type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Войти
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
