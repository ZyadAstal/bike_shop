@extends('layouts.app')

@section('title', 'المتجر - Bike Shop')

@section('content')
<div class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">متجر الدراجات</h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Sidebar Filters -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">الفلترة</h3>
                    
                    <form method="GET" action="{{ route('shop') }}">
                        <!-- Categories -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">التصنيفات</h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="" {{ !request('category') ? 'checked' : '' }} class="ml-2">
                                    <span>جميع التصنيفات</span>
                                </label>
                                @foreach($categories as $category)
                                    <label class="flex items-center">
                                        <input type="radio" name="category" value="{{ $category->id }}" {{ request('category') == $category->id ? 'checked' : '' }} class="ml-2">
                                        <span>{{ $category->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">السعر</h4>
                            <div class="space-y-2">
                                <input type="number" name="min_price" placeholder="من" value="{{ request('min_price') }}" class="w-full px-3 py-2 border rounded-lg">
                                <input type="number" name="max_price" placeholder="إلى" value="{{ request('max_price') }}" class="w-full px-3 py-2 border rounded-lg">
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">البحث</h4>
                            <input type="text" name="search" placeholder="ابحث عن منتج..." value="{{ request('search') }}" class="w-full px-3 py-2 border rounded-lg">
                        </div>

                        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 rounded-lg">
                            تطبيق الفلتر
                        </button>
                        
                        @if(request()->hasAny(['category', 'min_price', 'max_price', 'search']))
                            <a href="{{ route('shop') }}" class="block text-center mt-2 text-red-500 hover:text-red-600">
                                إزالة الفلاتر
                            </a>
                        @endif
                    </form>
                </div>
            </aside>

            <!-- Products Grid -->
            <main class="lg:col-span-3">
                <!-- Sort & Count -->
                <div class="flex justify-between items-center mb-6">
                    <p class="text-gray-600">عرض {{ $products->count() }} من {{ $products->total() }} منتج</p>
                    
                    <form method="GET" action="{{ route('shop') }}" class="flex items-center gap-2">
                        @foreach(request()->except('sort') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        <label class="text-gray-700">الترتيب:</label>
                        <select name="sort" onchange="this.form.submit()" class="px-3 py-2 border rounded-lg">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>الأحدث</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>السعر: من الأقل للأعلى</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>السعر: من الأعلى للأقل</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>الأعلى تقييماً</option>
                        </select>
                    </form>
                </div>

                <!-- Products -->
                @if($products->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="card group">
                                <div class="relative overflow-hidden h-56 bg-gray-200">
                                    @if($product->hasDiscount())
                                        <div class="absolute top-3 left-3 bg-red-500 text-white px-2 py-1 rounded-full font-bold text-xs z-10">
                                            -{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                                        </div>
                                    @endif
                                    @if($product->stock <= 0)
                                        <div class="absolute top-3 right-3 bg-gray-900 text-white px-2 py-1 rounded-full font-bold text-xs z-10">
                                            نفذت الكمية
                                        </div>
                                    @endif
                                    
                                    <a href="{{ route('product.show', $product->slug) }}" class="block w-full h-full group-hover:scale-110 transition duration-300 flex items-center justify-center p-4 bg-gray-50">
                                        @if($product->image)
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain">
                                        @else
                                            <div class="flex items-center justify-center h-full">
                                                <i class="fas fa-bicycle text-gray-400 text-5xl"></i>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="p-5">
                                    <span class="text-xs text-green-600 font-semibold">{{ $product->category->name }}</span>
                                    <h3 class="text-lg font-bold text-gray-900 mt-1 mb-2 group-hover:text-green-500 transition line-clamp-1">
                                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                    </h3>
                                    
                                    <div class="flex items-center gap-1 mb-3 text-sm">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= floor($product->rating))
                                                    <i class="fas fa-star text-xs"></i>
                                                @else
                                                    <i class="far fa-star text-xs"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="text-gray-500">({{ $product->rating }})</span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <div>
                                            @if($product->hasDiscount())
                                                <span class="text-xl font-bold text-green-500">{{ number_format($product->discount_price, 0) }}</span>
                                                <span class="text-gray-400 line-through text-sm mr-1">{{ number_format($product->price, 0) }}</span>
                                            @else
                                                <span class="text-xl font-bold text-green-500">{{ number_format($product->price, 0) }}</span>
                                            @endif
                                            <span class="text-gray-600 text-sm">ر.س</span>
                                        </div>
                                        
                                        @if($product->stock > 0)
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </form>
                                        @else
                                            <button disabled class="bg-gray-400 text-white p-2 rounded-lg cursor-not-allowed">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                        <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">لم يتم العثور على منتجات</h3>
                        <p class="text-gray-600 mb-4">جرب تغيير الفلاتر أو البحث بكلمات مختلفة</p>
                        <a href="{{ route('shop') }}" class="btn-primary inline-block">عرض جميع المنتجات</a>
                    </div>
                @endif
            </main>
        </div>
    </div>
</div>
@endsection
