<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.pageYOffset > 50" :class="scrolled ? 'navbar-scrolled' : 'bg-transparent'" class="fixed w-full top-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-2xl font-bold flex items-center gap-2">
                <i class="fas fa-bicycle text-green-500 text-3xl"></i>
                <span class="text-gray-800">Bike Shop</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-500 font-semibold transition">الرئيسية</a>
                <a href="{{ route('shop') }}" class="text-gray-700 hover:text-green-500 font-semibold transition">المتجر</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-500 font-semibold transition">من نحن</a>
                <a href="{{ route('services') }}" class="text-gray-700 hover:text-green-500 font-semibold transition">الخدمات</a>
                <a href="{{ route('blog') }}" class="text-gray-700 hover:text-green-500 font-semibold transition">المدونة</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-500 font-semibold transition">اتصل بنا</a>
            </div>
            
            <!-- Right Side Icons -->
            <div class="hidden md:flex items-center gap-4">
                <!-- Cart -->
                <a href="{{ route('cart') }}" class="relative">
                    <i class="fas fa-shopping-cart text-xl text-gray-700 hover:text-green-500 transition"></i>
                    @php
                        $cartCount = count(session()->get('cart', []));
                    @endphp
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount }}</span>
                    @endif
                </a>
                
                <!-- User -->
                @auth
                    <div x-data="{ userOpen: false }" class="relative">
                        <button @click="userOpen = !userOpen" class="flex items-center gap-2 text-gray-700 hover:text-green-500">
                            <i class="fas fa-user-circle text-xl"></i>
                            <span class="font-semibold">{{ auth()->user()->name }}</span>
                        </button>
                        <div x-show="userOpen" @click.away="userOpen = false" class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">لوحة التحكم</a>
                            @else
                                <a href="{{ route('customer.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">حسابي</a>
                                <a href="{{ route('customer.orders') }}" class="block px-4 py-2 hover:bg-gray-100">طلباتي</a>
                            @endif
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-right px-4 py-2 hover:bg-gray-100 text-red-600">تسجيل الخروج</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-500 font-semibold">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold transition">تسجيل جديد</a>
                @endauth
            </div>
            
            <!-- Mobile Menu Button -->
            <button @click="open = !open" class="md:hidden text-gray-700">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="open" class="md:hidden pb-4">
            <div class="flex flex-col gap-3">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-500 font-semibold">الرئيسية</a>
                <a href="{{ route('shop') }}" class="text-gray-700 hover:text-green-500 font-semibold">المتجر</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-500 font-semibold">من نحن</a>
                <a href="{{ route('services') }}" class="text-gray-700 hover:text-green-500 font-semibold">الخدمات</a>
                <a href="{{ route('blog') }}" class="text-gray-700 hover:text-green-500 font-semibold">المدونة</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-500 font-semibold">اتصل بنا</a>
                @auth
                    <hr>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700">لوحة التحكم</a>
                    @else
                        <a href="{{ route('customer.dashboard') }}" class="text-gray-700">حسابي</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-600">تسجيل الخروج</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg text-center">تسجيل جديد</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Spacer for fixed navbar -->
<div class="h-20"></div>
