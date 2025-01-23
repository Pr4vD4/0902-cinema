@extends('layouts.app')

@section('title', 'Главная')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
@endpush

@section('content')
    {{-- Слайдер --}}
    <div class="splide" role="group">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($slides as $slide)
                    <li class="splide__slide relative h-[600px]">
                        <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-center text-white">
                            <div>
                                <h2 class="text-4xl font-bold mb-4">{{ $slide['title'] }}</h2>
                                <p class="text-xl">{{ $slide['description'] }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- О компании --}}
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            {{-- Девиз и цель --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $companyInfo['motto'] }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ $companyInfo['mission'] }}</p>
            </div>

            {{-- Команда --}}
            <div>
                <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">Наша команда экспертов</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($companyInfo['team'] as $member)
                        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-2xl text-blue-600">{{ substr($member['name'], 0, 1) }}</span>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $member['name'] }}</h4>
                            <p class="text-blue-600 font-medium mb-2">{{ $member['position'] }}</p>
                            <p class="text-gray-600">{{ $member['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        new Splide('.splide', {
            type: 'loop',
            autoplay: true,
            interval: 5000,
            pauseOnHover: false,
            arrows: true,
            pagination: true,
        }).mount();
    </script>
@endpush
