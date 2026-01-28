@extends('layouts.app')

@section('title', 'إدارة التصنيفات - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">إدارة التصنيفات</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Create/Edit Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">إضافة تصنيف جديد</h2>
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">اسم التصنيف</label>
                            <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">الصورة</label>
                            <input type="file" name="image" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">الوصف</label>
                            <textarea name="description" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"></textarea>
                        </div>
                        <button type="submit" class="w-full btn-primary py-3">حفظ التصنيف</button>
                    </form>
                </div>
            </div>

            <!-- List -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <table class="w-full text-right">
                        <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-4 font-bold">الصورة</th>
                                <th class="px-6 py-4 font-bold">الاسم</th>
                                <th class="px-6 py-4 font-bold">Slug</th>
                                <th class="px-6 py-4 font-bold">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($categories as $category)
                                <tr class="hover:bg-gray-50 transition" x-data="{ editOpen: false }">
                                    <td class="px-6 py-4">
                                        <div class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center overflow-hidden">
                                            @if($category->image)
                                                <img src="{{ asset($category->image) }}" alt="" class="w-full h-full object-cover">
                                            @else
                                                <i class="fas fa-bicycle text-gray-300"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span x-show="!editOpen" class="font-bold text-gray-900">{{ $category->name }}</span>
                                        <form x-show="editOpen" action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" value="{{ $category->name }}" class="border rounded px-2 py-1 text-sm w-full">
                                            <input type="file" name="image" class="text-xs">
                                            <div class="flex gap-2">
                                                <button type="submit" class="text-green-600"><i class="fas fa-check"></i> حفظ</button>
                                                <button type="button" @click="editOpen = false" class="text-gray-500"><i class="fas fa-times"></i> إلغاء</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $category->slug }}</td>
                                    <td class="px-6 py-4">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-bold">{{ $category->products_count }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <button @click="editOpen = !editOpen" class="text-blue-500 hover:text-blue-700 transition" title="تعديل">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 transition" title="حذف" {{ $category->products_count > 0 ? 'disabled' : '' }}>
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
