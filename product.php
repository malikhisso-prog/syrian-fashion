<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

// جلب ID المنتج من الرابط
$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = getProductById($productId);

// إذا المنتج غير موجود، نرجع للمتجر
if (!$product) {
    flash('المنتج غير موجود أو تم حذفه.', 'error');
    header('Location: ' . url('shop.php'));
    exit;
}

$pageTitle = $product['name'];
$pageDesc  = $product['description'];

require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════ BREADCRUMB ═══════ -->
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb">
            <a href="<?= url('index.php') ?>">الرئيسية</a>
            <span>/</span>
            <a href="<?= url('shop.php') ?>">المتجر</a>
            <span>/</span>
            <a href="<?= url('shop.php?cat=' . $product['category']) ?>"><?= clean($product['category_name']) ?></a>
            <span>/</span>
            <span class="current"><?= clean($product['name']) ?></span>
        </nav>
    </div>
</div>

<!-- ═══════ PRODUCT DETAILS ═══════ -->
<section class="product-details section">
    <div class="container">
        <div class="product-details-grid">
            
            <!-- Product Image -->
            <div class="product-gallery">
                <div class="main-image">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=800&auto=format&fit=crop" alt="<?= clean($product['name']) ?>">
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <span class="product-cat"><?= clean($product['category_name']) ?></span>
                <h1 class="product-title"><?= clean($product['name']) ?></h1>
                
                <div class="product-rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fa-solid fa-star <?= $i <= $product['rating'] ? 'active' : '' ?>"></i>
                    <?php endfor; ?>
                    <span>(<?= $product['rating'] ?>.0)</span>
                </div>

                <div class="product-price-box">
                    <span class="current-price"><?= formatPrice($product['price']) ?></span>
                    <?php if (!empty($product['old_price'])): ?>
                        <span class="old-price"><?= formatPrice($product['old_price']) ?></span>
                        <span class="discount-badge">
                            وفر <?= round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) ?>%
                        </span>
                    <?php endif; ?>
                </div>

                <p class="product-description"><?= clean($product['description']) ?></p>

                <!-- Sizes -->
                <?php if (!empty($product['sizes'])): ?>
                    <div class="product-option">
                        <label>المقاس:</label>
                        <div class="size-options">
                            <?php foreach ($product['sizes'] as $size): ?>
                                <button type="button" class="size-btn"><?= clean($size) ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Colors -->
                <?php if (!empty($product['colors'])): ?>
                    <div class="product-option">
                        <label>اللون:</label>
                        <div class="color-options">
                            <?php foreach ($product['colors'] as $color): ?>
                                <button type="button" class="color-btn"><?= clean($color) ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Add to Cart Form -->
                <div class="product-actions-box">
                    <div class="quantity-box">
                        <button type="button" class="qty-btn" onclick="changeQty(-1)">-</button>
                        <!-- شلنا كلمة readonly من هون -->
                        <input type="number" id="qty" value="1" min="1">
                        <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                    </div>
                    <button class="btn btn-primary add-to-cart-btn" onclick="addToCartFromDetails(<?= $product['id'] ?>)">
                        <i class="fa-solid fa-bag-shopping"></i> أضف إلى السلة
                    </button>
                </div>

                <!-- Extra Info -->
                <div class="product-meta">
                    <p><i class="fa-solid fa-check"></i> متوفر في المخزون (<?= $product['stock'] ?> قطعة)</p>
                    <p><i class="fa-solid fa-truck-fast"></i> توصيل سريع لجميع المحافظات</p>
                    <p><i class="fa-solid fa-rotate-left"></i> استبدال مجاني خلال 14 يوم</p>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    // تغيير الكمية
    function changeQty(change) {
        const input = document.getElementById('qty');
        let val = parseInt(input.value) + change;
        if (val < 1) val = 1;
        input.value = val;
    }

    // إضافة للسلة من صفحة التفاصيل
    function addToCartFromDetails(productId) {
        const qty = document.getElementById('qty').value;
        const btn = document.querySelector('.add-to-cart-btn');
        const originalHTML = btn.innerHTML;
        
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> جاري الإضافة...';

        fetch('<?= url('cart_action.php') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=add&id=' + productId + '&qty=' + qty
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                btn.innerHTML = '<i class="fa-solid fa-check"></i> تمت الإضافة';
                // تحديث عداد السلة
                const cartBtn = document.querySelector('.cart-btn');
                let badge = cartBtn.querySelector('.cart-count');
                if (!badge) {
                    badge = document.createElement('span');
                    badge.className = 'cart-count';
                    cartBtn.appendChild(badge);
                }
                badge.textContent = data.count;
                badge.style.display = 'flex';
            } else {
                alert(data.message);
                btn.innerHTML = originalHTML;
                btn.disabled = false;
            }
            setTimeout(() => { btn.innerHTML = originalHTML; btn.disabled = false; }, 2000);
        })
        .catch(() => {
            alert('حدث خطأ في الاتصال');
            btn.innerHTML = originalHTML;
            btn.disabled = false;
        });
    }

    // تفعيل أزرار المقاسات والألوان
    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
    document.querySelectorAll('.color-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.color-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>