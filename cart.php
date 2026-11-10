<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'سلة التسوق';
$pageDesc  = 'راجعي منتجاتك وأتمي عملية الشراء بسهولة.';

$cart = $_SESSION['cart'] ?? [];
$total = cartTotal();

require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════ BREADCRUMB ═══════ -->
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb">
            <a href="<?= url('index.php') ?>">الرئيسية</a>
            <span>/</span>
            <span class="current">سلة التسوق</span>
        </nav>
    </div>
</div>

<!-- ═══════ CART SECTION ═══════ -->
<section class="cart-section section">
    <div class="container">
        <h1 class="page-title text-right">سلة التسوق</h1>

        <?php if (empty($cart)): ?>
            <div class="empty-state">
                <i class="fa-solid fa-bag-shopping"></i>
                <h3>سلة التسوق فارغة</h3>
                <p>لم تقم بإضافة أي منتجات بعد.</p>
                <a href="<?= url('shop.php') ?>" class="btn btn-primary">تسوقي الآن</a>
            </div>
        <?php else: ?>
            <div class="cart-layout">
                
                <!-- Products Table -->
                <div class="cart-items">
                    <div class="cart-table-header">
                        <span>المنتج</span>
                        <span>السعر</span>
                        <span>الكمية</span>
                        <span>المجموع</span>
                        <span></span>
                    </div>
                    <?php foreach ($cart as $id => $item): ?>
                        <div class="cart-item" id="cart-item-<?= $id ?>">
                            <div class="cart-item-info">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=200&auto=format&fit=crop" alt="<?= clean($item['name']) ?>">
                                <div>
                                    <h3><?= clean($item['name']) ?></h3>
                                </div>
                            </div>
                            <div class="cart-item-price">
                                <?= formatPrice($item['price']) ?>
                            </div>
                            <div class="cart-item-qty">
                                <button onclick="updateCart(<?= $id ?>, <?= $item['qty'] - 1 ?>)">-</button>
                                <input type="number" value="<?= $item['qty'] ?>" readonly>
                                <button onclick="updateCart(<?= $id ?>, <?= $item['qty'] + 1 ?>)">+</button>
                            </div>
                            <div class="cart-item-total">
                                <?= formatPrice($item['price'] * $item['qty']) ?>
                            </div>
                            <div class="cart-item-remove">
                                <button onclick="removeFromCart(<?= $id ?>)" aria-label="حذف">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Cart Summary -->
                <div class="cart-summary">
                    <h2>ملخص الطلب</h2>
                    <div class="summary-row">
                        <span>المجموع الفرعي</span>
                        <span><?= formatPrice($total) ?></span>
                    </div>
                    <div class="summary-row">
                        <span>الشحن</span>
                        <span>يحدد لاحقاً</span>
                    </div>
                    <div class="summary-row total-row">
                        <span>الإجمالي</span>
                        <span><?= formatPrice($total) ?></span>
                    </div>
                    <a href="<?= url('checkout.php') ?>" class="btn btn-primary w-100">
                        إتمام الطلب <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <a href="<?= url('shop.php') ?>" class="continue-shopping">
                        <i class="fa-solid fa-arrow-right"></i> متابعة التسوق
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    function updateCart(productId, newQty) {
        if (newQty < 1) return;
        fetch('<?= url('cart_action.php') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=update&id=' + productId + '&qty=' + newQty
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }

    function removeFromCart(productId) {
        if (!confirm('هل أنت متأكد من حذف هذا المنتج؟')) return;
        fetch('<?= url('cart_action.php') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=remove&id=' + productId
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>