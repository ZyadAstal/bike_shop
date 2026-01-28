@extends('layouts.app')

@section('title', 'تفاصيل الطلب #' . $order->order_number . ' - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
                <a href="{{ route('admin.orders.index') }}" class="text-gray-400 hover:text-gray-600"><i class="fas fa-arrow-right"></i></a>
                تفاصيل الطلب #{{ $order->order_number }}
            </h1>
            
            <!-- Generate Invoice Button (Mockup) -->
            <button onclick="window.print()" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-lg font-bold flex items-center gap-2">
                <i class="fas fa-print"></i> طباعة
            </button>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Order Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Items -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6 border-b bg-gray-50 flex justify-between items-center">
                        <h2 class="font-bold text-lg text-gray-800">المنتجات ({{ $order->items->sum('quantity') }})</h2>
                        <span class="text-sm text-gray-500">{{ $order->created_at->format('Y/m/d h:i A') }}</span>
                    </div>
                    
                    <div class="divide-y divide-gray-100">
                        @foreach($order->items as $item)
                            <div class="p-6 flex items-center">
                                <div class="w-16 h-16 bg-gray-100 rounded flex items-center justify-center flex-shrink-0 ml-4 overflow-hidden">
                                    @if($item->product && $item->product->image)
                                        <img src="{{ asset($item->product->image) }}" alt="" class="w-full h-full object-cover">
                                    @else
                                        <i class="fas fa-bicycle text-gray-400 text-2xl"></i>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800">{{ $item->product->name ?? 'منتج محذوف' }}</h4>
                                    <p class="text-sm text-gray-500">{{ number_format($item->price, 2) }} ر.س × {{ $item->quantity }}</p>
                                </div>
                                <div class="font-bold text-gray-900 text-lg">
                                    {{ number_format($item->price * $item->quantity, 2) }} ر.س
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="p-6 bg-gray-50 flex justify-end">
                        <div class="w-64 space-y-2">
                            <div class="flex justify-between text-gray-600">
                                <span>المجموع الفرعي:</span>
                                <span>{{ number_format($order->total_amount, 2) }} ر.س</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>الشحن:</span>
                                <span class="text-green-600">مجاني</span>
                            </div>
                            <div class="flex justify-between text-gray-900 font-bold text-xl pt-2 border-t">
                                <span>الإجمالي:</span>
                                <span>{{ number_format($order->total_amount, 2) }} ر.س</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer & Status -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- Update Status -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2">تحديث الحالة</h2>
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">حالة الطلب الحالية</label>
                            <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                                <option value="pending" class="text-yellow-600" {{ $order->status == 'pending' ? 'selected' : '' }}>⏳ قيد الانتظار</option>
                                <option value="processing" class="text-blue-600" {{ $order->status == 'processing' ? 'selected' : '' }}>⚙️ جاري التجهيز</option>
                                <option value="completed" class="text-green-600" {{ $order->status == 'completed' ? 'selected' : '' }}>✅ مكتمل</option>
                                <option value="cancelled" class="text-red-600" {{ $order->status == 'cancelled' ? 'selected' : '' }}>❌ ملغي</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full btn-primary py-3">تحديث الحالة</button>
                    </form>
                </div>

                <!-- Customer Info -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2">معلومات العميل</h2>
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-600 ml-3">
                            {{ substr($order->user->name ?? 'Z', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">{{ $order->user->name ?? 'زائر' }}</p>
                            <p class="text-sm text-gray-500">{{ $order->user->email ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-phone text-gray-400 mt-1"></i>
                            <span class="text-gray-600">{{ $order->user->phone ?? 'غير متوفر' }}</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-gray-400 mt-1"></i>
                            <span class="text-gray-600">{{ $order->shipping_address ?? ($order->user->address ?? 'غير متوفر') }}</span>
                        </div>
                         <div class="flex items-start gap-3">
                            <i class="fas fa-credit-card text-gray-400 mt-1"></i>
                            <span class="text-gray-600 font-bold">{{ $order->payment_method == 'cash_on_delivery' ? 'الدفع عند الاستلام' : $order->payment_method }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
