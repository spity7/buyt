<div class="container register-container">
    <div class="col-lg-6 col-md-8 col-xs-12">
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
        <div class="p-4">
            <h3 class="register-title">
                تعديل الحساب
            </h3>
            <div class="py-3"></div>
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <input name="first_name" type="text" class="form-control"
                        value="{{ old('first_name', $user->first_name) }}" placeholder="الإسم" required>
                    @if ($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>
                <div class="mb-3">
                    <input name="last_name" type="text" class="form-control"
                        value="{{ old('last_name', $user->last_name) }}" placeholder="العائلة" required>
                    @if ($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <select name="phone_code" class="form-select" title="Country Code">
                            <!-- Add more country codes as needed -->
                            <option value="+1">United States +1</option>

                        </select>
                        @if ($errors->has('phone_code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone_code') }}
                            </div>
                        @endif
                        <span class="help-block"> </span>
                    </div>
                    <div class="col-8">
                        <input name="phone" type="string" class="form-control" id="phone"
                            value="{{ old('phone', $user->phone) }}" placeholder="رقم الهاتف">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <span class="help-block"> </span>
                    </div>
                </div>
                <div class="mb-3">
                    <input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}"
                        placeholder="البريد الإلكتروني" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block"> </span>
                </div>
                <div class="mb-3 input-group">
                    <input name="password" type="password" minlength="8" class="form-control" placeholder="رمز المرور"
                        required>
                    <span class="input-group-text">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                <div class="mb-3 input-group">
                    <input name="password_confirmation" type="password" minlength="8" class="form-control"
                        placeholder="إعادة إدخال رمز المرور" required>
                    <span class="input-group-text">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom">تعديل</button>
                </div>
            </form>
        </div>
    </div>
</div>
