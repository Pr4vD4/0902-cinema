<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'image' => '/storage/images/slider/slide1.jpg',
                'title' => 'Добро пожаловать в мир кино',
                'description' => 'Профессиональные обзоры фильмов и сериалов'
            ],
            [
                'image' => '/storage/images/slider/slide2.jpg',
                'title' => 'Экспертный анализ',
                'description' => 'Глубокое погружение в кинематограф'
            ],
            [
                'image' => '/storage/images/slider/slide3.jpg',
                'title' => 'Новинки кино',
                'description' => 'Будьте в курсе последних премьер'
            ],
            [
                'image' => '/storage/images/slider/slide4.jpg',
                'title' => 'Классика кинематографа',
                'description' => 'Нестареющие шедевры всех времен'
            ],
            [
                'image' => '/storage/images/slider/slide5.jpg',
                'title' => 'Авторское кино',
                'description' => 'Независимый взгляд на киноискусство'
            ]
        ];

        $companyInfo = [
            'motto' => 'Открывая новые грани кинематографа',
            'mission' => 'Наша цель - помочь зрителям находить лучшие фильмы и глубже понимать киноискусство',
            'team' => [
                [
                    'name' => 'Александр Петров',
                    'position' => 'Кинокритик',
                    'description' => '10 лет опыта в кинокритике'
                ],
                [
                    'name' => 'Елена Соколова',
                    'position' => 'Редактор',
                    'description' => 'Эксперт по сериалам'
                ],
                [
                    'name' => 'Михаил Волков',
                    'position' => 'Аналитик',
                    'description' => 'Специалист по классическому кино'
                ]
            ]
        ];

        return view('home', compact('slides', 'companyInfo'));
    }
}
