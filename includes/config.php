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

// ── اكتشاف الرابط الأساسي تلقائياً (http / https + مجلد الموقع) ──
$__host = $_SERVER['HTTP_HOST'] ?? 'localhost';

$__isHttps = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (($_SERVER['SERVER_PORT'] ?? '') == 443)
    || (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')
    || (strpos($_SERVER['HTTP_CF_VISITOR'] ?? '', 'https') !== false)
);
$__scheme = $__isHttps ? 'https' : 'http';

// مسار مجلد الموقع بالنسبة لجذر السيرفر (محلياً: /syrian_fashion ، على الاستضافة: فارغ)
$__docRoot = rtrim(str_replace('\\', '/', (string) realpath($_SERVER['DOCUMENT_ROOT'] ?? '')), '/');
$__appRoot = rtrim(str_replace('\\', '/', (string) realpath(__DIR__ . '/..')), '/');
$__basePath = '';
if ($__docRoot !== '' && strpos($__appRoot, $__docRoot) === 0) {
    $__basePath = substr($__appRoot, strlen($__docRoot));
}

define('SITE_URL', $__scheme . '://' . $__host . $__basePath);

$__isLocal = in_array(preg_replace('/:\d+$/', '', $__host), ['localhost', '127.0.0.1'], true);

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

// عرض الأخطاء فقط على الجهاز المحلي
ini_set('display_errors', $__isLocal ? '1' : '0');
error_reporting(E_ALL);

// بدء الجلسة (للسلة)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}