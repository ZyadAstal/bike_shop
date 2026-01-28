@extends('layouts.app')

@section('title', 'لوحة التحكم - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-24">
                    <div class="p-6 bg-gradient-to-r from-green-500 to-green-600 text-white text-center">
                        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 text-3xl">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3 class="font-bold text-xl">{{ auth()->user()->name }}</h3>
                        <p class="text-green-100 text-sm mt-1">{{ auth()->user()->email }}</p>
                    </div>
                    
                    <nav class="p-2">
                        <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-green-50 text-green-700 font-semibold rounded-lg mb-1">
                            <i class="fas fa-tachometer-alt w-6"></i>
                            لوحة التحكم
                        </a>
                        <a href="{{ route('customer.orders') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-semibold rounded-lg mb-1 transition">
                            <i class="fas fa-box w-6"></i>
                            طلباتي
                        </a>
                        <a href="{{ route('customer.profile') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-semibold rounded-lg mb-1 transition">
                            <i class="fas fa-user-cog w-6"></i>
                            الملف الشخصي
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 font-semibold rounded-lg transition text-right">
                                <i class="fas fa-sign-out-alt w-6"></i>
                                تسجيل الخروج
                            </button>
                        </form>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="lg:col-span-3">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">أهلاً بك في حسابك!</h1>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-semibold">إجمالي الطلبات</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalOrders }}</p>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-semibold">طلبات قيد الانتظار</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $pendingOrders }}</p>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-semibold">العنوان المسجل</p>
                            <p class="text-sm font-bold text-gray-900 truncate max-w-[10rem]">{{ auth()->user()->address ?? 'غير مسجل' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-lg font-bold text-gray-900">آخر الطلبات</h2>
                        <a href="{{ route('customer.orders') }}" class="text-sm text-green-600 hover:text-green-700 font-semibold">عرض الكل</a>
                    </div>
                    
                    @if($recentOrders->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-right">
                                <thead class="bg-gray-50 text-gray-600 text-sm">
                                    <tr>
                                        <th class="px-6 py-4 font-semibold">رقم الطلب</th>
                                        <th class="px-6 py-4 font-semibold">التاريخ</th>
                                        <th class="px-6 py-4 font-semibold">الحالة</th>
                                        <th class="px-6 py-4 font-semibold">الإجمالي</th>
                                        <th class="px-6 py-4 font-semibold">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($recentOrders as $order)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 font-medium text-gray-900">{{ $order->order_number }}</td>
                                            <td class="px-6 py-4 text-gray-500">{{ $order->created_at->format('Y/m/d') }}</td>
                                            <td class="px-6 py-4">
                                                @if($order->status == 'pending')
                                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">قيد الانتظار</span>
                                                @elseif($order->status == 'processing')
                                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">جاري التجهيز</span>
                                                @elseif($order->status == 'completed')
                                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">مكتمل</span>
                                                @else
                                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">ملغي</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 font-bold text-gray-900">{{ number_format($order->total_amount, 2) }} ر.س</td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('customer.orders.show', $order->id) }}" class="text-green-600 hover:text-green-800 font-semibold text-sm">
                                                    عرض التفاصيل
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-12 text-center text-gray-500">
                            <i class="fas fa-box-open text-4xl mb-4 text-gray-300"></i>
                            <p>ليس لديك أي طلبات سابقة.</p>
                            <a href="{{ route('shop') }}" class="text-green-500 hover:underline mt-2 inline-block">تصفح المتجر</a>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
