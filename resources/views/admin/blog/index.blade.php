@extends('layouts.app')

@section('title', 'إدارة المدونة - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">إدارة المدونة</h1>
            <a href="{{ route('admin.blog.create') }}" class="btn-primary flex items-center gap-2">
                <i class="fas fa-plus"></i> إضافة مقال جديد
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="w-full text-right">
                <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-4 font-bold">المقال</th>
                        <th class="px-6 py-4 font-bold">الكاتب</th>
                        <th class="px-6 py-4 font-bold">الحالة</th>
                        <th class="px-6 py-4 font-bold">التاريخ</th>
                        <th class="px-6 py-4 font-bold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded bg-gray-200 flex items-center justify-center flex-shrink-0 ml-3 overflow-hidden">
                                        @if($post->image)
                                            <img src="{{ asset($post->image) }}" alt="" class="w-full h-full object-cover">
                                        @else
                                            <i class="fas fa-newspaper text-gray-400"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">{{ $post->title }}</div>
                                        <div class="text-xs text-gray-500">{{ $post->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $post->author->name ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($post->is_published)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-bold">منشور</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-bold">مسودة</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $post->created_at->format('Y/m/d') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="text-gray-400 hover:text-gray-600 transition" target="_blank" title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.blog.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700 transition" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المقال؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition" title="حذف">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500 italic">لا توجد مقالات مضافة بعد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
