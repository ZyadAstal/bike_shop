@extends('layouts.app')

@section('title', (isset($post) ? 'تعديل المقال' : 'إضافة مقال جديد') . ' - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('admin.blog.index') }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-gray-500 hover:text-gray-900 shadow-sm transition">
                    <i class="fas fa-arrow-right"></i>
                </a>
                <h1 class="text-3xl font-bold text-gray-900">{{ isset($post) ? 'تعديل المقال' : 'إضافة مقال جديد' }}</h1>
            </div>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($post) ? route('admin.blog.update', $post->id) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-lg p-8">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">عنوان المقال</label>
                        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">الصورة البارزة</label>
                        @if(isset($post) && $post->image)
                            <div class="mb-4">
                                <img src="{{ asset($post->image) }}" alt="Preview" class="w-full h-48 object-contain rounded-lg border bg-gray-50">
                                <p class="text-xs text-gray-500 mt-1 italic">الصورة الحالية</p>
                            </div>
                        @endif
                        <input type="file" name="image" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        <p class="text-xs text-gray-500 mt-1">اتركه فارغاً للحفاظ على الصورة الحالية</p>
                    </div>

                    <!-- Content -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">المحتوى</label>
                        <textarea name="content" rows="15" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>{{ old('content', $post->content ?? '') }}</textarea>
                    </div>

                    <!-- Is Published -->
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $post->is_published ?? true) ? 'checked' : '' }} class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="is_published" class="text-gray-700 font-semibold cursor-pointer select-none">نشر المقال فوراً</label>
                    </div>

                    <!-- Actions -->
                    <div class="pt-6 border-t flex gap-4">
                        <button type="submit" class="btn-primary flex-1 py-4 text-lg">
                            {{ isset($post) ? 'تحديث المقال' : 'حفظ المقال' }}
                        </button>
                        <a href="{{ route('admin.blog.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition duration-300">
                            إلغاء
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
