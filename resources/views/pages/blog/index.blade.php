@extends('layouts.app')

@section('title', 'المدونة - Bike Shop')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">مدونة الدراجين</h1>
            <p class="text-xl text-gray-600">آخر الأخبار، النصائح، والمراجعات في عالم الدراجات</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full hover:-translate-y-2 transition duration-300">
                    <div class="h-64 bg-gray-200 relative overflow-hidden">
                        @if($post->image)
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center bg-gray-100">
                                 <i class="fas fa-newspaper text-gray-300 text-6xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs font-bold mr-2">مقالات</span>
                            <span><i class="far fa-calendar-alt ml-1"></i> {{ $post->created_at->format('Y/m/d') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-green-600 transition">{{ $post->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3 flex-1">
                            {{ Str::limit($post->content, 100) }}
                        </p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-green-600 font-bold hover:text-green-800 flex items-center mt-auto">
                            اقرأ المزيد <i class="fas fa-arrow-left mr-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
