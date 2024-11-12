<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>رؤية المشروع</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Cairo", sans-serif;
            direction: rtl;
            /* RTL for Arabic */
        }

        .register-top {
            display: flex;
            justify-content: flex-end;
        }

        .register-top button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div style="margin: 30px">
        <div class="register-top">
            <button class="btn-close" type="button" onclick="window.location.href='{{ route('main') }}'"
                aria-label="Close"></button>
        </div>
        <h5>رؤية المشروع</h5>
        <p style="font-size: 12px; color: black">
            مشروع تطبيق "بيت" او "Buytfinder" منصة رقمية لبنانية تساعد الأفراد
            المتضررين على إيجاد حلول سكنية بسرعة وفعالية. يهدف التطبيق إلى تسهيل
            التواصل بين الأشخاص المحتاجين للسكن وأصحاب العقارات والوسطاء أو الجمعيات
            التي تقدم مساعدات وخدمات الإيواء، بالإضافة إلى توفير وسيلة للمساهمة في
            تقديم المساعدات. هذا المشروع ليس مجرد أداة تقنية، بل هو جسر للتواصل بين
            الأشخاص المحتاجين وأولئك الذين يستطيعون تقديم المساعدة.
        </p>

        <h5>الفريق</h5>
        <p style="font-size: 12px; color: black">
            يتألف فريق العمل من مهندسين معماريين ومطورين (مبرمجين) يعملون بشغف على
            تقديم حلول تقنية لتخفيف معاناة المتضررين. يتمتع الفريق بخبرة واسعة في
            الاعمال العقارية والمساهمات الاجتماعية المعمارية وتطوير تطبيقات الويب
            والأنظمة التكنولوجية الداعمة للعمل الإنساني في لبنان.
        </p>

        <p style="font-size: 12px; color: black">
            <strong style="font-size: 16px;">ملاحظة:</strong> نحن نعمل على عرض
            الإعلان عن الشقة مع رقم صاحبها أو وكيلها دون تقاضي أي عمولة، ولا نتحمل
            أي مسؤولية تجاه المعاملات. يتم التأكد من وجود الشقة من خلال الاتصال
            المباشر، ونؤكد أننا لسنا طرفاً في تحديد السعر أو أي دفعات مقدمة. هدفنا
            هو تسهيل التواصل بين الأطراف فقط
        </p>

        <img src="	https://buytfinder.com/assets/images/logo.png" alt="logo" width="90px" />
        <div style="color: black">تواصل معنا</div>
        <div>
            <a href="https://www.instagram.com/buytfinder" target="_blank"
                style="
            text-decoration: none;
            width: 40px;
            height: 50px;
            color: black;
            font-size: 24px;
            font-weight: 600;
            border-radius: 50%;
            border: 2px solid transparent;
            margin-left: 8px;
          ">
                <i class="fa fa-instagram"></i>
            </a>
            <a href="https://whatsapp.com/channel/0029VanEMHuHFxOsOsW8I603" target="_blank"
                style="
            text-decoration: none;
            width: 40px;
            height: 50px;
            color: black;
            font-size: 24px;
            font-weight: 600;
            border-radius: 50%;
            border: 2px solid transparent;
          ">
                <i class="fa fa-whatsapp"></i>
            </a>
        </div>
        <a href="">buytfinder@gmail.com</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
