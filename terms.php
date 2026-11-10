<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'الشروط والأحكام';
$pageDesc  = 'شروط وأحكام استخدام الموقع.';

require_once __DIR__ . '/includes/header.php';
?>

<section class="section" style="background: #F9F9F9;">
    <div class="container" style="max-width: 800px; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); margin: 40px auto;">
        <h1 style="font-size: 32px; margin-bottom: 20px; color: #111;">الشروط والأحكام</h1>
        
        <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">مرحباً بك في <strong>Syrian Fashion</strong>. باستخدامك لهذا الموقع، فإنك توافق على الشروط والأحكام التالية. يرجى قراءتها بعناية.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">1. الطلبات والدفع</h3>
        <p style="color: #555; line-height: 1.8;">يتم تأكيد الطلبات بعد التحقق من توفر المنتجات. نحتفظ بالحق في رفض أو إلغاء أي طلب لأي سبب. حالياً، نعتمد طريقة الدفع عند الاستلام.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">2. الأسعار</h3>
        <p style="color: #555; line-height: 1.8;">جميع الأسعار المعروضة هي بالليرة السورية (ل.س) وتشمل الضرائب المطبقة. نحتفظ بالحق في تغيير الأسعار في أي وقت دون إشعار مسبق.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">3. الشحن والتوصيل</h3>
        <p style="color: #555; line-height: 1.8;">نسعى لتوصيل الطلبات في الوقت المحدد. أوقات التوصيل قد تتأثر بالظروف الجوية أو أي ظروف خارجة عن إرادتنا.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">4. الاستبدال والإرجاع</h3>
        <p style="color: #555; line-height: 1.8;">يمكنك استبدال المنتج أو إرجاعه خلال 14 يوماً من الاستلام، بشرط أن يكون المنتج بحالته الأصلية مع الغلاف والتغليف.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">5. الملكية الفكرية</h3>
        <p style="color: #555; line-height: 1.8;">جميع محتويات الموقع (نصوص، صور، تصاميم) هي ملكية حصرية لـ Syrian Fashion، ولا يجوز استخدامها دون إذن كتابي مسبق.</p>
        
        <p style="margin-top: 30px; color: #888; font-size: 14px;">آخر تحديث: <?= date('Y-m-d') ?></p>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>