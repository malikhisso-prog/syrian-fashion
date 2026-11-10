<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'سياسة الخصوصية';
$pageDesc  = 'سياسة الخصوصية الخاصة بموقعنا.';

require_once __DIR__ . '/includes/header.php';
?>

<section class="section" style="background: #F9F9F9;">
    <div class="container" style="max-width: 800px; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); margin: 40px auto;">
        <h1 style="font-size: 32px; margin-bottom: 20px; color: #111;">سياسة الخصوصية</h1>
        
        <p style="color: #555; line-height: 1.8; margin-bottom: 15px;">نحن في <strong>Syrian Fashion</strong> نولي أهمية كبيرة لخصوصية زوارنا وعملائنا. توضح هذه الصفحة كيفية جمعنا واستخدامنا وحمايتنا لمعلوماتك الشخصية.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">1. المعلومات التي نجمعها</h3>
        <p style="color: #555; line-height: 1.8;">نقوم بجمع المعلومات التي تقدمها لنا طواعية عند إجراء عملية شراء أو التسجيل في نشرتنا البريدية، مثل: الاسم، رقم الهاتف، البريد الإلكتروني، والعنوان.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">2. كيفية استخدام المعلومات</h3>
        <p style="color: #555; line-height: 1.8;">نستخدم معلوماتك فقط لمعالجة طلباتك، توصيل المنتجات، وتحسين جودة خدمتنا. لا نقوم ببيع أو مشاركة بياناتك مع أي طرف ثالث لأغراض تجارية.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">3. حماية البيانات</h3>
        <p style="color: #555; line-height: 1.8;">نستخدم إجراءات أمنية مناسبة لحماية معلوماتك الشخصية من الوصول غير المصرح به أو التعديل أو الإفصاح.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">4. ملفات تعريف الارتباط (Cookies)</h3>
        <p style="color: #555; line-height: 1.8;">نستخدم ملفات تعريف الارتباط لتحسين تجربة التسوق الخاصة بك، مثل تذكر محتويات سلة التسوق الخاصة بك.</p>
        
        <h3 style="margin-top: 25px; margin-bottom: 10px; color: #111;">5. التغييرات على هذه السياسة</h3>
        <p style="color: #555; line-height: 1.8;">قد نقوم بتحديث سياسة الخصوصية من وقت لآخر. ننصحك بمراجعة هذه الصفحة بشكل دوري للاطلاع على أي تغييرات.</p>
        
        <p style="margin-top: 30px; color: #888; font-size: 14px;">آخر تحديث: <?= date('Y-m-d') ?></p>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>