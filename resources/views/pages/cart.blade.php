@extends('layouts.app')

@section('title', 'سلة التسوق - Bike Shop')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
            <i class="fas fa-shopping-cart ml-3 text-green-500"></i>
            سلة التسوق
        </h1>

        @if(session('success'))
            <div class="bg-green-100 border-r-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="hidden md:grid grid-cols-12 gap-4 p-4 bg-gray-50 border-b font-semibold text-gray-600">
                            <div class="col-span-6">المنتج</div>
                            <div class="col-span-2 text-center">السعر</div>
                            <div class="col-span-2 text-center">الكمية</div>
                            <div class="col-span-2 text-center">الإجمالي</div>
                        </div>

                        <div class="divide-y divide-gray-100">
                            @foreach($cart as $id => $details)
                                <div class="p-4 flex flex-col md:grid md:grid-cols-12 gap-4 items-center">
                                    <!-- Product Info -->
                                    <div class="col-span-6 flex items-center w-full">
                                        <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0 ml-4 overflow-hidden">
                                            @if($details['image'])
                                                <img src="{{ asset($details['image']) }}" alt="" class="w-full h-full object-cover">
                                            @else
                                                <i class="fas fa-bicycle text-gray-400 text-2xl"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-gray-800 text-lg mb-1"><a href="{{ route('product.show', \App\Models\Product::find($id)->slug ?? '#') }}">{{ $details['name'] }}</a></h3>
                                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 text-sm hover:underline hover:text-red-700 flex items-center">
                                                    <i class="fas fa-trash-alt ml-1"></i> حذف
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div class="col-span-2 text-center font-semibold text-gray-600">
                                        {{ number_format($details['price'], 2) }} 
                                    </div>

                                    <!-- Quantity -->
                                    <div class="col-span-2 flex justify-center">
                                        <form action="{{ route('cart.update') }}" method="POST" class="flex items-center">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <input 
                                                type="number" 
                                                name="quantity" 
                                                value="{{ $details['quantity'] }}" 
                                                min="1" 
                                                max="10"
                                                onchange="this.form.submit()"
                                                class="w-16 text-center border border-gray-300 rounded-lg py-1 focus:ring-green-500 focus:border-green-500"
                                            >
                                        </form>
                                    </div>

                                    <!-- Total -->
                                    <div class="col-span-2 text-center font-bold text-green-600 text-lg">
                                        {{ number_format($details['price'] * $details['quantity'], 2) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="p-4 bg-gray-50 border-t flex justify-between items-center">
                            <a href="{{ route('shop') }}" class="text-gray-600 hover:text-green-600 font-semibold flex items-center">
                                <i class="fas fa-arrow-right ml-2"></i> متابعة التسوق
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold border border-red-200 bg-red-50 px-4 py-2 rounded-lg hover:bg-red-100 transition">
                                    تفريغ السلة
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 border-b pb-4">ملخص الطلب</h2>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>المجموع الفرعي</span>
                                <span class="font-semibold">{{ number_format($total, 2) }} ر.س</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>الشحن</span>
                                <span class="text-green-600 font-semibold">مجاني</span>
                            </div>
                            <div class="border-t pt-3 flex justify-between items-center">
                                <span class="font-bold text-xl text-gray-900">الإجمالي</span>
                                <span class="font-bold text-2xl text-green-600">{{ number_format($total, 2) }} ر.س</span>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @auth
                                @if(auth()->user()->isCustomer())
                                    <a href="{{ route('customer.checkout') }}" class="block w-full btn-primary text-center py-4 rounded-xl shadow-lg shadow-green-200">
                                        إتمام الطلب
                                        <i class="fas fa-check-circle mr-2"></i>
                                    </a>
                                @else
                                    <div class="bg-yellow-50 text-yellow-800 p-4 rounded-lg text-sm text-center">
                                        المدراء لا يمكنهم تقديم طلبات
                                    </div>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="block w-full bg-gray-800 hover:bg-gray-900 text-white text-center font-bold py-4 rounded-xl transition shadow-lg mb-2">
                                    سجل دخولك للشراء
                                </a>
                                <p class="text-center text-sm text-gray-500">
                                    أو <a href="{{ route('register') }}" class="text-green-500 hover:underline">أنشئ حساب جديد</a>
                                </p>
                            @endauth
                        </div>
                        
                        <div class="mt-6 flex justify-center gap-4 text-gray-400 text-2xl">
                             <i class="fab fa-cc-visa"></i>
                             <i class="fab fa-cc-mastercard"></i>
                             <i class="fab fa-cc-apple-pay"></i>
                             <i class="fas fa-money-bill-wave"></i>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-lg p-12 text-center max-w-2xl mx-auto">
                <div class="bg-gray-100 w-32 h-32 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shopping-cart text-5xl text-gray-400"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">سلة التسوق فارغة</h2>
                <p class="text-gray-600 mb-8">يبدو أنك لم تضف أي منتجات للسلة بعد.</p>
                <a href="{{ route('shop') }}" class="btn-primary inline-block px-8">
                    تصفح المنتجات
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
