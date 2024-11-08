<div class="add-container">
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

    <h5 class="add-h5">إضافة الجمعية</h5>
    <p class="add-p"></p>

    <form action="{{ route('associations.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="title" id="title"
                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}"
                placeholder="إسم الجمعية" required>
            @if ($errors->has('title'))
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group">
            <input type="text" name="category" id="category"
                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="category"
                value="{{ old('category') }}" required>
            @if ($errors->has('category'))
                <div class="invalid-feedback">
                    {{ $errors->first('category') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group">
            <input type="text" name="location" id="location"
                class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" value="{{ old('location') }}"
                placeholder="المنطقة" required>
            @if ($errors->has('location'))
                <div class="invalid-feedback">
                    {{ $errors->first('location') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>

        <button type="submit" class="btn btn-confirm add-form__submit-btn">إضافة الجمعية</button>
    </form>
</div>
