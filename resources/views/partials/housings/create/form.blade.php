<div class="add-container">
    <h5 class="add-h5">تفاصيل السكن</h5>
    <p class="add-p">أضف سكن في المناطق الامنة</p>

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
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('housings.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="name" id="name"
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
            <input type="number" name="phone" id="phone"
                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="رقم الهاتف"
                value="{{ old('phone') }}" required>
            @if ($errors->has('phone'))
                <div class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group w-50 ms-auto">
            <select name="type" id="type"
                class="form-select add-form__select {{ $errors->has('type') ? 'is-invalid' : '' }}"
                value="{{ old('type') }}" required>
                <option value="" selected="">نوع السكن</option>
                @foreach (App\Models\Housing::TYPE as $type)
                    <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>
                        {{ ucfirst($type) }}</option>
                @endforeach
                @can('manage users')
                    <option value="مركز" {{ old('type') == 'مركز' ? 'selected' : '' }}>مركز</option>
                @endcan
            </select>
            @if ($errors->has('type'))
                <div class="invalid-feedback">
                    {{ $errors->first('type') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group">
            <input type="number" class="form-control {{ $errors->has('nb_rooms') ? 'is-invalid' : '' }}"
                value="{{ old('nb_rooms') }}" name="nb_rooms" id="nb_rooms" placeholder="عدد الغرف" required>
            @if ($errors->has('nb_rooms'))
                <div class="invalid-feedback">
                    {{ $errors->first('nb_rooms') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group">
            <input type="number" class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area"
                id="area" value="{{ old('area') }}" placeholder="المساحة" required>
            @if ($errors->has('area'))
                <div class="invalid-feedback">
                    {{ $errors->first('area') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group w-50 ms-auto">
            <select name="governorate" id="governorate"
                class="form-select add-form__select {{ $errors->has('governorate') ? 'is-invalid' : '' }}" required>
                <option value="">المحافظة</option>
                @foreach (App\Models\Housing::GOVERNORATES as $governorate)
                    <option value="{{ $governorate }}" {{ old('governorate') == $governorate ? 'selected' : '' }}>
                        {{ ucfirst($governorate) }}</option>
                @endforeach
            </select>
            @if ($errors->has('governorate'))
                <div class="invalid-feedback">
                    {{ $errors->first('governorate') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group w-50 ms-auto">
            <select id="city" name="city"
                class="form-select add-form__select {{ $errors->has('city') ? 'is-invalid' : '' }}"
                value="{{ old('city') }}" required>
                <option value="" selected="">البلدة</option>
            </select>
            @if ($errors->has('city'))
                <div class="invalid-feedback">
                    {{ $errors->first('city') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group w-75 ms-auto">
            <select id="furnishing_status" name="furnishing_status"
                class="form-select add-form__select {{ $errors->has('furnishing_status') ? 'is-invalid' : '' }}"
                value="{{ old('furnishing_status') }}" required>
                <option value="" selected="">(مفروش / غير مفروش)</option>
                <option value="مفروش" {{ old('furnishing_status') == 'مفروش' ? 'selected' : '' }}>مفروش</option>
                <option value="غير مفروش" {{ old('furnishing_status') == 'غير مفروش' ? 'selected' : '' }}>غير مفروش
                </option>
            </select>
            @if ($errors->has('furnishing_status'))
                <div class="invalid-feedback">
                    {{ $errors->first('furnishing_status') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group w-75 ms-auto">
            <select id="service_type" name="service_type"
                class="form-select add-form__select {{ $errors->has('service_type') ? 'is-invalid' : '' }}"
                value="{{ old('service_type') }}" required onchange="togglePriceRequirement()">
                <option value="" selected="">(مجاني / مدفوع)</option>
                <option value="مجانا" {{ old('service_type') == 'مجانا' ? 'selected' : '' }}>مجاني</option>
                <option value="للايجار" {{ old('service_type') == 'للايجار' ? 'selected' : '' }}>مدفوع</option>
            </select>
            @if ($errors->has('service_type'))
                <div class="invalid-feedback">
                    {{ $errors->first('service_type') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group w-75 ms-auto" id="price-group" style="display: none;">
            <div class="housing-price__div">
                <span class="input-group-text">$</span>
                <input type="number" id="price" name="price"
                    class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') }}"
                    placeholder="السعر">
            </div>
            @if ($errors->has('price'))
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>
        <div class="form-group">
            <textarea id="description" name="description"
                class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description') }}"
                rows="3" placeholder="وصف السكن" required></textarea>
            @if ($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            @endif
            <span class="help-block"> </span>
        </div>

        <button type="submit" class="btn btn-confirm add-form__submit-btn">أرسل ملفك</button>
    </form>
</div>

<script>
    function togglePriceRequirement() {
        const serviceType = document.getElementById('service_type').value;
        const priceInput = document.getElementById('price');
        const priceGroup = document.getElementById('price-group');

        if (serviceType === 'للايجار') { // 'مدفوع'
            priceGroup.style.display = 'block';
            priceInput.setAttribute('required', 'required');
        } else { // 'مجاني' or unselected
            priceGroup.style.display = 'none';
            priceInput.removeAttribute('required');
            priceInput.value = ''; // Optional: clear the value if hidden
        }
    }

    // Initialize on page load in case of old form data
    document.addEventListener('DOMContentLoaded', togglePriceRequirement);
</script>

<script>
    $(document).ready(function() {
        // The cities grouped by governorate
        var citiesByGovernorate = {
            'بيروت': @json($beriut_cities),
            'البقاع': @json($beqaa_cities),
            'جبل لبنان': @json($mount_cities),
            'النبطية': @json($nabatieh_cities),
            'الشمال': @json($shmel_cities),
            'الجنوب': @json($jnoub_cities)
        };

        // Initialize Select2 for the city select input
        $('#city').select2({
            placeholder: "اختر المدينة",
            allowClear: true
        });

        // Handle the governorate change event
        $('#governorate').change(function() {
            var selectedGovernorate = $(this).val();

            // Clear the current city options
            $('#city').empty();
            $('#city').append('<option value="" selected="">البلدة</option>'); // Default option

            if (selectedGovernorate) {
                // Get the cities for the selected governorate
                var cities = citiesByGovernorate[selectedGovernorate];

                // Append the cities to the city select input
                if (cities) {
                    cities.forEach(function(city) {
                        $('#city').append('<option value="' + city.name + '">' + city.nameAr +
                            '</option>');
                    });
                }

                // Refresh the Select2 input to show the updated list of cities
                $('#city').trigger('change');
            }

            // Reinitialize Select2 for search functionality
            $('#city').select2({
                placeholder: "اختر المدينة",
                allowClear: true
            });
        });

        // Trigger the change event to populate cities if a governorate is selected
        $('#governorate').trigger('change');
    });
</script>

{{-- <script>
    // Hide all city options when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        var cityOptions = document.querySelectorAll('.city-option');
        cityOptions.forEach(function(option) {
            option.style.display = 'none';
        });
    });

    // Show relevant cities when a governorate is selected
    document.getElementById('governorate').addEventListener('change', function() {
        var selectedGovernorate = this.value;
        var cityOptions = document.querySelectorAll('.city-option');

        // Show only cities that match the selected governorate
        cityOptions.forEach(function(option) {
            if (selectedGovernorate && option.getAttribute('data-governorate') ===
                selectedGovernorate) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });

        // Reset city selection when changing the governorate
        document.getElementById('city').value = '';
    });
</script>

<script>
    $(document).ready(function() {
        // Initialize Select2 on the city select input
        $('#city').select2({
            placeholder: "اختر المدينة",
            allowClear: true // Optional: Adds a clear button to reset the selection
        });
    });
</script> --}}
