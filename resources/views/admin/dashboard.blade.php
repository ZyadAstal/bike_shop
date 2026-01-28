@extends('layouts.app')

@section('title', 'لوحة تحكم الإدارة - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            
            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg sticky top-24 overflow-hidden">
                    <div class="p-6 bg-gray-800 text-white text-center">
                        <h3 class="font-bold text-xl">لوحة الإدارة</h3>
                        <p class="text-gray-400 text-sm mt-1">Admin Panel</p>
                    </div>
                    
                    <nav class="p-2 space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-100 text-gray-900 font-semibold rounded-lg">
                            <i class="fas fa-chart-line w-6 text-green-500"></i>
                            الإحصائيات
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-semibold rounded-lg transition">
                            <i class="fas fa-bicycle w-6 text-green-500"></i>
                            المنتجات
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-semibold rounded-lg transition">
                            <i class="fas fa-box w-6 text-green-500"></i>
                            الطلبات
                            @if($pendingOrders > 0)
                                <span class="bg-red-500 text-white text-xs px-2 py-0.5 rounded-full mr-auto">{{ $pendingOrders }}</span>
                            @endif
                        </a>
                        <div class="border-t my-2"></div>
                        <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-semibold rounded-lg transition">
                            <i class="fas fa-external-link-alt w-6"></i>
                            زيارة الموقع
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="lg:col-span-4">
                
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Revenue -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-green-500 hover:-translate-y-1 transition duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-gray-500 text-sm font-bold uppercase">إجمالي المبيعات</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($totalRevenue, 2) }}</h3>
                            </div>
                            <div class="p-3 bg-green-100 rounded-lg text-green-600">
                                <i class="fas fa-dollar-sign text-xl"></i>
                            </div>
                        </div>
                        <span class="text-xs text-green-600 font-semibold flex items-center">
                            <i class="fas fa-arrow-up ml-1"></i> +12.5% هذا الشهر
                        </span>
                    </div>

                    <!-- Orders -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-blue-500 hover:-translate-y-1 transition duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-gray-500 text-sm font-bold uppercase">الطلبات</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $totalOrders }}</h3>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500">
                            {{ $pendingOrders }} طلبات جديدة
                        </span>
                    </div>

                    <!-- Products -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-purple-500 hover:-translate-y-1 transition duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-gray-500 text-sm font-bold uppercase">المنتجات</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $totalProducts }}</h3>
                            </div>
                            <div class="p-3 bg-purple-100 rounded-lg text-purple-600">
                                <i class="fas fa-bicycle text-xl"></i>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500">
                            في 6 تصنيفات
                        </span>
                    </div>

                    <!-- Customers -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-yellow-500 hover:-translate-y-1 transition duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-gray-500 text-sm font-bold uppercase">العملاء</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $totalCustomers }}</h3>
                            </div>
                            <div class="p-3 bg-yellow-100 rounded-lg text-yellow-600">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                        <span class="text-xs text-green-600 font-semibold flex items-center">
                            <i class="fas fa-arrow-up ml-1"></i> +5 عملاء جدد
                        </span>
                    </div>
                </div>

                <!-- Recent Orders Table -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                    <div class="p-6 border-b flex justify-between items-center bg-gray-50">
                        <h2 class="text-lg font-bold text-gray-900">أحدث الطلبات</h2>
                        <a href="{{ route('admin.orders.index') }}" class="btn-primary py-2 px-4 text-sm shadow-none">عرض الجميع</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-right">
                            <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
                                <tr>
                                    <th class="px-6 py-4 font-bold">الطلب</th>
                                    <th class="px-6 py-4 font-bold">العميل</th>
                                    <th class="px-6 py-4 font-bold">التاريخ</th>
                                    <th class="px-6 py-4 font-bold">الحالة</th>
                                    <th class="px-6 py-4 font-bold">الإجمالي</th>
                                    <th class="px-6 py-4 font-bold">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($recentOrders as $order)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 text-gray-900 font-medium">#{{ $order->order_number }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600 ml-2">
                                                    {{ substr($order->user->name ?? 'Z', 0, 1) }}
                                                </div>
                                                <span class="text-sm font-semibold">{{ $order->user->name ?? 'عميل محذوف' }}</span>
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
                                        <td class="px-6 py-4 text-gray-900 font-bold">{{ number_format($order->total_amount, 2) }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-gray-400 hover:text-green-600 transition text-lg">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-8 text-center text-gray-500">لا توجد طلبات حتى الآن.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>
@endsection
