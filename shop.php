<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'المتجر';
$pageDesc  = 'تسوقي أحدث تشكيلات الأزياء السورية. فساتين، عبايات، بلوزات وإكسسوارات.';

$products = getProducts();

$currentCat = $_GET['cat'] ?? '';
if ($currentCat) {
    $products = array_filter($products, fn($p) => $p['category'] === $currentCat);
}

$search = $_GET['q'] ?? '';
if ($search) {
    $search = trim($search);
    $products = array_filter($products, fn($p) => mb_stripos($p['name'], $search) !== false);
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-header">
    <div class="container">
        <h1 class="page-title">المتجر</h1>
        <p class="page-desc">اكتشفي أحدث تشكيلاتنا المصممة بعناية فائقة لتناسب ذوقك</p>
    </div>
</section>

<section class="shop section section-light">
    <div class="container">
        <div class="shop-filters">
            <div class="filter-categories">
                <a href="<?= url('shop.php') ?>" class="filter-btn <?= empty($currentCat) ? 'active' : '' ?>">الكل</a>
                <a href="<?= url('shop.php?cat=dresses') ?>" class="filter-btn <?= $currentCat === 'dresses' ? 'active' : '' ?>">فساتين</a>
                <a href="<?= url('shop.php?cat=abayas') ?>" class="filter-btn <?= $currentCat === 'abayas' ? 'active' : '' ?>">عبايات</a>
                <a href="<?= url('shop.php?cat=blouses') ?>" class="filter-btn <?= $currentCat === 'blouses' ? 'active' : '' ?>">بلوزات</a>
                <a href="<?= url('shop.php?cat=accessories') ?>" class="filter-btn <?= $currentCat === 'accessories' ? 'active' : '' ?>">إكسسوارات</a>
            </div>
            <div class="filter-search">
                <form action="<?= url('shop.php') ?>" method="GET">
                    <input type="text" name="q" placeholder="ابحث..." value="<?= htmlspecialchars($search) ?>">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>

        <?php if (empty($products)): ?>
            <div class="empty-state">
                <i class="fa-solid fa-box-open"></i>
                <h3>لا توجد منتجات</h3>
                <p>لم نعثر على أي منتجات تطابق بحثك.</p>
                <a href="<?= url('shop.php') ?>" class="btn btn-primary">عرض كل المنتجات</a>
            </div>
        <?php else: ?>
            <div class="products-grid">
                <?php foreach ($products as $p): ?>
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
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>