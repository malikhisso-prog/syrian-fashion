<?php
/**
 * syrian_fashion - الدوال المساعدة
 */

if (!defined('SYRIAN_FASHION')) {
    require_once __DIR__ . '/config.php';
}

/**
 * تحميل المنتجات من ملف JSON
 */
function getProducts(): array {
    $file = __DIR__ . '/../data/products.json';
    if (!file_exists($file)) return [];
    $json = file_get_contents($file);
    $data = json_decode($json, true);
    return $data['products'] ?? [];
}

/**
 * جلب منتج واحد بواسطة ID
 */
function getProductById(int $id): ?array {
    foreach (getProducts() as $product) {
        if ((int)$product['id'] === $id) return $product;
    }
    return null;
}

/**
 * جلب المنتجات حسب التصنيف
 */
function getProductsByCategory(string $category): array {
    return array_filter(getProducts(), fn($p) => $p['category'] === $category);
}

/**
 * جلب المنتجات المميزة
 */
function getFeaturedProducts(int $limit = 4): array {
    $featured = array_filter(getProducts(), fn($p) => !empty($p['featured']));
    return array_slice($featured, 0, $limit);
}

/**
 * تنظيف المدخلات
 */
function clean(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * تنسيق السعر
 */
function formatPrice(float $price): string {
    return number_format($price, 0, '.', ',') . ' ' . CURRENCY;
}

/**
 * بناء رابط الموقع
 */
function url(string $path = ''): string {
    return SITE_URL . '/' . ltrim($path, '/');
}

/**
 * رابط صورة المنتج (يدعم روابط كاملة أو اسم ملف محلي)
 */
function productImage(string $filename): string {
    if ($filename === '') {
        return 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=600&auto=format&fit=crop';
    }
    if (str_starts_with($filename, 'http://') || str_starts_with($filename, 'https://')) {
        return $filename;
    }
    return url('assets/images/products/' . $filename);
}

/**
 * عدد عناصر السلة
 */
function cartCount(): int {
    if (empty($_SESSION['cart'])) return 0;
    return array_sum(array_column($_SESSION['cart'], 'qty'));
}

/**
 * إجمالي السلة
 */
function cartTotal(): float {
    if (empty($_SESSION['cart'])) return 0;
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['qty'];
    }
    return $total;
}

/**
 * إضافة رسالة فلاش
 */
function flash(string $message, string $type = 'success'): void {
    $_SESSION['flash'][] = ['message' => $message, 'type' => $type];
}

/**
 * عرض رسائل الفلاش
 */
function displayFlash(): string {
    if (empty($_SESSION['flash'])) return '';
    $html = '<div class="flash-container">';
    foreach ($_SESSION['flash'] as $f) {
        $html .= '<div class="flash flash-' . $f['type'] . '">' . clean($f['message']) . '</div>';
    }
    $html .= '</div>';
    unset($_SESSION['flash']);
    return $html;
}

/**
 * التحقق من الصفحة النشطة
 */
function isActive(string $page): string {
    $current = basename($_SERVER['PHP_SELF']);
    return ($current === $page) ? 'active' : '';
}