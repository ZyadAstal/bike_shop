@extends('layouts.app')

@section('title', 'الأسئلة الشائعة - Bike Shop')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-center text-gray-900 mb-12">الأسئلة الشائعة</h1>

            <div class="space-y-4" x-data="{ active: null }">
                
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="active = active === 1 ? null : 1" class="w-full px-6 py-4 text-right flex justify-between items-center bg-white hover:bg-gray-50 transition">
                        <span class="font-bold text-lg text-gray-800">كم يستغرق التوصيل؟</span>
                        <i class="fas" :class="active === 1 ? 'fa-minus text-green-500' : 'fa-plus text-gray-400'"></i>
                    </button>
                    <div x-show="active === 1" x-collapse class="px-6 pb-4 text-gray-600 border-t border-gray-100">
                        يتم توصيل الطلبات داخل الرياض خلال 24 ساعة، وإلى باقي مدن المملكة خلال 3-5 أيام عمل.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="active = active === 2 ? null : 2" class="w-full px-6 py-4 text-right flex justify-between items-center bg-white hover:bg-gray-50 transition">
                        <span class="font-bold text-lg text-gray-800">هل يمكنني إرجاع المنتج؟</span>
                        <i class="fas" :class="active === 2 ? 'fa-minus text-green-500' : 'fa-plus text-gray-400'"></i>
                    </button>
                    <div x-show="active === 2" x-collapse class="px-6 pb-4 text-gray-600 border-t border-gray-100">
                        نعم، يمكنك إرجاع أو استبدال المنتج خلال 14 يوماً من تاريخ الشراء، بشرط أن يكون المنتج بحالته الأصلية ولم يتم استخدامه.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="active = active === 3 ? null : 3" class="w-full px-6 py-4 text-right flex justify-between items-center bg-white hover:bg-gray-50 transition">
                        <span class="font-bold text-lg text-gray-800">هل توفرون خدمة الصيانة؟</span>
                        <i class="fas" :class="active === 3 ? 'fa-minus text-green-500' : 'fa-plus text-gray-400'"></i>
                    </button>
                    <div x-show="active === 3" x-collapse class="px-6 pb-4 text-gray-600 border-t border-gray-100">
                        نعم، لدينا مركز صيانة متخصص يقدم خدمات فحص وإصلاح لجميع أنواع الدراجات. يمكنك حجز موعد عبر صفحة الخدمات.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="active = active === 4 ? null : 4" class="w-full px-6 py-4 text-right flex justify-between items-center bg-white hover:bg-gray-50 transition">
                        <span class="font-bold text-lg text-gray-800">ما هي طرق الدفع المتاحة؟</span>
                        <i class="fas" :class="active === 4 ? 'fa-minus text-green-500' : 'fa-plus text-gray-400'"></i>
                    </button>
                    <div x-show="active === 4" x-collapse class="px-6 pb-4 text-gray-600 border-t border-gray-100">
                        نوفر حالياً خدمة الدفع عند الاستلام. قريباً سنقوم بتفعيل الدفع عبر البطاقات الائتمانية ومدى.
                    </div>
                </div>

                 <!-- FAQ Item 5 -->
                 <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="active = active === 5 ? null : 5" class="w-full px-6 py-4 text-right flex justify-between items-center bg-white hover:bg-gray-50 transition">
                        <span class="font-bold text-lg text-gray-800">هل الدراجات مشمولة بالضمان؟</span>
                        <i class="fas" :class="active === 5 ? 'fa-minus text-green-500' : 'fa-plus text-gray-400'"></i>
                    </button>
                    <div x-show="active === 5" x-collapse class="px-6 pb-4 text-gray-600 border-t border-gray-100">
                        نعم، جميع الدراجات الجديدة مشمولة بضمان لمدة سنتين على الهيكل وسنة على القطع الميكانيكية ضد عيوب التصنيع.
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
