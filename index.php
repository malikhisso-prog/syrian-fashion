<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'الرئيسية';
$pageDesc  = 'اكتشفي أحدث تصاميم الأزياء السورية بلمسة عصرية أنيقة. تسوقي الآن أونلاين.';

$featured = getFeaturedProducts(4);
require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════ HERO SECTION ═══════ -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="container hero-inner">
        <div class="hero-content">
            <span class="hero-tagline">مجموعة 2025 الجديدة</span>
            <h1 class="hero-title">أناقة <em>سورية</em><br>بلمسة عصرية</h1>
            <p class="hero-desc">
                اكتشفي مجموعتنا الحصرية من الأزياء المصممة بعناية فائقة.
                جودة استثنائية، تصاميم فريدة، وتجربة تسوق لا تُنسى.
            </p>
            <div class="hero-cta">
                <a href="<?= url('shop.php') ?>" class="btn btn-primary">تسوقي الآن</a>
                <a href="<?= url('about.php') ?>" class="btn btn-outline">اكتشفي قصتنا</a>
            </div>
            <div class="hero-stats">
                <div><strong>+500</strong><span>عميلة سعيدة</span></div>
                <div><strong>+120</strong><span>تصميم حصري</span></div>
                <div><strong>10+</strong><span>سنوات خبرة</span></div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shape hero-shape-1"></div>
            <div class="hero-shape hero-shape-2"></div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=800&h=1000&fit=crop" alt="مجموعة الأزياء الجديدة">
            </div>
            <div class="hero-badge">
                <i class="fa-solid fa-award"></i>
                <span>جودة<br>مضمونة</span>
            </div>
        </div>
    </div>
</section>

<!-- ═══════ FEATURES BAR ═══════ -->
<section class="features-bar">
    <div class="container features-grid">
        <div class="feature-item">
            <i class="fa-solid fa-truck-fast"></i>
            <div><h4>توصيل سريع</h4><p>لجميع المحافظات</p></div>
        </div>
        <div class="feature-item">
            <i class="fa-solid fa-rotate-left"></i>
            <div><h4>استبدال مجاني</h4><p>خلال 14 يوم</p></div>
        </div>
        <div class="feature-item">
            <i class="fa-solid fa-shield-halved"></i>
            <div><h4>دفع آمن</h4><p>عند الاستلام</p></div>
        </div>
        <div class="feature-item">
            <i class="fa-solid fa-headset"></i>
            <div><h4>دعم 24/7</h4><p>خدمة عملاء متميزة</p></div>
        </div>
    </div>
</section>

