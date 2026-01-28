@extends('layouts.app')

@section('title', 'تفاصيل الطلب #' . $order->order_number . ' - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('customer.orders') }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-gray-500 hover:text-gray-900 shadow-sm transition">
                    <i class="fas fa-arrow-right"></i>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">تفاصيل الطلب #{{ $order->order_number }}</h1>
            </div>
            <div class="text-sm text-gray-500">
                تاريخ الطلب: {{ $order->created_at->format('Y/m/d h:i A') }}
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Items List -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6 border-b bg-gray-50">
                        <h2 class="font-bold text-gray-800">المنتجات</h2>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @foreach($order->items as $item)
                        <div class="p-6 flex items-center gap-4">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                                @if($item->product && $item->product->image)
                                    <img src="{{ asset($item->product->image) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <i class="fas fa-bicycle text-3xl text-gray-400"></i>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-1">{{ $item->product->name ?? 'منتج غير متاح' }}</h3>
                                <div class="text-gray-500 text-sm">الكمية: {{ $item->quantity }}</div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-gray-900">{{ number_format($item->price, 2) }} ر.س</div>
                                <div class="text-xs text-gray-500">للقطعة</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- Status Card -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-800 mb-4">حالة الطلب</h3>
                    <div class="flex items-center gap-3">
                        @if($order->status == 'pending')
                            <div class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></div>
                            <span class="text-yellow-700 font-bold">قيد الانتظار</span>
                        @elseif($order->status == 'processing')
                            <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                            <span class="text-blue-700 font-bold">جاري التجهيز</span>
                        @elseif($order->status == 'completed')
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-green-700 font-bold">تم التوصيل</span>
                        @else
                            <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                            <span class="text-gray-700 font-bold">ملغي</span>
                        @endif
                    </div>
                    <p class="text-gray-500 text-sm mt-2">
                        @if($order->status == 'pending')
                            سنقوم بمراجعة طلبك والبدء في تجهيزه قريباً.
                        @elseif($order->status == 'processing')
                            طلبك قيد التجهيز وسيتم شحنه قريباً.
                        @elseif($order->status == 'completed')
                            شكراً لتسوقك معنا! نتمنى أن ينال المنتج إعجابك.
                        @endif
                    </p>
                </div>

                <!-- Payment Info -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-800 mb-4">تفاصيل الفاتورة</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between text-gray-600">
                            <span>المجموع الفرعي</span>
                            <span>{{ number_format($order->total_amount, 2) }} ر.س</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>الشحن</span>
                            <span class="text-green-600">مجاني</span>
                        </div>
                        <div class="border-t pt-3 flex justify-between font-bold text-xl text-gray-900">
                            <span>الإجمالي</span>
                            <span>{{ number_format($order->total_amount, 2) }} ر.س</span>
                        </div>
                    </div>
                     <div class="mt-6 pt-4 border-t">
                        <h4 class="font-bold text-sm text-gray-700 mb-2">طريقة الدفع</h4>
                        <div class="flex items-center gap-2 text-gray-600">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>{{ $order->payment_method == 'cash_on_delivery' ? 'الدفع عند الاستلام' : $order->payment_method }}</span>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-800 mb-4">عنوان التوصيل</h3>
                    <div class="flex items-start gap-3 text-gray-600">
                        <i class="fas fa-map-marker-alt mt-1 text-green-500"></i>
                        <p class="leading-relaxed">
                            {{ $order->shipping_address }}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
