@extends('layouts.app')

@section('title', $post->title . ' - Bike Shop')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- Breadcrumb -->
            <nav class="flex text-gray-600 mb-8 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 space-x-reverse">
                    <li><a href="{{ route('home') }}" class="hover:text-green-500">الرئيسية</a></li>
                    <li class="mx-2">/</li>
                    <li><a href="{{ route('blog') }}" class="hover:text-green-500">المدونة</a></li>
                    <li class="mx-2">/</li>
                    <li class="text-gray-900 font-semibold truncate max-w-xs">{{ $post->title }}</li>
                </ol>
            </nav>

            <!-- Article -->
            <article class="bg-white rounded-xl shadow-lg overflow-hidden mb-12">
                <div class="h-64 sm:h-96 bg-gray-200 relative overflow-hidden">
                    @if($post->image)
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    @else
                         <div class="absolute inset-0 flex items-center justify-center bg-gray-100">
                             <i class="fas fa-image text-gray-300 text-8xl"></i>
                        </div>
                    @endif
                </div>
                
                <div class="p-8 md:p-12">
                    <header class="mb-8 border-b pb-8">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                            <span class="flex items-center"><i class="far fa-user ml-2"></i> {{ $post->author->name ?? 'Admin' }}</span>
                            <span class="flex items-center"><i class="far fa-calendar-alt ml-2"></i> {{ $post->created_at->format('d F Y') }}</span>
                        </div>
                        <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">{{ $post->title }}</h1>
                    </header>

                    <div class="prose max-w-none text-gray-700 text-lg leading-loose">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>
            </article>

            <!-- Recent Posts -->
            @if($recentPosts->count() > 0)
                <h3 class="text-2xl font-bold text-gray-900 mb-6 border-r-4 border-green-500 pr-4">اقرأ أيضاً</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recentPosts as $recent)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <div class="p-4">
                                <h4 class="font-bold text-gray-900 mb-2 line-clamp-2">
                                    <a href="{{ route('blog.show', $recent->slug) }}" class="hover:text-green-600">{{ $recent->title }}</a>
                                </h4>
                                <span class="text-xs text-gray-500">{{ $recent->created_at->format('Y/m/d') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
