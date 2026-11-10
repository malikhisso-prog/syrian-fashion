</main>

<!-- Footer -->
<footer class="site-footer">
    <div class="footer-newsletter">
        <div class="container newsletter-inner">
            <div>
                <h3>اشترك في نشرتنا البريدية</h3>
                <p>كن أول من يعرف عن المجموعات الجديدة والعروض الحصرية</p>
            </div>
            <form class="newsletter-form" onsubmit="event.preventDefault(); this.reset(); alert('تم الاشتراك بنجاح!');">
                <input type="email" placeholder="بريدك الإلكتروني" required>
                <button type="submit">اشترك</button>
            </form>
        </div>
    </div>

    <div class="container footer-grid">
        <!-- Brand -->
        <div class="footer-col">
            <a href="<?= url('index.php') ?>" class="logo logo-light">
                <span class="logo-mark">S</span>
                <span class="logo-text">
                    <strong><?= SITE_NAME ?></strong>
                    <small><?= SITE_NAME_AR ?></small>
                </span>
            </a>
            <p class="footer-about">
                علامة سورية متخصصة في الأزياء الأصيلة بلمسة عصرية أنيقة.
                نصنع لكِ إطلالة لا تُنسى بجودة عالية وتصاميم حصرية.
            </p>
            <div class="footer-social">
                <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?= SOCIAL_FACEBOOK ?>" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="<?= SOCIAL_WHATSAPP ?>" target="_blank" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>

        <!-- Links -->
        <div class="footer-col">
            <h4>روابط سريعة</h4>
            <ul>
                <li><a href="<?= url('index.php') ?>">الرئيسية</a></li>
                <li><a href="<?= url('shop.php') ?>">المتجر</a></li>
                <li><a href="<?= url('about.php') ?>">من نحن</a></li>
                <li><a href="<?= url('contact.php') ?>">اتصل بنا</a></li>
            </ul>
        </div>

        <!-- Categories -->
        <div class="footer-col">
            <h4>التصنيفات</h4>
            <ul>
                <li><a href="<?= url('shop.php?cat=dresses') ?>">فساتين</a></li>
                <li><a href="<?= url('shop.php?cat=abayas') ?>">عبايات</a></li>
                <li><a href="<?= url('shop.php?cat=blouses') ?>">بلوزات</a></li>
                <li><a href="<?= url('shop.php?cat=accessories') ?>">إكسسوارات</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div class="footer-col">
            <h4>تواصل معنا</h4>
            <ul class="footer-contact">
                <li><i class="fa-solid fa-location-dot"></i> دمشق - شارع الحمرا</li>
                <li><i class="fa-solid fa-phone"></i> <?= SITE_PHONE ?></li>
                <li><i class="fa-solid fa-envelope"></i> <?= SITE_EMAIL ?></li>
                <li><i class="fa-solid fa-clock"></i> السبت - الخميس: 10ص - 9م</li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p>© <?= date('Y') ?> <?= SITE_NAME_AR ?> - جميع الحقوق محفوظة.</p>
            <div class="footer-legal">
                <a href="<?= url('privacy.php') ?>">سياسة الخصوصية</a>
                <a href="<?= url('terms.php') ?>">الشروط والأحكام</a>
            </div>
        </div>
    </div>
</footer>

<button class="back-to-top" id="backToTop" aria-label="أعلى الصفحة">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<script src="<?= url('assets/js/main.js') ?>"></script>
</body>
</html>