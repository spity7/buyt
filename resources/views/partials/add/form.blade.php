<div class="add-container">
    <h5 class="add-h5">تفاصيل السكن</h5>
    <p class="add-p">أضف سكن في المناطق الامنة</p>
    <form action="">
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="الاسم" required>
        </div>
        <div class="form-group">
            <input type="number" name="phone" id="phone" class="form-control" placeholder="رقم الهاتف" required>
        </div>
        <div class="form-group">
            <select name="category" id="category" class="form-select add-form__select" required="required">
                <option value="">نوع السكن</option>
                <option value="1">بيت</option>
                <option value="2">شقة</option>
                <option value="3">شاليه</option>
                <option value="4">مركز</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="type" id="type" placeholder="تفصيل نوع السكن"
                required>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="rooms-no" id="rooms-no" placeholder="عدد الغرف" required>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="are" id="area" placeholder="المساحة" required>
        </div>
        <div class="form-group">
            <select name="add-house-governorate" id="add-house-governorate" class="form-select add-form__select"
                required="required">
                <option value>المحافظة</option>
                <option value="04">بيروت</option>
                <option value="05">جبل لبنان</option>
                <option value="06">الجنوب</option>
                <option value="07">النبطية</option>
                <option value="08">البقاع</option>
                <option value="09">الشمال</option>
            </select>
        </div>
        <div class="form-group">
            <select id="add-house-cities" name="add-house-cities" class="form-select add-form__select"
                required="required">
                <option value="" selected="">البلدة</option>
                <option value="11002">الاشرفية</option>
                <option value="11055">الاونسكو</option>
                <option value="11071">الجامعة </option>
                <option value="11056">الجامعة الاميركية</option>
                <option value="11031">الحكمة</option>
                <option value="11074">الخضر</option>
                <option value="11091">الرملة البيضا</option>
                <option value="11088">السيوفي</option>
                <option value="11051">الصنائع</option>
                <option value="11001">العدلية</option>
                <option value="11037">المزرعة</option>
                <option value="11078">المنارة</option>
                <option value="11083">الناصرة</option>
                <option value="11082">النجمة</option>
                <option value="11021">الوطى</option>
                <option value="11029">اوتيل ديو</option>
                <option value="11005">باب إدريس</option>
                <option value="11006">باشورة</option>
                <option value="11010">برج أبو حيدر</option>
                <option value="11060">بسطا التحتا</option>
                <option value="11007">بسطا الفوقا</option>
                <option value="11086">بطركية</option>
                <option value="11009">بيروت</option>
                <option value="11053">تلة الخياط</option>
                <option value="11090">تلة الدروز</option>
                <option value="11057">جامعة القديس يوسف</option>
                <option value="11072">جسر</option>
                <option value="11014">جعيتاوي</option>
                <option value="11066">جميزة</option>
                <option value="11030">جنبلاط</option>
                <option value="11064">حرش</option>
                <option value="11059">حكمة</option>
                <option value="11018">حمرا</option>
                <option value="11013">دارالفتوى</option>
                <option value="11048">راس النبع</option>
                <option value="11047">راس بيروت</option>
                <option value="11049">رميل</option>
                <option value="11087">روشه</option>
                <option value="11058">زقاق البلاط</option>
                <option value="11042">ساحة النجمة</option>
                <option value="11085">سباق الخيل</option>
                <option value="11028">سراي الكبير</option>
                <option value="11089">صنوبره</option>
                <option value="11050">صيفي</option>
                <option value="11054">طريق الجديدة</option>
                <option value="11026">ظريف</option>
                <option value="11016">عاملية</option>
                <option value="11004">عين التينة</option>
                <option value="11003">عين المريسه</option>
                <option value="11017">غابي</option>
                <option value="11027">فرن الحايك</option>
                <option value="11022">قبيات</option>
                <option value="11045">قريطم</option>
                <option value="11084">قصر العدل</option>
                <option value="11044">قنطاري</option>
                <option value="11062">كورنيش النهر</option>
                <option value="11032">مار الياس</option>
                <option value="11033">مار مارون</option>
                <option value="11034">مار متر</option>
                <option value="11035">مار مخايل</option>
                <option value="11036">مار نقولا</option>
                <option value="11019">مجيدية (بيروت)</option>
                <option value="11038">مدور</option>
                <option value="11081">مرفأ</option>
                <option value="11041">مستشفى الروم</option>
                <option value="11040">مصيطبة</option>
                <option value="11077">ملعب</option>
                <option value="11020">منارة</option>
                <option value="11011">ميدان سباق الخيل</option>
                <option value="11039">مينا الحصن</option>
                <option value="11061">وسط بيروت</option>
            </select>
        </div>
        <div class="form-group">
            <select id="free-or-paid" name="free-or-paid" class="form-select add-form__select" required="required">
                <option value="">(مجاني / مدفوع)</option>
                <option value="1">مجاني</option>
                <option value="0">مدفوع</option>
            </select>
        </div>
        <div class="form-group">
            <select id="is-furnished" name="is-furnished" class="form-select add-form__select" required="required">
                <option value="">(مفروش / غير مفروش)</option>
                <option value="1">مفروش</option>
                <option value="0">غير مفروش</option>
            </select>
        </div>
        <div class="form-group">
            <input type="number" id="price" name="price" class="form-control" placeholder="السعر" required>
        </div>
        <div class="form-check">
            <label class="form-check-label" style="font-weight: bold">هل لديك whatsApp؟</label>
            <input type="checkbox" class="form-check-input">
        </div>
        <div class="form-group">
            <textarea id="notes" name="notes" class="form-control" rows="3" placeholder="وصف السكن"></textarea>
        </div>

        <button type="submit" class="btn btn-confirm add-form__submit-btn">أرسل ملفك</button>
    </form>
</div>
