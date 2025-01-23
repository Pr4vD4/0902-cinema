@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    {{-- Слайдер --}}
    <div class="mb-12">
        <div class="swiper main-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide h-[500px] relative">
                    <img src="{{ asset('images/slider/slide1.jpg') }}" alt="Слайд 1" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h2 class="text-4xl font-bold mb-4">Добро пожаловать в мир кино</h2>
                            <p class="text-xl">Лучшие обзоры фильмов от наших экспертов</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide h-[500px] relative">
                    <img src="{{ asset('images/slider/slide2.jpg') }}" alt="Слайд 2" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h2 class="text-4xl font-bold mb-4">Новинки кинематографа</h2>
                            <p class="text-xl">Будьте в курсе последних премьер</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    {{-- О компании --}}
    <div class="bg-white rounded-lg shadow-md p-8 mb-12">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">О нас</h2>

            <div class="space-y-8">
                {{-- Девиз --}}
                <div class="text-center">
                    <h3 class="text-xl font-semibold mb-3">Наш девиз</h3>
                    <p class="text-gray-600">"Открывая новые горизонты кинематографа"</p>
                </div>

                {{-- Цель --}}
                <div class="text-center">
                    <h3 class="text-xl font-semibold mb-3">Наша цель</h3>
                    <p class="text-gray-600">Помогать зрителям находить действительно стоящие фильмы и делиться непредвзятым мнением о новинках кинематографа.</p>
                </div>

                {{-- Команда --}}
                <div class="mt-12">
                    <h3 class="text-xl font-semibold text-center mb-6">Наша команда</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <img src="{{ asset('images/team/member1.jpg') }}" alt="Член команды 1" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="font-semibold">Александр Петров</h4>
                            <p class="text-gray-600">Главный редактор</p>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('images/team/member2.jpg') }}" alt="Член команды 2" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="font-semibold">Мария Иванова</h4>
                            <p class="text-gray-600">Кинокритик</p>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('images/team/member3.jpg') }}" alt="Член команды 3" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="font-semibold">Дмитрий Сидоров</h4>
                            <p class="text-gray-600">Кинообозреватель</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    new Swiper('.main-slider', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
    });
</script>
@endpush
