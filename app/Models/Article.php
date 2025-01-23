<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'reading_time',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($article) {
            if ($article->isDirty('content')) {
                $words = str_word_count(strip_tags($article->content));
                $article->reading_time = ceil($words / 200); // Среднее время чтения: 200 слов в минуту
            }
        });
    }
}
