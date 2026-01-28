@extends('layouts.app')

@section('title', 'الرئيسية - Bike Shop')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-gray-900 to-gray-800 text-white py-32">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNnptLTEyIDEyYzMuMzE0IDAgNiAyLjY4NiA2IDZzLTIuNjg2IDYtNiA2LTYtMi42ODYtNi02IDIuNjg2LTYgNi02eiIgZmlsbD0iIzRhNWU2OCIvPjwvZz48L3N2Zz4=')]"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                استمتع برحلتك مع
                <span class="text-green-400">Bike Shop</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8">
                أفضل الدراجات الهوائية والكهربائية بأسعار منافسة وجودة عالية
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('shop') }}" class="btn-primary text-lg">
                    <i class="fas fa-shopping-bag ml-2"></i>
                    تسوق الآن
                </a>
                <a href="{{ route('about') }}" class="bg-white text-gray-900 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg transition duration-300">
                    اعرف المزيد
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">تصنيفات الدراجات</h2>
            <p class="text-xl text-gray-600">اختر التصنيف المناسب لك</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $category)
                <div class="card group">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 relative overflow-hidden">
                        @if($category->image)
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-bicycle text-white text-6xl opacity-20"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $category->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                        <a href="{{ route('shop', ['category' => $category->id]) }}" class="text-green-500 hover:text-green-600 font-semibold inline-flex items-center">
                            عرض المنتجات
                            <i class="fas fa-arrow-left mr-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">المنتجات المميزة</h2>
            <p class="text-xl text-gray-600">اكتشف أفضل العروض لدينا</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
                <div class="card group">
                    <div class="relative overflow-hidden h-64 bg-gray-200">
                        @if($product->hasDiscount())
                            <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full font-bold text-sm z-10">
                                خصم {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                            </div>
                        @endif
                        
                        <a href="{{ route('product.show', $product->slug) }}" class="block w-full h-full group-hover:scale-110 transition duration-300">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300">
                                    <i class="fas fa-bicycle text-gray-400 text-6xl"></i>
                                </div>
                            @endif
                        </a>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-500 transition">
                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $product->description }}</p>
                        
                        <div class="flex items-center gap-2 mb-4">
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($product->rating))
                                        <i class="fas fa-star"></i>
                                    @elseif($i - 0.5 <= $product->rating)
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-gray-600">({{ $product->rating }})</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                @if($product->hasDiscount())
                                    <span class="text-2xl font-bold text-green-500">{{ number_format($product->discount_price, 2) }} ر.س</span>
                                    <span class="text-gray-400 line-through mr-2">{{ number_format($product->price, 2) }}</span>
                                @else
                                    <span class="text-2xl font-bold text-green-500">{{ number_format($product->price, 2) }} ر.س</span>
                                @endif
                            </div>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-lg transition">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('shop') }}" class="btn-primary text-lg">
                عرض جميع المنتجات
                <i class="fas fa-arrow-left mr-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">آراء العملاء</h2>
            <p class="text-xl text-gray-600">ماذا يقول عملاؤنا عنا</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
                <div class="card p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            {{ substr($testimonial->customer_name, 0, 1) }}
                        </div>
                        <div class="mr-4">
                            <h4 class="font-bold text-gray-900">{{ $testimonial->customer_name }}</h4>
                            <div class="flex text-yellow-400 text-sm">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"{{ $testimonial->comment }}"</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-16 bg-gradient-to-r from-green-500 to-green-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">اشترك في النشرة البريدية</h2>
        <p class="text-xl mb-8">احصل على آخر العروض والأخبار</p>
        
        @if(session('success') && str_contains(session('success'), 'newsletter'))
            <div class="bg-white text-green-600 px-6 py-3 rounded-lg inline-block mb-4">
                <i class="fas fa-check-circle ml-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="max-w-md mx-auto flex gap-2">
            @csrf
            <input 
                type="email" 
                name="email" 
                placeholder="بريدك الإلكتروني"
                class="flex-1 px-6 py-3 rounded-lg text-gray-900"
                required
            >
            <button type="submit" class="bg-gray-900 hover:bg-gray-800 px-8 py-3 rounded-lg font-bold transition">
                اشترك الآن
            </button>
        </form>
    </div>
</section>

@endsection
