<div class="donation-form__top">
    <div class="donation-form__top-right">
        <h5>تفاصيل التبرع</h5>
        <p>إملأ الاستمارة للتواصل مع الجهة المعنية</p>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6>هناك بعض الأخطاء في البيانات المدخلة:</h6>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('donations.store') }}" method="POST" class="donation-form__bottom">
    @csrf

    <div class="form-group">
        <input type="text" id="name" name="name"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}"
            placeholder="الاسم" required>
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
        <span class="help-block"> </span>
    </div>
    <div class="form-group">
        <input type="text" id="phone" name="phone"
            class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone') }}"
            placeholder="رقم الهاتف" required>
        @if ($errors->has('phone'))
            <div class="invalid-feedback">
                {{ $errors->first('phone') }}
            </div>
        @endif
        <span class="help-block"> </span>
    </div>
    <div class="form-group">
        <select id="type" name="type"
            class="form-select add-form__select {{ $errors->has('type') ? 'is-invalid' : '' }}" required>
            <option value="">نوع التبرع</option>
            @foreach (App\Models\Donation::TYPE as $type)
                <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <textarea id="details" name="details" class="form-control" rows="4" placeholder="تفاصيل إضافية"></textarea>
    </div>
    <button type="submit" class="btn add-form__submit-btn">أرسل ملفك</button>
</form>
