<?php
if (!defined('SYRIAN_FASHION')) {
    require_once __DIR__ . '/config.php';
    require_once __DIR__ . '/functions.php';
}

$pageTitle = $pageTitle ?? SITE_NAME_AR;
$pageDesc  = $pageDesc  ?? 'أزياء سورية أصيلة بلمسة عصرية أنيقة';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= clean($pageDesc) ?>">
    <title><?= clean($pageTitle) ?> | <?= SITE_NAME_AR ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/css/mobile.css') ?>">

    <!-- رابط الموقع للـ JavaScript -->
    <script>window.SITE_URL = '<?= SITE_URL ?>';</script>
</head>
<body>

<!-- Flash Messages -->
<?= displayFlash() ?>

<!-- Top Bar -->
<div class="topbar">
    <div class="container topbar-inner">
        <div class="topbar-left">
            <span><i class="fa-solid fa-truck-fast"></i> توصيل مجاني للطلبات فوق 500,000 ل.س</span>
        </div>
        <div class="topbar-right">
            <a href="tel:<?= SITE_PHONE ?>"><i class="fa-solid fa-phone"></i> <?= SITE_PHONE ?></a>
            <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="<?= SOCIAL_FACEBOOK ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="<?= SOCIAL_WHATSAPP ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </div>
</div>

<!-- Header -->
<header class="site-header">
    <div class="container header-inner">
        <!-- Logo -->
        <a href="<?= url('index.php') ?>" class="logo">
            <span class="logo-mark">S</span>
            <span class="logo-text">
                <strong><?= SITE_NAME ?></strong>
                <small><?= SITE_NAME_AR ?></small>
            </span>
        </a>

        <!-- Navigation -->
        <nav class="main-nav" id="mainNav">
            <ul>
                <li><a href="<?= url('index.php') ?>" class="<?= isActive('index.php') ?>">الرئيسية</a></li>
                <li><a href="<?= url('shop.php') ?>" class="<?= isActive('shop.php') ?>">المتجر</a></li>
                <li><a href="<?= url('about.php') ?>" class="<?= isActive('about.php') ?>">من نحن</a></li>
                <li><a href="<?= url('contact.php') ?>" class="<?= isActive('contact.php') ?>">اتصل بنا</a></li>
            </ul>
        </nav>

        <!-- Actions -->
        <div class="header-actions">
            <button class="icon-btn" aria-label="بحث" id="searchToggle">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <a href="<?= url('cart.php') ?>" class="icon-btn cart-btn" aria-label="السلة">
                <i class="fa-solid fa-bag-shopping"></i>
                <?php if (cartCount() > 0): ?>
                    <span class="cart-count"><?= cartCount() ?></span>
                <?php endif; ?>
            </a>
            <button class="menu-toggle" id="menuToggle" aria-label="القائمة">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <!-- Search Overlay -->
    <div class="search-overlay" id="searchOverlay">
        <form action="<?= url('shop.php') ?>" method="GET">
            <input type="text" name="q" placeholder="ابحث عن منتج..." autocomplete="off">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</header>

<main>