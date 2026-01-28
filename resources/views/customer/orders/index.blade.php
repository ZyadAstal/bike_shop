@extends('layouts.app')

@section('title', 'طلباتي - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        
        <div class="flex items-center gap-4 mb-8">
            <h1 class="text-3xl font-bold text-gray-900">طلباتي</h1>
            <a href="{{ route('customer.dashboard') }}" class="text-sm text-gray-500 hover:text-green-600 flex items-center gap-1">
                <i class="fas fa-arrow-left"></i> العودة للوحة التحكم
            </a>
        </div>

        @if($orders->count() > 0)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-right">
                        <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-4 font-bold">رقم الطلب</th>
                                <th class="px-6 py-4 font-bold">تاريخ الطلب</th>
                                <th class="px-6 py-4 font-bold">الحالة</th>
                                <th class="px-6 py-4 font-bold">الإجمالي</th>
                                <th class="px-6 py-4 font-bold">عدد المنتجات</th>
                                <th class="px-6 py-4 font-bold">خيارات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($orders as $order)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-bold text-gray-900">#{{ $order->order_number }}</td>
                                    <td class="px-6 py-4 text-gray-600 text-sm">{{ $order->created_at->format('Y/m/d') }}</td>
                                    <td class="px-6 py-4">
                                        @if($order->status == 'pending')
                                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">قيد الانتظار</span>
                                        @elseif($order->status == 'processing')
                                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-bold">جاري التجهيز</span>
                                        @elseif($order->status == 'completed')
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">مكتمل</span>
                                        @else
                                            <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs font-bold">ملغي</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-900">{{ number_format($order->total_amount, 2) }} ر.س</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $order->items->count() }} منتج</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('customer.orders.show', $order->id) }}" class="text-green-600 hover:text-green-800 font-bold text-sm">
                                            عرض التفاصيل <i class="fas fa-eye mr-1"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-100">
                    {{ $orders->links() }}
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-400 text-4xl">
                    <i class="fas fa-box-open"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">لا توجد طلبات حتى الآن</h2>
                <p class="text-gray-500 mb-8">لم تقم بإجراء أي عملية شراء بعد. تصفح متجرنا وابدأ التسوق!</p>
                <a href="{{ route('shop') }}" class="btn-primary">تصفح المتجر</a>
            </div>
        @endif

    </div>
</div>
@endsection
