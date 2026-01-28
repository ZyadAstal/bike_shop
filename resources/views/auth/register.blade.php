@extends('layouts.app')

@section('title', 'تسجيل جديد - Bike Shop')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-gray-100 py-12 px-4">
    <div class="max-w-2xl w-full">
        <div class="text-center mb-8">
            <i class="fas fa-bicycle text-6xl text-green-500 mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-900">إنشاء حساب جديد</h2>
            <p class="text-gray-600 mt-2">انضم إلينا اليوم!</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8">
            @if($errors->any())
                <div class="bg-red-50 border-r-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Name -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">الاسم الكامل</label>
                        <div class="relative">
                            <span class="absolute right-3 top-3 text-gray-400">
                                <i class="fas fa-user"></i>
                            </span>
                            <input 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}"
                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="أحمد محمد"
                                required
                            >
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">البريد الإلكتروني</label>
                        <div class="relative">
                            <span class="absolute right-3 top-3 text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="email@example.com"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Password -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">كلمة المرور</label>
                        <div class="relative">
                            <span class="absolute right-3 top-3 text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input 
                                type="password" 
                                name="password" 
                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="••••••••"
                                required
                            >
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">تأكيد كلمة المرور</label>
                        <div class="relative">
                            <span class="absolute right-3 top-3 text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="••••••••"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Phone -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">رقم الجوال (اختياري)</label>
                        <div class="relative">
                            <span class="absolute right-3 top-3 text-gray-400">
                                <i class="fas fa-phone"></i>
                            </span>
                            <input 
                                type="text" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="05XXXXXXXX"
                            >
                        </div>
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">العنوان (اختياري)</label>
                        <div class="relative">
                            <span class="absolute right-3 top-3 text-gray-400">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <input 
                                type="text" 
                                name="address" 
                                value="{{ old('address') }}"
                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="الرياض، السعودية"
                            >
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                    إنشاء الحساب
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    لديك حساب بالفعل؟
                    <a href="{{ route('login') }}" class="text-green-500 hover:text-green-600 font-semibold">سجل الدخول</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
