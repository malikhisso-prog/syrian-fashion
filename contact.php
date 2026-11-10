<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'اتصل بنا';
$pageDesc  = 'تواصلي معنا لأي استفسار أو مساعدة. نحن هنا لخدمتك.';

// ── معالجة إرسال الرسالة ──
$messageSent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = clean($_POST['name'] ?? '');
    $email   = clean($_POST['email'] ?? '');
    $subject = clean($_POST['subject'] ?? '');
    $message = clean($_POST['message'] ?? '');
    
    if ($name && $email && $message) {
        // هنا يتم إرسال الإيميل فعلياً (سنعرض رسالة نجاح كمثال)
        $messageSent = true;
        flash('تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.', 'success');
    } else {
        flash('الرجاء تعبئة جميع الحقول المطلوبة.', 'error');
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════ PAGE HEADER ═══════ -->
<section class="page-header" style="background: #F9F9F9; padding: 60px 0; text-align: center;">
    <div class="container">
        <h1 class="page-title" style="font-size: 40px; font-weight: 800; margin-bottom: 10px;">اتصل بنا</h1>
        <p class="page-desc" style="color: #666;">نحن هنا للإجابة على استفساراتك ومساعدتك.</p>
    </div>
</section>

<!-- ═══════ CONTACT SECTION ═══════ -->
<section class="contact-section section">
    <div class="container">
        <div class="contact-grid">
            
            <!-- Contact Info -->
            <div class="contact-info">
                <h2 class="section-title" style="font-size: 28px; margin-bottom: 20px;">معلومات التواصل</h2>
                <p style="color: #666; margin-bottom: 30px;">يسعدنا تواصلك معنا عبر أي من الوسائل التالية:</p>
                
                <div class="contact-info-item">
                    <div class="icon-box"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <h4>العنوان</h4>
                        <p>دمشق - شارع الحمرا - بناء رقم 12</p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon-box"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <h4>الهاتف</h4>
                        <p dir="ltr"><?= SITE_PHONE ?></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon-box"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <h4>البريد الإلكتروني</h4>
                        <p><?= SITE_EMAIL ?></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon-box"><i class="fa-solid fa-clock"></i></div>
                    <div>
                        <h4>ساعات العمل</h4>
                        <p>السبت - الخميس: 10:00 ص - 9:00 م</p>
                    </div>
                </div>

                <div class="contact-social" style="margin-top: 30px;">
                    <h4 style="margin-bottom: 15px;">تابعنا على:</h4>
                    <div class="footer-social">
                        <a href="<?= SOCIAL_INSTAGRAM ?>" style="background: #111; color: #fff;" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        <a href="<?= SOCIAL_FACEBOOK ?>" style="background: #111; color: #fff;" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="<?= SOCIAL_WHATSAPP ?>" style="background: #111; color: #fff;" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-box">
                <h2 class="section-title" style="font-size: 28px; margin-bottom: 20px;">أرسل لنا رسالة</h2>
                
                <form action="<?= url('contact.php') ?>" method="POST">
                    <div class="form-group">
                        <label>الاسم الكامل *</label>
                        <input type="text" name="name" required placeholder="اسمك الكريم">
                    </div>
                    
                    <div class="form-group">
                        <label>البريد الإلكتروني *</label>
                        <input type="email" name="email" required placeholder="email@example.com">
                    </div>
                    
                    <div class="form-group">
                        <label>الموضوع</label>
                        <input type="text" name="subject" placeholder="موضوع الرسالة">
                    </div>
                    
                    <div class="form-group">
                        <label>الرسالة *</label>
                        <textarea name="message" rows="5" required placeholder="اكتب رسالتك هنا..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">إرسال الرسالة <i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>