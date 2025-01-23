@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Регистрация</h1>
                    <p class="mt-2 text-gray-600">Создайте аккаунт для доступа к обзорам</p>
                </div>
                <livewire:auth.register-form />
            </div>
        </div>
    </div>
@endsection
