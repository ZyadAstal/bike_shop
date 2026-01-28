# XTRA Bicycle — Laravel + Blade

مشروع Laravel مع Blade مستوحى من تصميم [XTRA Bike Shop](https://xtratheme.com/elementor/bike-shop/).

## التشغيل

1. **اعتماديات PHP**
   ```bash
   composer install
   ```

2. **قاعدة البيانات**
   - ضبط `.env`: `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, إلخ.
   - إنشاء قاعدة البيانات (مثلاً `bike_shop_db`) في MySQL.
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

3. **اعتماديات الواجهة (Tailwind + Vite)**
   ```bash
   npm install
   npm run build
   ```
   للتطوير مع إعادة تحميل تلقائية:
   ```bash
   npm run dev
   ```

4. **البيئة**
   - انسخ `.env.example` إلى `.env` وعدّل الإعدادات إن احتجت.
   - شغّل `php artisan key:generate` إن لم تكن المفتاح موجوداً.

5. **تشغيل الخادم**
   ```bash
   php artisan serve
   ```
   أو استخدم XAMPP مع المجلد `public` كجذر للموقع.

## قاعدة البيانات

| الجدول | الوصف |
|--------|--------|
| `categories` | تصنيفات الدراجات (مثلاً Electric, Children) |
| `products` | المنتجات (اسم، سعر، خصم، تقييم، علاقة بـ category) |
| `testimonials` | آراء العملاء |
| `newsletter_subscribers` | بريد المشتركين في النشرة |

- **Migrations:** `database/migrations/2025_01_27_*_create_*_table.php`
- **Models:** `App\Models\Category`, `Product`, `Testimonial`, `NewsletterSubscriber`
- **Seeders:** `CategorySeeder`, `ProductSeeder`, `TestimonialSeeder` (يستدعيهم `DatabaseSeeder`)

## الصفحات

| المسار     | الوصف        |
|------------|--------------|
| `/`        | الرئيسية     |
| `/about`   | من نحن       |
| `/services`| الخدمات      |
| `/blog`    | المدونة      |
| `/shop`    | المتجر       |
| `/faq`     | الأسئلة الشائعة |
| `/contact` | اتصل بنا     |

- **Newsletter:** نموذج الاشتراك في الرئيسية يرسل `POST /newsletter` ويحفظ في `newsletter_subscribers`.

## الهيكل

- `resources/views/layouts/app.blade.php` — القالب الرئيسي
- `resources/views/partials/` — الهيدر والفوتر
- `resources/views/pages/` — صفحات الموقع
- `resources/css/bike-shop.css` — تنسيقات متجر الدراجات
- `app/Http/Controllers/PageController.php` — تحكم الصفحات
- `app/Http/Controllers/NewsletterController.php` — حفظ اشتراك النشرة

## المراجع

- [تصميم XTRA Bike Shop](https://xtratheme.com/elementor/bike-shop/)
