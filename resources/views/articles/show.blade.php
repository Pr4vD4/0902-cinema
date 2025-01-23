@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <article class="max-w-4xl mx-auto">
            {{-- Заголовок и мета-информация --}}
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>
                <div class="flex items-center text-sm text-gray-500">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
                        {{ $article->category->name }}
                    </span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->created_at->format('d.m.Y') }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->reading_time }} мин. чтения</span>
                </div>
            </div>

            {{-- Изображение --}}
            <div class="mb-8">
                <img
                    src="{{ $article->image }}"
                    alt="{{ $article->title }}"
                    class="w-full h-[400px] object-cover rounded-lg shadow-lg"
                >
            </div>

            {{-- Контент --}}
            <div class="prose prose-lg max-w-none">
                {!! nl2br(e($article->content)) !!}
            </div>

            {{-- Похожие статьи --}}
            @if($relatedArticles->isNotEmpty())
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Похожие статьи</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedArticles as $relatedArticle)
                            <div class="bg-white rounded-lg shadow overflow-hidden">
                                <img
                                    src="{{ $relatedArticle->image }}"
                                    alt="{{ $relatedArticle->title }}"
                                    class="w-full h-48 object-cover"
                                >
                                <div class="p-4">
                                    <h3 class="font-bold text-lg mb-2">
                                        {{ $relatedArticle->title }}
                                    </h3>
                                    <a
                                        href="{{ route('articles.show', $relatedArticle) }}"
                                        class="text-blue-600 hover:text-blue-800 font-medium"
                                    >
                                        Читать далее
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </article>
    </div>
</div>
@endsection
