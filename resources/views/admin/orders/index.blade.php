@extends('layouts.app')

@section('title', 'إدارة الطلبات - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">إدارة الطلبات</h1>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                        <tr>
                            <th class="px-6 py-4 font-bold">رقم الطلب</th>
                            <th class="px-6 py-4 font-bold">العميل</th>
                            <th class="px-6 py-4 font-bold">التاريخ</th>
                            <th class="px-6 py-4 font-bold">الحالة</th>
                            <th class="px-6 py-4 font-bold">الإجمالي</th>
                            <th class="px-6 py-4 font-bold">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($orders as $order)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">#{{ $order->order_number }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-800">{{ $order->user->name ?? 'زائر' }}</span>
                                        <span class="text-xs text-gray-500">{{ $order->user->email ?? '' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-sm">{{ $order->created_at->format('Y/m/d H:i') }}</td>
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
                                <td class="px-6 py-4 font-bold text-gray-900">{{ number_format($order->total_amount, 2) }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-primary py-1 px-3 text-sm shadow-none">
                                        التفاصيل
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
    </div>
</div>
@endsection
