@extends('layouts.app')

@section('title', 'إتمام الطلب - Bike Shop')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
            <i class="fas fa-check-circle ml-3 text-green-500"></i>
            إتمام الطلب
        </h1>

        <form action="{{ route('customer.checkout.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Shipping & Payment Info -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Shipping Info -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center border-b pb-4">
                            <span class="bg-green-100 text-green-600 w-8 h-8 rounded-full flex items-center justify-center ml-3 text-sm">1</span>
                            معلومات الشحن
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">الاسم للمستلم</label>
                                <input type="text" name="customer_name" value="{{ old('customer_name', auth()->user()->name) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">رقم الجوال</label>
                                <input type="text" name="customer_phone" value="{{ old('customer_phone', auth()->user()->phone) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required placeholder="05xxxxxxxx">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 font-semibold mb-2">عنوان التوصيل بالتفصيل</label>
                                <textarea name="shipping_address" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required placeholder="المدينة، الحي، الشارع، رقم المبنى...">{{ old('shipping_address', auth()->user()->address) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center border-b pb-4">
                            <span class="bg-green-100 text-green-600 w-8 h-8 rounded-full flex items-center justify-center ml-3 text-sm">2</span>
                            طريقة الدفع
                        </h2>
                        
                        <div class="space-y-4">
                            <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition border-green-500 bg-green-50">
                                <input type="radio" name="payment_method" value="cash_on_delivery" checked class="ml-4 w-5 h-5 text-green-600 focus:ring-green-500">
                                <div class="flex-1">
                                    <span class="font-bold text-gray-900 block">الدفع عند الاستلام</span>
                                    <span class="text-sm text-gray-500">ادفع نقداً عند استلام طلبك</span>
                                </div>
                                <i class="fas fa-money-bill-wave text-2xl text-green-600"></i>
                            </label>
                            
                            <label class="flex items-center p-4 border rounded-xl opacity-60 cursor-not-allowed bg-gray-50">
                                <input type="radio" name="payment_method" value="credit_card" disabled class="ml-4 w-5 h-5 text-gray-400">
                                <div class="flex-1">
                                    <span class="font-bold text-gray-500 block">بطاقة ائتمان / مدى</span>
                                    <span class="text-sm text-gray-400">غير متوفر حالياً</span>
                                </div>
                                <div class="flex gap-2 text-gray-400 text-xl">
                                    <i class="fab fa-cc-visa"></i>
                                    <i class="fab fa-cc-mastercard"></i>
                                </div>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 border-b pb-4">ملخص الطلب</h2>
                        
                        <!-- Mini Cart Items -->
                        <div class="space-y-4 mb-6 max-h-60 overflow-y-auto pr-2 custom-scrollbar">
                            @foreach($cart as $item)
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-bicycle text-gray-400"></i>
                                    </div>
                                    <div class="flex-1 text-sm">
                                        <h4 class="font-semibold text-gray-800 line-clamp-1">{{ $item['name'] }}</h4>
                                        <p class="text-gray-500">{{ $item['quantity'] }} x {{ number_format($item['price'], 2) }}</p>
                                    </div>
                                    <div class="font-semibold text-gray-700">
                                        {{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="border-t pt-4 space-y-3 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>المجموع</span>
                                <span class="font-semibold">{{ number_format($total, 2) }} ر.س</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>الشحن</span>
                                <span class="text-green-600 font-semibold">مجاني</span>
                            </div>
                            <div class="border-t border-dashed pt-3 flex justify-between items-center">
                                <span class="font-bold text-xl text-gray-900">الإجمالي النهائي</span>
                                <span class="font-bold text-2xl text-green-600">{{ number_format($total, 2) }} ر.س</span>
                            </div>
                        </div>

                        <button type="submit" class="w-full btn-primary text-lg py-4 rounded-xl shadow-lg shadow-green-200 group">
                            تأكيد الطلب
                            <i class="fas fa-check ml-2 transform group-hover:-translate-x-1 transition"></i>
                        </button>
                        
                        <a href="{{ route('cart') }}" class="block text-center mt-4 text-gray-500 hover:text-gray-700 text-sm">
                            العودة للسلة
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
