@extends('layouts.app')

@section('title', 'إدارة المنتجات - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">إدارة المنتجات</h1>
            <a href="{{ route('admin.products.create') }}" class="btn-primary flex items-center gap-2">
                <i class="fas fa-plus"></i> إضافة منتج جديد
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                        <tr>
                            <th class="px-6 py-4 font-bold">المنتج</th>
                            <th class="px-6 py-4 font-bold">التصنيف</th>
                            <th class="px-6 py-4 font-bold">السعر</th>
                            <th class="px-6 py-4 font-bold">المخزون</th>
                            <th class="px-6 py-4 font-bold">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($products as $product)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded bg-gray-200 flex items-center justify-center flex-shrink-0 ml-3 overflow-hidden">
                                            @if($product->image)
                                                <img src="{{ asset($product->image) }}" alt="" class="w-full h-full object-cover">
                                            @else
                                                <i class="fas fa-bicycle text-gray-400"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-gray-900">{{ $product->name }}</div>
                                            @if($product->is_featured)
                                                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full">مميز</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $product->category->name }}</td>
                                <td class="px-6 py-4">
                                    @if($product->hasDiscount())
                                        <div class="flex flex-col">
                                            <span class="text-green-600 font-bold">{{ number_format($product->discount_price, 2) }}</span>
                                            <span class="text-gray-400 line-through text-xs">{{ number_format($product->price, 2) }}</span>
                                        </div>
                                    @else
                                        <span class="text-gray-900 font-bold">{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($product->stock > 5)
                                        <span class="text-green-600 font-bold">{{ $product->stock }}</span>
                                    @elseif($product->stock > 0)
                                        <span class="text-yellow-600 font-bold">{{ $product->stock }} (منخفض)</span>
                                    @else
                                        <span class="text-red-600 font-bold">نفذت الكمية</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 transition" title="تعديل">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition" title="حذف">
                                                <i class="fas fa-trash-alt text-lg"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('product.show', $product->slug) }}" target="_blank" class="text-gray-400 hover:text-gray-600 transition" title="عرض">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="p-4 border-t border-gray-100">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
