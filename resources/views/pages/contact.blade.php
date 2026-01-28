@extends('layouts.app')

@section('title', 'اتصل بنا - Bike Shop')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">تواصل معنا</h1>
                <p class="text-xl text-gray-600">نحن هنا للإجابة على استفساراتك ومساعدتك</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Contact Info Cards -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-xl mx-auto mb-4">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">اتصل بنا</h3>
                    <p class="text-gray-600">+966 50 123 4567</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-xl mx-auto mb-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">البريد الإلكتروني</h3>
                    <p class="text-gray-600">info@bikeshop.com</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-xl mx-auto mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">موقعنا</h3>
                    <p class="text-gray-600">الرياض، طريق الملك فهد</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">أرسل لنا رسالة</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">الاسم</label>
                            <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">البريد الإلكتروني</label>
                            <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">الموضوع</label>
                        <input type="text" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">الرسالة</label>
                        <textarea name="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-lg transition duration-300">
                        إرسال الرسالة
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
