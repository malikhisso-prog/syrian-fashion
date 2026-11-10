<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'من نحن';
$pageDesc  = 'تعرفي على قصة علامة الأزياء السورية ورؤيتنا في عالم الموضة.';

require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════ PAGE HEADER ═══════ -->
<section class="page-header" style="background: #F9F9F9; padding: 60px 0; text-align: center;">
    <div class="container">
        <h1 class="page-title" style="font-size: 40px; font-weight: 800; margin-bottom: 10px;">من نحن</h1>
        <p class="page-desc" style="color: #666;">قصة شغف، إبداع، وإرث سوري أصيل.</p>
    </div>
</section>

<!-- ═══════ ABOUT CONTENT ═══════ -->
<section class="about-page section">
    <div class="container">
        <div class="about-grid">
            <div class="about-visual">
                <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?q=80&w=800&auto=format&fit=crop" alt="قصتنا" loading="lazy">
                <div class="about-badge">
                    <strong>10+</strong>
                    <span>سنوات<br>من الإبداع</span>
                </div>
            </div>
            <div class="about-content">
                <span class="section-tag">قصتنا</span>
                <h2 class="section-title">إرث سوري..<br>بلمسة عصرية</h2>
                <p>
                    منذ أكثر من عقد، نصنع في <strong>Syrian Fashion</strong> تصاميم تحتفي بالأنوثة
                    وتروي حكاية التراث السوري بأسلوب معاصر. نؤمن بأن كل قطعة تحمل قصة،
                    وكل تفصيلة تصنع الفرق.
                </p>
                <p>
                    بدأنا كورشة صغيرة في قلب دمشق، واليوم نصل بتصاميمنا إلى كل بيت سوري، 
                    ونطمح للوصول إلى العالمية. فريقنا مكون من مصممين موهوبين وخياطين مهرة 
                    يعملون بشغف لتقديم أفضل ما لديهم.
                </p>
                
                <h3 style="margin-top: 30px; margin-bottom: 15px; font-size: 20px;">لماذا تختاريننا؟</h3>
                <ul class="about-list">
                    <li><i class="fa-solid fa-check"></i> أقمشة فاخرة مختارة بعناية من أفضل المصادر</li>
                    <li><i class="fa-solid fa-check"></i> تصاميم حصرية بأيدي مصممين سوريين</li>
                    <li><i class="fa-solid fa-check"></i> خياطة يدوية بدقة عالية وجودة مضمونة</li>
                    <li><i class="fa-solid fa-check"></i> تجربة تسوق آمنة وسهلة مع توصيل سريع</li>
                    <li><i class="fa-solid fa-check"></i> خدمة عملاء متميزة على مدار الساعة</li>
                </ul>
                
                <a href="<?= url('shop.php') ?>" class="btn btn-primary" style="margin-top: 10px;">تصفحي مجموعتنا</a>
            </div>
        </div>
    </div>
</section>

<!-- ═══════ VALUES ═══════ -->
<section class="values section section-light">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">قيمنا</span>
            <h2 class="section-title">ما نؤمن به</h2>
        </div>
        <div class="features-grid">
            <div class="feature-item" style="flex-direction: column; text-align: center; padding: 30px; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                <i class="fa-solid fa-gem" style="font-size: 40px; margin-bottom: 15px; color: #C5A880;"></i>
                <h4 style="font-size: 18px; margin-bottom: 10px;">الجودة أولاً</h4>
                <p style="color: #666; font-size: 14px;">لا نساوم أبداً على جودة الأقمشة أو الخياطة. كل قطعة نصنعها يجب أن تدوم وتُبهر.</p>
            </div>
            <div class="feature-item" style="flex-direction: column; text-align: center; padding: 30px; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                <i class="fa-solid fa-heart" style="font-size: 40px; margin-bottom: 15px; color: #C5A880;"></i>
                <h4 style="font-size: 18px; margin-bottom: 10px;">شغف بالتفاصيل</h4>
                <p style="color: #666; font-size: 14px;">نؤمن أن الأناقة تكمن في التفاصيل الصغيرة. نهتم بكل زر، كل خيط، وكل تطريز.</p>
            </div>
            <div class="feature-item" style="flex-direction: column; text-align: center; padding: 30px; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                <i class="fa-solid fa-leaf" style="font-size: 40px; margin-bottom: 15px; color: #C5A880;"></i>
                <h4 style="font-size: 18px; margin-bottom: 10px;">الاستدامة</h4>
                <p style="color: #666; font-size: 14px;">نسعى لاختيار مواد صديقة للبيئة وعمليات إنتاج تحترم كوكبنا ومجتمعنا.</p>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>