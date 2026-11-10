# Syrian Fashion - E-Commerce Website

موقع ويب متكامل لشركة أزياء سورية (متجر إلكتروني) بتصميم عصري وأنيق.

## 🚀 المميزات (Features)
- تصميم متجاوب بالكامل (Responsive) يعمل على الموبايل، التابلت، والكمبيوتر.
- صفحة رئيسية احترافية مع عرض المنتجات المميزة والتصنيفات.
- صفحة متجر مع إمكانية البحث والفلترة حسب التصنيف.
- صفحة تفاصيل المنتج مع اختيار المقاس واللون والكمية.
- سلة تسوق تفاعلية (إضافة، تعديل الكمية، حذف) بدون إعادة تحميل الصفحة (AJAX).
- صفحة إتمام الطلب (Checkout) مع التحقق من البيانات.
- لوحة تحكم بسيطة للبيانات عبر ملف JSON (بدون قاعدة بيانات).

## 💻 التقنيات المستخدمة (Tech Stack)
- **Backend:** PHP 8+
- **Frontend:** HTML5, CSS3, Vanilla JavaScript
- **Data:** JSON (للتجربة)
- **Design:** Modern Elegance (أسود فحمي + ذهبي هادئ)
- **Fonts:** Tajawal & Cairo
- **Icons:** Font Awesome

## 📁 هيكل المشروع (Project Structure)
```text
/syrian_fashion/
├── index.php          (الرئيسية)
├── about.php          (من نحن)
├── shop.php           (المتجر)
├── product.php        (تفاصيل المنتج)
├── cart.php           (السلة)
├── checkout.php       (إتمام الطلب)
├── contact.php        (اتصل بنا)
├── privacy.php        (سياسة الخصوصية)
├── terms.php          (الشروط والأحكام)
├── /includes/
│   ├── config.php
│   ├── header.php
│   ├── footer.php
│   └── functions.php
├── /assets/
│   ├── /css/style.css
│   ├── /js/main.js
│   └── /images/
└── /data/
    └── products.json  (بيانات المنتجات التجريبية)
