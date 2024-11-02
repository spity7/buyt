<div class="donation-form__top">
    <div class="donation-form__top-right">
        <h5>تفاصيل التبرع</h5>
        <p>إملأ الاستمارة للتواصل مع الجهة المعنية</p>
    </div>
    <i class="fa fa-times"></i>
</div>

<form class="donation-form__bottom">
    <div class="form-group">
        <input type="text" id="name" name="name" class="form-control" placeholder="الاسم">
    </div>
    <div class="form-group">
        <input type="number" id="phone" name="phone" class="form-control" placeholder="رقم الهاتف" required>
    </div>
    <div class="form-group">
        <select id="donation_type" name="donation_type" class="form-select add-form__select" required=>
            <option value="">نوع التبرع</option>
            <option value="1">دعم مالي</option>
            <option value="2">ملابس</option>
            <option value="3">طعام</option>
            <option value="4">دواء</option>
            <option value="5">دم</option>
            <option value="6">أخرى</option>
        </select>
    </div>
    <div class="form-group">
        <textarea id="notes" name="notes" class="form-control" rows="4" placeholder="تفاصيل إضافية"></textarea>
    </div>
    <button type="submit" class="btn add-form__submit-btn">أرسل ملفك</button>
</form>
