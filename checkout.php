<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

// إذا السلة فاضية، نرجع الزبون للمتجر
if (empty($_SESSION['cart'])) {
    flash('سلة التسوق فارغة. الرجاء إضافة منتجات قبل إتمام الطلب.', 'error');
    header('Location: ' . url('shop.php'));
    exit;
}

// ── معالجة تأكيد الطلب ──
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = clean($_POST['first_name'] ?? '');
    $lastName  = clean($_POST['last_name'] ?? '');
    $phone     = clean($_POST['phone'] ?? '');
    $city      = clean($_POST['city'] ?? '');
    $address   = clean($_POST['address'] ?? '');
    $notes     = clean($_POST['notes'] ?? '');
    
    // التحقق من الحقول الأساسية
    if ($firstName && $lastName && $phone && $city && $address) {
        
        // حفظ الطلب في جلسة (مؤقتاً عشان نعرضه للزبون)
        $_SESSION['last_order'] = [
            'name'    => $firstName . ' ' . $lastName,
            'phone'   => $phone,
            'city'    => $city,
            'address' => $address,
            'total'   => cartTotal(),
            'items'   => $_SESSION['cart'],
            'date'    => date('Y-m-d H:i')
        ];
        
        // تفريغ السلة بعد نجاح الطلب
        unset($_SESSION['cart']);
        
        // تحويل الزبون لصفحة نجاح الطلب
        header('Location: ' . url('checkout.php?success=1'));
        exit;
    } else {
        flash('الرجاء تعبئة جميع الحقول المطلوبة.', 'error');
    }
}

// ── عرض صفحة نجاح الطلب ──
if (isset($_GET['success']) && isset($_SESSION['last_order'])) {
    $order = $_SESSION['last_order'];
    $pageTitle = 'تم الطلب بنجاح';
    
    require_once __DIR__ . '/includes/header.php';
    ?>
    <section class="section" style="background: #F9F9F9; min-height: 60vh; display: flex; align-items: center;">
        <div class="container" style="max-width: 600px; text-align: center;">
            <div style="background: #fff; padding: 50px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <i class="fa-solid fa-circle-check" style="font-size: 80px; color: #2E7D32; margin-bottom: 20px;"></i>
                <h1 style="font-size: 32px; margin-bottom: 15px;">شكراً لك! تم استلام طلبك.</h1>
                <p style="color: #666; margin-bottom: 30px; font-size: 16px;">
                    أهلاً <strong><?= $order['name'] ?></strong>، تم تسجيل طلبك بنجاح. 
                    سيتواصل معك فريقنا قريباً لتأكيد التوصيل.
                </p>
                <div style="background: #f9f9f9; padding: 20px; border-radius: 10px; text-align: right; margin-bottom: 30px; border: 1px solid #eee;">
                    <p style="margin-bottom: 8px;"><strong>رقم الطلب:</strong> #<?= rand(10000, 99999) ?></p>
                    <p style="margin-bottom: 8px;"><strong>رقم الهاتف:</strong> <?= $order['phone'] ?></p>
                    <p style="margin-bottom: 8px;"><strong>العنوان:</strong> <?= $order['address'] ?></p>
                    <p><strong>الإجمالي:</strong> <?= formatPrice($order['total']) ?></p>
                </div>
                <a href="<?= url('shop.php') ?>" class="btn btn-primary">متابعة التسوق</a>
                <a href="<?= url('index.php') ?>" class="btn btn-outline" style="margin-right: 10px;">الرئيسية</a>
            </div>
        </div>
    </section>
    <?php
    require_once __DIR__ . '/includes/footer.php';
    unset($_SESSION['last_order']);
    exit;
}

// ── عرض صفحة الفورم ──
$pageTitle = 'إتمام الطلب';
$pageDesc  = 'أدخل بياناتك لإتمام عملية الشراء.';
$total = cartTotal();
require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════ BREADCRUMB ═══════ -->
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb">
            <a href="<?= url('index.php') ?>">الرئيسية</a>
            <span>/</span>
            <a href="<?= url('cart.php') ?>">السلة</a>
            <span>/</span>
            <span class="current">إتمام الطلب</span>
        </nav>
    </div>
</div>

<!-- ═══════ CHECKOUT SECTION ═══════ -->
<section class="checkout-section section">
    <div class="container">
        <h1 class="page-title text-right" style="margin-bottom: 30px;">إتمام الطلب</h1>

        <form action="<?= url('checkout.php') ?>" method="POST" class="checkout-layout">
            
            <!-- Billing Details -->
            <div class="checkout-form">
                <h2 class="checkout-title">بيانات التوصيل</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>الاسم الأول *</label>
                        <input type="text" name="first_name" required placeholder="مثال: أحمد">
                    </div>
                    <div class="form-group">
                        <label>اسم العائلة *</label>
                        <input type="text" name="last_name" required placeholder="مثال: محمد">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>رقم الهاتف *</label>
                        <input type="tel" name="phone" required placeholder="09xxxxxxx">
                    </div>
                    <div class="form-group">
                        <label>البريد الإلكتروني (اختياري)</label>
                        <input type="email" name="email" placeholder="email@example.com">
                    </div>
                </div>

                <div class="form-group">
                    <label>المدينة *</label>
                    <select name="city" required>
                        <option value="">اختر المدينة...</option>
                        <option value="دمشق">دمشق</option>
                        <option value="ريف دمشق">ريف دمشق</option>
                        <option value="حلب">حلب</option>
                        <option value="حمص">حمص</option>
                        <option value="حماة">حماة</option>
                        <option value="اللاذقية">اللاذقية</option>
                        <option value="طرطوس">طرطوس</option>
                        <option value="أخرى">محافظة أخرى</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>العنوان التفصيلي *</label>
                    <input type="text" name="address" required placeholder="الحي، الشارع، رقم المبنى...">
                </div>

                <div class="form-group">
                    <label>ملاحظات إضافية (اختياري)</label>
                    <textarea name="notes" rows="3" placeholder="أي تفاصيل تود إضافتها..."></textarea>
                </div>

                <h2 class="checkout-title" style="margin-top: 30px;">طريقة الدفع</h2>
                <div class="payment-methods">
                    <label class="payment-method">
                        <input type="radio" name="payment" value="cod" checked>
                        <span class="payment-box">
                            <i class="fa-solid fa-money-bill-wave"></i>
                            <strong>الدفع عند الاستلام</strong>
                            <small>ادفع نقداً عند وصول الطلب</small>
                        </span>
                    </label>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="checkout-summary">
                <h2 class="checkout-title">ملخص الطلب</h2>
                
                <div class="summary-products">
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <div class="summary-product-item">
                            <div class="summary-product-info">
                                <span class="summary-product-name"><?= clean($item['name']) ?> <strong>x<?= $item['qty'] ?></strong></span>
                            </div>
                            <span class="summary-product-price"><?= formatPrice($item['price'] * $item['qty']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="summary-totals">
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
                </div>

                <button type="submit" class="btn btn-primary w-100" style="margin-top: 20px;">
                    تأكيد الطلب <i class="fa-solid fa-check"></i>
                </button>
                <a href="<?= url('cart.php') ?>" class="continue-shopping">
                    <i class="fa-solid fa-arrow-right"></i> الرجوع للسلة
                </a>
            </div>
        </form>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>