<!-- ═══════ CATEGORIES ═══════ -->
<section class="categories section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">تسوقي حسب الفئة</span>
            <h2 class="section-title">تصنيفاتنا المميزة</h2>
            <p class="section-desc">اختاري من بين مجموعة واسعة من التصنيفات المصممة لتناسب ذوقك</p>
        </div>

        <div class="categories-grid">
            <?php
            $cats = [
                ['slug' => 'dresses',     'name' => 'فساتين',      'icon' => 'fa-person-dress',   'img' => 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=600&auto=format&fit=crop'],
                ['slug' => 'abayas',      'name' => 'عبايات',      'icon' => 'fa-vest',           'img' => 'https://images.unsplash.com/photo-1612336307429-8a898d10e223?q=80&w=600&auto=format&fit=crop'],
                ['slug' => 'blouses',     'name' => 'بلوزات',      'icon' => 'fa-shirt',          'img' => 'https://images.unsplash.com/photo-1564257631407-4deb1f99d992?q=80&w=600&auto=format&fit=crop'],
                ['slug' => 'accessories', 'name' => 'إكسسوارات',   'icon' => 'fa-gem',            'img' => 'https://images.unsplash.com/photo-1599643477877-530eb83abc8e?q=80&w=600&auto=format&fit=crop'],
            ];
            foreach ($cats as $c): ?>
                <a href="<?= url('shop.php?cat=' . $c['slug']) ?>" class="category-card">
                    <div class="cat-img">
                        <img src="<?= $c['img'] ?>" alt="<?= $c['name'] ?>" loading="lazy">
                    </div>
                    <div class="cat-info">
                        <i class="fa-solid <?= $c['icon'] ?>"></i>
                        <h3><?= $c['name'] ?></h3>
                        <span>تسوقي الآن <i class="fa-solid fa-arrow-left"></i></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════ FEATURED PRODUCTS ═══════ -->
<section class="featured section section-light">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">مختاراتنا لكِ</span>
            <h2 class="section-title">منتجات مميزة</h2>
            <p class="section-desc">أفضل تصاميمنا المختارة بعناية لتناسب ذوقك الرفيع</p>
        </div>

        <div class="products-grid">
            <?php foreach ($featured as $p): ?>
                <article class="product-card">
                    <div class="product-media">
                        <a href="<?= url('product.php?id=' . $p['id']) ?>">
                            <img src="<?= productImage($p['image']) ?>" alt="<?= clean($p['name']) ?>" loading="lazy">
                        </a>
                        <?php if (!empty($p['old_price'])): ?>
                            <span class="badge badge-sale">
                                -<?= round((($p['old_price'] - $p['price']) / $p['old_price']) * 100) ?>%
                            </span>
                        <?php endif; ?>
                        <?php if (!empty($p['new'])): ?>
                            <span class="badge badge-new">جديد</span>
                        <?php endif; ?>
                        <div class="product-actions">
                            <button class="action-btn" onclick="addToCart(<?= $p['id'] ?>, this)" aria-label="أضف للسلة">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </button>
                            <a href="<?= url('product.php?id=' . $p['id']) ?>" class="action-btn" aria-label="عرض">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-body">
                        <span class="product-cat"><?= clean($p['category_name'] ?? '') ?></span>
                        <h3 class="product-name">
                            <a href="<?= url('product.php?id=' . $p['id']) ?>"><?= clean($p['name']) ?></a>
                        </h3>
                        <div class="product-price">
                            <span class="price-current"><?= formatPrice($p['price']) ?></span>
                            <?php if (!empty($p['old_price'])): ?>
                                <span class="price-old"><?= formatPrice($p['old_price']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="section-cta">
            <a href="<?= url('shop.php') ?>" class="btn btn-primary">عرض كل المنتجات</a>
        </div>
    </div>
</section>

<!-- ═══════ ABOUT SNIPPET ═══════ -->
<section class="about-snippet section">
    <div class="container about-grid">
        <div class="about-visual">
            <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?q=80&w=800&auto=format&fit=crop" alt="عن العلامة" loading="lazy">
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
            <ul class="about-list">
                <li><i class="fa-solid fa-check"></i> أقمشة فاخرة مختارة بعناية</li>
                <li><i class="fa-solid fa-check"></i> تصاميم حصرية بأيدي مصممين سوريين</li>
                <li><i class="fa-solid fa-check"></i> خياطة يدوية بدقة عالية</li>
                <li><i class="fa-solid fa-check"></i> تجربة تسوق آمنة وسهلة</li>
            </ul>
            <a href="<?= url('about.php') ?>" class="btn btn-outline">اقرأي المزيد</a>
        </div>
    </div>
</section>

<!-- ═══════ TESTIMONIALS ═══════ -->
<section class="testimonials section section-light">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">آراء عميلاتنا</span>
            <h2 class="section-title">ماذا قلن عنا؟</h2>
        </div>
        <div class="testimonials-grid">
            <?php
            $reviews = [
                ['name' => 'سارة أحمد',   'city' => 'دمشق',   'text' => 'جودة الأقمشة رائعة والتصاميم أنيقة جداً. تجربة تسوق مريحة وسريعة، سأعود للشراء بالتأكيد!'],
                ['name' => 'لينا محمود',  'city' => 'حلب',    'text' => 'أفضل متجر أزياء تعاملت معه. القطع تصل بنفس الشكل الموجود بالصور. خدمة العملاء ممتازة.'],
                ['name' => 'ريم الخوري',  'city' => 'اللاذقية','text' => 'كل قطعة أشتريها من هنا تلفت الأنظار. التصاميم فريدة وغير متكررة. أنصح الجميع بتجربتهم.'],
            ];
            foreach ($reviews as $r): ?>
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-text">"<?= clean($r['text']) ?>"</p>
                    <div class="testimonial-author">
                        <div class="avatar"><?= mb_substr($r['name'], 0, 1) ?></div>
                        <div>
                            <strong><?= $r['name'] ?></strong>
                            <span><?= $r['city'] ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════ CTA BANNER ═══════ -->
<section class="cta-banner">
    <div class="container cta-inner">
        <div>
            <h2>خصم 15% على أول طلب</h2>
            <p>استخدمي كود <strong>WELCOME15</strong> عند إتمام أول طلب لكِ</p>
        </div>
        <a href="<?= url('shop.php') ?>" class="btn btn-light">تسوقي الآن</a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>