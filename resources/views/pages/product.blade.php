@extends('layouts.app')

@section('title', $product->name . ' - Bike Shop')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-gray-600 mb-8" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 space-x-reverse">
                <li><a href="{{ route('home') }}" class="hover:text-green-500">الرئيسية</a></li>
                <li class="mx-2">/</li>
                <li><a href="{{ route('shop') }}" class="hover:text-green-500">المتجر</a></li>
                <li class="mx-2">/</li>
                <li><a href="{{ route('shop', ['category' => $product->category->id]) }}" class="hover:text-green-500">{{ $product->category->name }}</a></li>
                <li class="mx-2">/</li>
                <li class="text-gray-900 font-semibold">{{ $product->name }}</li>
            </ol>
        </nav>

        <!-- Product Details -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 p-8">
                
                <!-- Product Image -->
                <div class="relative group">
                    <div class="aspect-w-1 aspect-h-1 bg-gray-200 rounded-xl overflow-hidden shadow-inner">
                        @if($product->hasDiscount())
                            <div class="absolute top-4 left-4 bg-red-500 text-white px-4 py-2 rounded-full font-bold text-lg z-10 shadow-md">
                                خصم {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                            </div>
                        @endif
                        <div class="flex items-center justify-center w-full h-96 bg-gray-100">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain">
                            @else
                                <i class="fas fa-bicycle text-gray-300 text-9xl"></i>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="flex flex-col justify-center">
                    <span class="text-green-500 font-bold mb-2 text-lg">{{ $product->category->name }}</span>
                    <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $product->name }}</h1>
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex text-yellow-400 text-lg">
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
                        <span class="text-gray-500 text-lg">({{ $product->rating }} تقييم)</span>
                    </div>

                    <div class="mb-8 p-4 bg-gray-50 rounded-lg border border-gray-100">
                        @if($product->hasDiscount())
                            <div class="flex items-end gap-3">
                                <span class="text-4xl font-bold text-green-600">{{ number_format($product->discount_price, 2) }} ر.س</span>
                                <span class="text-xl text-gray-400 line-through mb-1">{{ number_format($product->price, 2) }}</span>
                            </div>
                            <p class="text-sm text-green-600 mt-1 font-semibold">وفرت {{ number_format($product->price - $product->discount_price, 2) }} ر.س!</p>
                        @else
                            <span class="text-4xl font-bold text-green-600">{{ number_format($product->price, 2) }} ر.س</span>
                        @endif
                    </div>

                    <div class="prose max-w-none text-gray-600 mb-8 leading-relaxed">
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="border-t border-gray-200 pt-8">
                        @if($product->stock > 0)
                            <form action="{{ route('cart.add') }}" method="POST" class="flex flex-col sm:flex-row gap-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                {{-- Quantity (You can enable this if the Cart Controller supports adding multiple qty at once, for now defaulting to 1 in controller logic is common, but let's just show add button) --}}
                                {{-- <div class="w-32">
                                     <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-center" placeholder="الكمية">
                                </div> --}}
                                
                                <button type="submit" class="flex-1 btn-primary text-xl shadow-lg shadow-green-200">
                                    <i class="fas fa-cart-plus ml-2"></i>
                                    إضافة للسلة
                                </button>
                                <button type="button" class="w-14 items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-lg shadow-sm hidden sm:flex transition">
                                    <i class="far fa-heart text-xl"></i>
                                </button>
                            </form>
                            <p class="mt-3 text-green-600 text-sm font-semibold"><i class="fas fa-check-circle ml-1"></i> متوفر في المخزون ({{ $product->stock }} قطعة)</p>
                        @else
                            <button disabled class="w-full bg-gray-300 text-gray-500 font-bold py-4 rounded-lg cursor-not-allowed">
                                غير متوفر حالياً
                            </button>
                        @endif
                    </div>
                    
                    <div class="mt-8 flex gap-6 text-sm text-gray-500 border-t border-gray-100 pt-4">
                        <span class="flex items-center"><i class="fas fa-shield-alt ml-2 text-green-500"></i> ضمان سنتين</span>
                        <span class="flex items-center"><i class="fas fa-truck ml-2 text-green-500"></i> توصيل سريع</span>
                        <span class="flex items-center"><i class="fas fa-undo ml-2 text-green-500"></i> إرجاع خلال 14 يوم</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 border-r-4 border-green-500 pr-4">منتجات ذات صلة</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    <div class="card group">
                        <div class="relative overflow-hidden h-48 bg-gray-200">
                            @if($related->hasDiscount())
                                <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full font-bold text-xs z-10">
                                    -{{ round((($related->price - $related->discount_price) / $related->price) * 100) }}%
                                </div>
                            @endif
                            <a href="{{ route('product.show', $related->slug) }}" class="block w-full h-full group-hover:scale-110 transition duration-300">
                                @if($related->image)
                                    <img src="{{ asset($related->image) }}" alt="{{ $related->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300">
                                        <i class="fas fa-bicycle text-gray-400 text-4xl"></i>
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="p-4">
                            <span class="text-xs text-green-600 font-semibold">{{ $related->category->name }}</span>
                            <h3 class="text-md font-bold text-gray-900 mt-1 mb-2 truncate">
                                <a href="{{ route('product.show', $related->slug) }}" class="hover:text-green-500 transition">{{ $related->name }}</a>
                            </h3>
                            <div class="flex items-center justify-between mt-2">
                                <span class="font-bold text-green-600">{{ number_format($related->final_price, 0) }} ر.س</span>
                                <a href="{{ route('product.show', $related->slug) }}" class="text-gray-400 hover:text-green-500"><i class="fas fa-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
