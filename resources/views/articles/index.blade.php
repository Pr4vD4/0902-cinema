@extends('layouts.app')

@section('title', 'Обзоры фильмов')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Обзоры фильмов</h1>

            {{-- Фильтры --}}
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <form x-data="{ category: '{{ request('category_id') }}', search: '{{ request('search') }}' }"
                      @submit.prevent="
                        const params = new URLSearchParams();
                        if (category) params.append('category_id', category);
                        if (search) params.append('search', search);
                        window.location.href = '{{ route('articles.index') }}?' + params.toString();
                      "
                >
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Категория</label>
                            <select x-model="category" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Все категории</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Поиск</label>
                            <input type="text" x-model="search" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                Применить фильтры
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Список статей --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($articles as $article)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ $article->category->name }}</span>
                                <span class="ml-2">{{ $article->reading_time }} мин. чтения</span>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $article->title }}</h2>
                            <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                            <a href="{{ route('articles.show', $article) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                Читать далее
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        Статьи не найдены
                    </div>
                @endforelse
            </div>

            {{-- Пагинация --}}
            <div class="mt-8">
                {{ $articles->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
