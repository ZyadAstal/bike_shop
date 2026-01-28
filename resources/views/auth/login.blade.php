@extends('layouts.app')

@section('title', 'تسجيل الدخول - Bike Shop')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-gray-100 py-12 px-4">
    <div class="max-w-md w-full">
        <div class="text-center mb-8">
            <i class="fas fa-bicycle text-6xl text-green-500 mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-900">تسجيل الدخول</h2>
            <p class="text-gray-600 mt-2">مرحباً بعودتك!</p>
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

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-6">
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

                <!-- Password -->
                <div class="mb-6">
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

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="ml-2 w-4 h-4 text-green-500 focus:ring-green-500 rounded">
                        <span class="text-gray-700">تذكرني</span>
                    </label>
                    <a href="#" class="text-green-500 hover:text-green-600 text-sm font-semibold">نسيت كلمة المرور؟</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                    تسجيل الدخول
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    ليس لديك حساب؟
                    <a href="{{ route('register') }}" class="text-green-500 hover:text-green-600 font-semibold">سجل الآن</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
