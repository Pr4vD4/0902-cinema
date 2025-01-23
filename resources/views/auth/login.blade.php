@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Вход в систему</h1>
                    <p class="mt-2 text-gray-600">Войдите в свой аккаунт для доступа к обзорам</p>
                </div>

                <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <form
                            x-data="{
                                login: '',
                                password: '',
                                remember: false,
                                errors: {},
                                loading: false,
                                submit() {
                                    this.loading = true;
                                    this.errors = {};

                                    fetch('{{ route('login') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            login: this.login,
                                            password: this.password,
                                            remember: this.remember
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            window.location.href = '{{ route('home') }}';
                                        } else {
                                            this.errors = data.errors || {};
                                        }
                                    })
                                    .catch(error => {
                                        this.errors = {
                                            general: ['Произошла ошибка при авторизации']
                                        };
                                    })
                                    .finally(() => {
                                        this.loading = false;
                                    });
                                }
                            }"
                            @submit.prevent="submit"
                        >
                            <div class="space-y-6">
                                {{-- Логин --}}
                                <div>
                                    <label for="login" class="block text-sm font-medium text-gray-700">
                                        Логин
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            id="login"
                                            x-model="login"
                                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                            :class="{'border-red-300': errors.login}"
                                        >
                                        <template x-if="errors.login">
                                            <p class="mt-1 text-sm text-red-600" x-text="errors.login[0]"></p>
                                        </template>
                                    </div>
                                </div>

                                {{-- Пароль --}}
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">
                                        Пароль
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            type="password"
                                            id="password"
                                            x-model="password"
                                            class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                            :class="{'border-red-300': errors.password}"
                                        >
                                        <template x-if="errors.password">
                                            <p class="mt-1 text-sm text-red-600" x-text="errors.password[0]"></p>
                                        </template>
                                    </div>
                                </div>

                                {{-- Запомнить меня --}}
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="remember"
                                        x-model="remember"
                                        class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    >
                                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                                        Запомнить меня
                                    </label>
                                </div>

                                <template x-if="errors.general">
                                    <div class="text-red-600 text-sm" x-text="errors.general[0]"></div>
                                </template>

                                <button
                                    type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    :disabled="loading"
                                >
                                    <span x-show="!loading">Войти</span>
                                    <span x-show="loading">Подождите...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
