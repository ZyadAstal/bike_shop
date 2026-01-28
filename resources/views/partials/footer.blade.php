<footer class="bg-gray-900 text-white pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            
            <!-- About -->
            <div>
                <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-bicycle text-green-500"></i>
                    Bike Shop
                </h3>
                <p class="text-gray-400 mb-4">
                    متجرك الأول للدراجات الهوائية والكهربائية بأعلى جودة وأفضل الأسعار.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-green-500 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-green-500 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-green-500 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-green-500 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-4">روابط سريعة</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-green-500 transition">الرئيسية</a></li>
                    <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-green-500 transition">المتجر</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-green-500 transition">من نحن</a></li>
                    <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-green-500 transition">الخدمات</a></li>
                    <li><a href="{{ route('blog') }}" class="text-gray-400 hover:text-green-500 transition">المدونة</a></li>
                    <li><a href="{{ route('faq') }}" class="text-gray-400 hover:text-green-500 transition">الأسئلة الشائعة</a></li>
                </ul>
            </div>
            
            <!-- Customer Service -->
            <div>
                <h4 class="text-lg font-bold mb-4">خدمة العملاء</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-green-500 transition">اتصل بنا</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-500 transition">سياسة الإرجاع</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-500 transition">الشحن والتوصيل</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-500 transition">الشروط والأحكام</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-500 transition">سياسة الخصوصية</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-bold mb-4">تواصل معنا</h4>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-start gap-2">
                        <i class="fas fa-map-marker-alt text-green-500 mt-1"></i>
                        <span>الرياض، المملكة العربية السعودية</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-phone text-green-500"></i>
                        <span dir="ltr">+966 50 123 4567</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-envelope text-green-500"></i>
                        <span>info@bikeshop.com</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-clock text-green-500"></i>
                        <span>السبت - الخميس: 9 ص - 10 م</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-gray-800 pt-6 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Bike Shop. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</footer>
