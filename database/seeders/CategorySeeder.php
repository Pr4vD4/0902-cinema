<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Боевики',
                'description' => 'Фильмы с захватывающими боевыми сценами'
            ],
            [
                'name' => 'Драмы',
                'description' => 'Фильмы с глубоким эмоциональным содержанием'
            ],
            [
                'name' => 'Комедии',
                'description' => 'Легкие и веселые фильмы'
            ],
            [
                'name' => 'Триллеры',
                'description' => 'Напряженные и захватывающие фильмы'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 