<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $movieImages = [
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/4057c4b8-8208-4a04-b169-26b0661453e3/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/0b76b2a2-d1c7-4f04-a284-80ff7bb709a4/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/73cf2ed0-fd52-47a2-9e26-74104360786a/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/6c6c32c4-4d70-4e05-ae05-c6c6d3ad6927/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/90d57813-7ffa-4391-9298-6f629c1c7a54/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/4adf61aa-3cb7-4381-9245-523971e5b4c8/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/b1f8a5f5-9f88-4b51-9189-d1f8731d1fb7/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/a1a2f673-9b3e-4f3e-a3c6-2b5f54c2331d/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/b250f40d-7836-4d27-b94f-fdc9c0e1c556/300x450',
        'https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/0b76b2a2-d1c7-4f04-a284-80ff7bb709a4/300x450',
    ];

    protected $movieTitles = [
        'Интерстеллар: Путешествие сквозь пространство и время',
        'Начало: Погружение в глубины подсознания',
        'Побег из Шоушенка: История надежды',
        'Властелин колец: Возвращение короля',
        'Темный рыцарь: Легенда возрождается',
        'Криминальное чтиво: Переплетение судеб',
        'Матрица: Добро пожаловать в реальный мир',
        'Гладиатор: Сила духа и свобода',
        'Форрест Гамп: Необычайная жизнь',
        'Бойцовский клуб: Саморазрушение как путь к свободе'
    ];

    public function definition(): array
    {
        // Создаем параграфы для контента
        $paragraphs = collect(range(1, rand(3, 6)))
            ->map(fn() => $this->faker->paragraph(rand(4, 8)))
            ->join("\n\n");

        $randomIndex = array_rand($this->movieImages);

        return [
            'title' => $this->movieTitles[$randomIndex],
            'content' => $paragraphs,
            'image' => $this->movieImages[$randomIndex],
            'reading_time' => rand(3, 15),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => function (array $attributes) {
                return $attributes['created_at'];
            },
        ];
    }
}
