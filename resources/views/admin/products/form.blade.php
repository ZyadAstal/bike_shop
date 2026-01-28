@extends('layouts.app')

@section('title', isset($product) ? 'تعديل ملنتج - Bike Shop' : 'منتج جديد - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ isset($product) ? 'تعديل المنتج: ' . $product->name : 'إضافة منتج جديد' }}</h1>
                <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900 font-semibold flex items-center">
                    <i class="fas fa-arrow-right ml-2"></i> العودة للقائمة
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                @if($errors->any())
                    <div class="bg-red-50 border-r-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($product))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Name -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">اسم المنتج</label>
                            <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">التصنيف</label>
                            <select name="category_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                                <option value="">اختر التصنيف</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Stock -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">الكمية في المخزون</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">السعر الأصلي</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '') }}" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                        </div>

                        <!-- Discount Price -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">سعر الخصم (اختياري)</label>
                            <input type="number" step="0.01" name="discount_price" value="{{ old('discount_price', $product->discount_price ?? '') }}" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                            <p class="text-xs text-gray-500 mt-1">اتركه فارغاً إذا لم يوجد خصم</p>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">صورة المنتج</label>
                        @if(isset($product) && $product->image)
                            <div class="mb-3">
                                <img src="{{ asset($product->image) }}" alt="Preview" class="w-32 h-32 object-cover rounded-lg border">
                                <p class="text-xs text-gray-500 mt-1">الصورة الحالية</p>
                            </div>
                        @endif
                        <input type="file" name="image" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        <p class="text-xs text-gray-500 mt-1">اتركه فارغاً للحفاظ على الصورة الحالية (في حالة التعديل)</p>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">وصف المنتج</label>
                        <textarea name="description" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">{{ old('description', $product->description ?? '') }}</textarea>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center gap-6 mb-8">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }} class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                            <span class="mr-2 text-gray-700 font-semibold">منتج مميز (يظهر في الرئيسية)</span>
                        </label>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-bold transition">
                            إلغاء
                        </a>
                        <button type="submit" class="btn-primary px-8">
                            {{ isset($product) ? 'تحديث المنتج' : 'حفظ المنتج' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
