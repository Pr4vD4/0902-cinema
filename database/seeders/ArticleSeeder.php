<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Убедимся, что у нас есть категории
        if (Category::count() === 0) {
            $this->call(CategorySeeder::class);
        }

        // Создаем статьи
        Article::factory(50)->create();
    }
}
