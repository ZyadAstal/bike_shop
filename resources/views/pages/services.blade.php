@extends('layouts.app')

@section('title', 'خدماتنا - Bike Shop')

@section('content')
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">خدمات الصيانة والتركيب</h1>
            <p class="text-xl text-gray-600">نقدم لك خدمات احترافية للحفاظ على دراجتك في أفضل حال</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group">
                <div class="h-48 bg-gray-800 flex items-center justify-center group-hover:bg-green-600 transition duration-300">
                    <i class="fas fa-wrench text-6xl text-white"></i>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4">الصيانة الشاملة</h3>
                    <p class="text-gray-600 mb-6">فحص كامل للدراجة، تشحيم السلسلة، ضبط الفرامل، وفحص التروس لضمان أداء مثالي.</p>
                    <span class="text-green-600 font-bold block text-lg">تبدأ من 99 ر.س</span>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group">
                <div class="h-48 bg-gray-800 flex items-center justify-center group-hover:bg-green-600 transition duration-300">
                    <i class="fas fa-cogs text-6xl text-white"></i>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4">قطع الغيار والترقية</h3>
                    <p class="text-gray-600 mb-6">تركيب قطع غيار أصلية وترقية دراجتك الحالية بأحدث المكونات والإكسسوارات.</p>
                    <span class="text-green-600 font-bold block text-lg">حسب القطعة</span>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group">
                <div class="h-48 bg-gray-800 flex items-center justify-center group-hover:bg-green-600 transition duration-300">
                    <i class="fas fa-paint-brush text-6xl text-white"></i>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4">التنظيف والتلميع</h3>
                    <p class="text-gray-600 mb-6">غسيل احترافي للدراجة وتلميع الهيكل لإعادتها وكأنها جديدة تماماً.</p>
                    <span class="text-green-600 font-bold block text-lg">تبدأ من 49 ر.س</span>
                </div>
            </div>
        </div>

        <!-- Booking Section -->
        <div class="mt-20 bg-white rounded-2xl shadow-xl p-10 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-green-50 opacity-50"></div>
            <div class="relative z-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">هل تحتاج إلى صيانة؟</h2>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">تواصل معنا الآن لحجز موعد لصيانة دراجتك. فريقنا جاهز لخدمتك بأسرع وقت.</p>
                <a href="{{ route('contact') }}" class="btn-primary text-lg px-8">
                    احجز موعداً الآن
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
