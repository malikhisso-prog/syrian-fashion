<?php
/**
 * syrian_fashion - ملف الإعدادات الرئيسي
 */

// منع الوصول المباشر
if (!defined('SYRIAN_FASHION')) {
    define('SYRIAN_FASHION', true);
}

// إعدادات الموقع
define('SITE_NAME', 'Syrian Fashion');
define('SITE_NAME_AR', 'الأزياء السورية');
define('SITE_URL', 'http://localhost/syrian_fashion');
define('SITE_EMAIL', 'info@syrianfashion.com');
define('SITE_PHONE', '+963 999 000 000');

// روابط التواصل
define('SOCIAL_FACEBOOK', 'https://facebook.com/syrianfashion');
define('SOCIAL_INSTAGRAM', 'https://instagram.com/syrianfashion');
define('SOCIAL_WHATSAPP', 'https://wa.me/963999000000');

// إعدادات العملة
define('CURRENCY', 'ل.س');
define('CURRENCY_EN', 'SYP');

// إعدادات المنطقة الزمنية
date_default_timezone_set('Asia/Damascus');

// إعدادات عرض الأخطاء (في التطوير فقط)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// بدء الجلسة (للسلة)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}