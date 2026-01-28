@extends('layouts.app')

@section('title', 'الملف الشخصي - Bike Shop')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-4">
        
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">إعدادات الحساب</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Sidebar Navigation (Optional for future expansion) -->
                <div class="md:col-span-1">
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex flex-col items-center mb-6">
                            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-4xl mb-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                            <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                        </div>
                        <nav class="space-y-2">
                             <a href="{{ route('customer.dashboard') }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                                <i class="fas fa-home ml-2 w-5"></i> لوحة التحكم
                            </a>
                            <a href="{{ route('customer.orders') }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
                                <i class="fas fa-box-open ml-2 w-5"></i> طلباتي
                            </a>
                            <a href="#" class="block px-4 py-2 rounded-lg bg-green-50 text-green-700 font-bold transition">
                                <i class="fas fa-user-cog ml-2 w-5"></i> الملف الشخصي
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Forms -->
                <div class="md:col-span-2 space-y-8">
                    
                    <!-- Basic Info Form -->
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 border-b pb-4">المعلومات الشخصية</h2>
                        
                        <form action="{{ route('customer.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">الاسم الكامل</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('name') border-red-500 @enderror">
                                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">البريد الإلكتروني</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('email') border-red-500 @enderror">
                                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">رقم الهاتف</label>
                                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">العنوان الافتراضي</label>
                                    <input type="text" name="address" value="{{ old('address', $user->address) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                                </div>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn-primary py-2 px-6">حفظ التغييرات</button>
                            </div>
                        </form>
                    </div>

                    <!-- Password Form -->
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 border-b pb-4">تغيير كلمة المرور</h2>
                        
                        <form action="{{ route('customer.profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="space-y-4 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">كلمة المرور الحالية</label>
                                    <input type="password" name="current_password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('current_password') border-red-500 @enderror">
                                    @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">كلمة المرور الجديدة</label>
                                    <input type="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('password') border-red-500 @enderror">
                                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">تأكيد كلمة المرور الجديدة</label>
                                    <input type="password" name="password_confirmation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                                </div>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-6 rounded-lg transition duration-300">تحديث كلمة المرور</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
