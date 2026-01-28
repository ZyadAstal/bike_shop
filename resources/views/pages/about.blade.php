@extends('layouts.app')

@section('title', 'من نحن - Bike Shop')

@section('content')
<!-- Hero Section -->
<div class="bg-gray-900 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl font-bold mb-4">من نحن</h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">نحن أكثر من مجرد متجر دراجات، نحن مجتمع من الشغوفين بركوب الدراجات.</p>
    </div>
</div>

<!-- Story Section -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-full h-full border-4 border-green-500 rounded-xl"></div>
                <div class="relative bg-gray-200 h-96 rounded-xl overflow-hidden flex items-center justify-center">
                    <i class="fas fa-users text-8xl text-gray-400"></i>
                </div>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">قصتنا</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    تأسس متجر Bike Shop في عام 2020 بهدف واحد: توفير أفضل تجربة لركوب الدراجات للجميع. بدأنا كمتجر صغير للصيانة، ونمونا لنصبح الوجهة الأولى لمحبي الدراجات في المنطقة.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    نحن نؤمن بأن الدراجة ليست مجرد وسيلة مواصلات، بل هي أسلوب حياة، وسيلة للصحة، وصديقة للبيئة. لذلك نختار منتجاتنا بعناية فائقة لنضمن لك الجودة والأمان والمتعة.
                </p>
                
                <div class="grid grid-cols-3 gap-6 text-center mt-8">
                    <div>
                        <h3 class="text-4xl font-bold text-green-600 mb-2">+5000</h3>
                        <p class="text-gray-500 text-sm">عميل سعيد</p>
                    </div>
                    <div>
                        <h3 class="text-4xl font-bold text-green-600 mb-2">+500</h3>
                        <p class="text-gray-500 text-sm">دراجة مباعة</p>
                    </div>
                    <div>
                        <h3 class="text-4xl font-bold text-green-600 mb-2">100%</h3>
                        <p class="text-gray-500 text-sm">ضمان الجودة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Values Section -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">قيمنا</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-2xl mb-6">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">الجودة أولاً</h3>
                <p class="text-gray-600">لا نبيع أي منتج لا نستخدمه بأنفسنا. الجودة هي المعيار الأول في اختيارنا للمنتجات.</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-2xl mb-6">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">دعم متميز</h3>
                <p class="text-gray-600">فريقنا متاح دائماً لمساعدتك في اختيار الدراجة المناسبة وتقديم خدمات ما بعد البيع.</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 text-2xl mb-6">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">بيئة نظيفة</h3>
                <p class="text-gray-600">نشجع على استخدام الدراجات للمساهمة في تقليل الانبعاثات والحفاظ على كوكبنا.</p>
            </div>
        </div>
    </div>
</div>
@endsection
