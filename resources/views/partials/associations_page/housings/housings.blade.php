@if (!$governorate)
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('housings_page') }}" method="GET">
                <select name="house-governorates" id="house-governorates" class="form-control text-secondary"
                    onchange="this.form.submit()">
                    <option value="" selected="">المحافظة</option>
                    @foreach (App\Models\Housing::GOVERNORATES as $governorate)
                        <option value="{{ $governorate }}"
                            {{ request('house-governorates') == $governorate ? 'selected' : '' }}>
                            {{ ucfirst($governorate) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="assoc-housing__bottom">
            @foreach ($housings as $housing)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $housing->name }}</span>
                        </div>
                        <div>
                            @if ($housing->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $housing->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $housing->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($housing->price)
                                <span class="text-danger">{{ $housing->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $housing->city }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $housing->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $housing->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $housing->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $housing->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <button type="button" class="close btn text-secondary modal-close-btn"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="fs-1">×</span>
                                            </button>
                                            <div class="col-md-8" align="right">
                                                <h5 class="modal-title" id="myModalLabel">تفاصيل السكن</h5>
                                            </div>
                                        </div>
                                        <div class="assoc-housing__option modal-housing__option">
                                            <div class="assoc-housing__option-top">
                                                <div>
                                                    <span class="option-title">{{ $housing->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($housing->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $housing->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $housing->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($housing->price)
                                                        <span class="text-danger">{{ $housing->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $housing->city }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $housing->nb_rooms }} :غرف
                                                </div>
                                                <div class="assoc__bottom-left">
                                                    <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                    <a href="https://wa.me/+96171601751" target="_blank"
                                                        class="btn assoc__whats">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                    <a href="#"
                                                        onclick="shareHousing('{{ $housing->name }}', '{{ $housing->city }}', '{{ $housing->description }}')"
                                                        class="btn assoc__call">
                                                        <i class="fa fa-share-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description" style="text-align: right; padding-top: 10px;">
                                            <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن الشقة</h2>
                                            <p id="description" class="px-3"
                                                style="font-size: medium; word-break: break-word; max-height: 200px; overflow-y: scroll;">
                                                test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $housings->links() }}
    </div>
@endif
@if ($governorate === 'بيروت')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('housings_page') }}" method="GET">
                <select name="house-governorates" id="house-governorates" class="form-control text-secondary"
                    onchange="this.form.submit()">
                    <option value="" selected="">المحافظة</option>
                    @foreach (App\Models\Housing::GOVERNORATES as $governorate)
                        <option value="{{ $governorate }}"
                            {{ request('house-governorates') == $governorate ? 'selected' : '' }}>
                            {{ ucfirst($governorate) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="assoc-housing__bottom">
            @foreach ($housings1 as $housing1)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $housing1->name }}</span>
                        </div>
                        <div>
                            @if ($housing1->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $housing1->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $housing1->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($housing1->price)
                                <span class="text-danger">{{ $housing1->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $housing1->city }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $housing1->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $housing1->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $housing1->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $housing1->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <button type="button" class="close btn text-secondary modal-close-btn"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="fs-1">×</span>
                                            </button>
                                            <div class="col-md-8" align="right">
                                                <h5 class="modal-title" id="myModalLabel">تفاصيل السكن</h5>
                                            </div>
                                        </div>
                                        <div class="assoc-housing__option modal-housing__option">
                                            <div class="assoc-housing__option-top">
                                                <div>
                                                    <span class="option-title">{{ $housing1->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($housing1->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $housing1->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $housing1->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($housing1->price)
                                                        <span class="text-danger">{{ $housing1->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $housing1->city }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $housing1->nb_rooms }} :غرف
                                                </div>
                                                <div class="assoc__bottom-left">
                                                    <a href="tel:+96171601751" target="_blank"
                                                        class="btn assoc__call">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                    <a href="https://wa.me/+96171601751" target="_blank"
                                                        class="btn assoc__whats">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description" style="text-align: right; padding-top: 10px;">
                                            <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن الشقة
                                            </h2>
                                            <p id="description" class="px-3"
                                                style="font-size: medium; word-break: break-word; max-height: 200px; overflow-y: scroll;">
                                                test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $housings1->links() }}
    </div>
@endif
@if ($governorate === 'جبل لبنان')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('housings_page') }}" method="GET">
                <select name="house-governorates" id="house-governorates" class="form-control text-secondary"
                    onchange="this.form.submit()">
                    <option value="" selected="">المحافظة</option>
                    @foreach (App\Models\Housing::GOVERNORATES as $governorate)
                        <option value="{{ $governorate }}"
                            {{ request('house-governorates') == $governorate ? 'selected' : '' }}>
                            {{ ucfirst($governorate) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="assoc-housing__bottom">
            @foreach ($housings2 as $housing2)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $housing2->name }}</span>
                        </div>
                        <div>
                            @if ($housing2->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $housing2->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $housing2->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($housing2->price)
                                <span class="text-danger">{{ $housing2->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $housing2->city }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $housing2->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $housing2->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $housing2->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $housing2->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <button type="button" class="close btn text-secondary modal-close-btn"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="fs-1">×</span>
                                            </button>
                                            <div class="col-md-8" align="right">
                                                <h5 class="modal-title" id="myModalLabel">تفاصيل السكن</h5>
                                            </div>
                                        </div>
                                        <div class="assoc-housing__option modal-housing__option">
                                            <div class="assoc-housing__option-top">
                                                <div>
                                                    <span class="option-title">{{ $housing2->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($housing2->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $housing2->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $housing2->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($housing2->price)
                                                        <span class="text-danger">{{ $housing2->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $housing2->city }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $housing2->nb_rooms }} :غرف
                                                </div>
                                                <div class="assoc__bottom-left">
                                                    <a href="tel:+96171601751" target="_blank"
                                                        class="btn assoc__call">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                    <a href="https://wa.me/+96171601751" target="_blank"
                                                        class="btn assoc__whats">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description" style="text-align: right; padding-top: 10px;">
                                            <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن الشقة
                                            </h2>
                                            <p id="description" class="px-3"
                                                style="font-size: medium; word-break: break-word; max-height: 200px; overflow-y: scroll;">
                                                test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $housings2->links() }}
    </div>
@endif
@if ($governorate === 'الجنوب')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('housings_page') }}" method="GET">
                <select name="house-governorates" id="house-governorates" class="form-control text-secondary"
                    onchange="this.form.submit()">
                    <option value="" selected="">المحافظة</option>
                    @foreach (App\Models\Housing::GOVERNORATES as $governorate)
                        <option value="{{ $governorate }}"
                            {{ request('house-governorates') == $governorate ? 'selected' : '' }}>
                            {{ ucfirst($governorate) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="assoc-housing__bottom">
            @foreach ($housings3 as $housing3)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $housing3->name }}</span>
                        </div>
                        <div>
                            @if ($housing3->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $housing3->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $housing3->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($housing3->price)
                                <span class="text-danger">{{ $housing3->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $housing3->city }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $housing3->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $housing3->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $housing3->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $housing3->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <button type="button" class="close btn text-secondary modal-close-btn"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="fs-1">×</span>
                                            </button>
                                            <div class="col-md-8" align="right">
                                                <h5 class="modal-title" id="myModalLabel">تفاصيل السكن</h5>
                                            </div>
                                        </div>
                                        <div class="assoc-housing__option modal-housing__option">
                                            <div class="assoc-housing__option-top">
                                                <div>
                                                    <span class="option-title">{{ $housing3->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($housing3->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $housing3->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $housing3->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($housing3->price)
                                                        <span class="text-danger">{{ $housing3->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $housing3->city }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $housing3->nb_rooms }} :غرف
                                                </div>
                                                <div class="assoc__bottom-left">
                                                    <a href="tel:+96171601751" target="_blank"
                                                        class="btn assoc__call">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                    <a href="https://wa.me/+96171601751" target="_blank"
                                                        class="btn assoc__whats">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description" style="text-align: right; padding-top: 10px;">
                                            <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن الشقة
                                            </h2>
                                            <p id="description" class="px-3"
                                                style="font-size: medium; word-break: break-word; max-height: 200px; overflow-y: scroll;">
                                                test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $housings3->links() }}
    </div>
@endif
@if ($governorate === 'النبطية')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('housings_page') }}" method="GET">
                <select name="house-governorates" id="house-governorates" class="form-control text-secondary"
                    onchange="this.form.submit()">
                    <option value="" selected="">المحافظة</option>
                    @foreach (App\Models\Housing::GOVERNORATES as $governorate)
                        <option value="{{ $governorate }}"
                            {{ request('house-governorates') == $governorate ? 'selected' : '' }}>
                            {{ ucfirst($governorate) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="assoc-housing__bottom">
            @foreach ($housings4 as $housing4)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $housing4->name }}</span>
                        </div>
                        <div>
                            @if ($housing4->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $housing4->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $housing4->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($housing4->price)
                                <span class="text-danger">{{ $housing4->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $housing4->city }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $housing4->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $housing4->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $housing4->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $housing4->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <button type="button" class="close btn text-secondary modal-close-btn"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="fs-1">×</span>
                                            </button>
                                            <div class="col-md-8" align="right">
                                                <h5 class="modal-title" id="myModalLabel">تفاصيل السكن</h5>
                                            </div>
                                        </div>
                                        <div class="assoc-housing__option modal-housing__option">
                                            <div class="assoc-housing__option-top">
                                                <div>
                                                    <span class="option-title">{{ $housing4->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($housing4->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $housing4->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $housing4->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($housing4->price)
                                                        <span class="text-danger">{{ $housing4->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $housing4->city }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $housing4->nb_rooms }} :غرف
                                                </div>
                                                <div class="assoc__bottom-left">
                                                    <a href="tel:+96171601751" target="_blank"
                                                        class="btn assoc__call">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                    <a href="https://wa.me/+96171601751" target="_blank"
                                                        class="btn assoc__whats">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description" style="text-align: right; padding-top: 10px;">
                                            <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن الشقة
                                            </h2>
                                            <p id="description" class="px-3"
                                                style="font-size: medium; word-break: break-word; max-height: 200px; overflow-y: scroll;">
                                                test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $housings4->links() }}
    </div>
@endif
@if ($governorate === 'البقاع')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('housings_page') }}" method="GET">
                <select name="house-governorates" id="house-governorates" class="form-control text-secondary"
                    onchange="this.form.submit()">
                    <option value="" selected="">المحافظة</option>
                    @foreach (App\Models\Housing::GOVERNORATES as $governorate)
                        <option value="{{ $governorate }}"
                            {{ request('house-governorates') == $governorate ? 'selected' : '' }}>
                            {{ ucfirst($governorate) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="assoc-housing__bottom">
            @foreach ($housings5 as $housing5)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $housing5->name }}</span>
                        </div>
                        <div>
                            @if ($housing5->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $housing5->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $housing5->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($housing5->price)
                                <span class="text-danger">{{ $housing5->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $housing5->city }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $housing5->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $housing5->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $housing5->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $housing5->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <button type="button" class="close btn text-secondary modal-close-btn"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="fs-1">×</span>
                                            </button>
                                            <div class="col-md-8" align="right">
                                                <h5 class="modal-title" id="myModalLabel">تفاصيل السكن</h5>
                                            </div>
                                        </div>
                                        <div class="assoc-housing__option modal-housing__option">
                                            <div class="assoc-housing__option-top">
                                                <div>
                                                    <span class="option-title">{{ $housing5->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($housing5->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $housing5->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $housing5->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($housing5->price)
                                                        <span class="text-danger">{{ $housing5->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $housing5->city }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $housing5->nb_rooms }} :غرف
                                                </div>
                                                <div class="assoc__bottom-left">
                                                    <a href="tel:+96171601751" target="_blank"
                                                        class="btn assoc__call">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                    <a href="https://wa.me/+96171601751" target="_blank"
                                                        class="btn assoc__whats">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description" style="text-align: right; padding-top: 10px;">
                                            <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن الشقة
                                            </h2>
                                            <p id="description" class="px-3"
                                                style="font-size: medium; word-break: break-word; max-height: 200px; overflow-y: scroll;">
                                                test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $housings5->links() }}
    </div>
@endif
@if ($governorate === 'الشما')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('housings_page') }}" method="GET">
                <select name="house-governorates" id="house-governorates" class="form-control text-secondary"
                    onchange="this.form.submit()">
                    <option value="" selected="">المحافظة</option>
                    @foreach (App\Models\Housing::GOVERNORATES as $governorate)
                        <option value="{{ $governorate }}"
                            {{ request('house-governorates') == $governorate ? 'selected' : '' }}>
                            {{ ucfirst($governorate) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="assoc-housing__bottom">
            @foreach ($housings6 as $housing6)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $housing6->name }}</span>
                        </div>
                        <div>
                            @if ($housing6->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $housing6->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $housing6->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($housing6->price)
                                <span class="text-danger">{{ $housing6->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $housing6->city }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $housing6->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $housing6->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $housing6->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $housing6->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <button type="button" class="close btn text-secondary modal-close-btn"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="fs-1">×</span>
                                            </button>
                                            <div class="col-md-8" align="right">
                                                <h5 class="modal-title" id="myModalLabel">تفاصيل السكن</h5>
                                            </div>
                                        </div>
                                        <div class="assoc-housing__option modal-housing__option">
                                            <div class="assoc-housing__option-top">
                                                <div>
                                                    <span class="option-title">{{ $housing6->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($housing6->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $housing6->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $housing6->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($housing6->price)
                                                        <span class="text-danger">{{ $housing6->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $housing6->city }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $housing6->nb_rooms }} :غرف
                                                </div>
                                                <div class="assoc__bottom-left">
                                                    <a href="tel:+96171601751" target="_blank"
                                                        class="btn assoc__call">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                    <a href="https://wa.me/+96171601751" target="_blank"
                                                        class="btn assoc__whats">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description" style="text-align: right; padding-top: 10px;">
                                            <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن الشقة
                                            </h2>
                                            <p id="description" class="px-3"
                                                style="font-size: medium; word-break: break-word; max-height: 200px; overflow-y: scroll;">
                                                test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $housings6->links() }}
    </div>
@endif

<script>
    function shareHousing(name, city, description) {
        if (navigator.share) {
            navigator.share({
                title: `Check out this housing: ${name}`,
                text: `Located in ${city}. Details: ${description}`,
                url: window.location.href // Optional, current page URL
            }).then(() => {
                console.log('Thanks for sharing!');
            }).catch((error) => {
                console.error('Error sharing:', error);
            });
        } else {
            alert('Sharing is not supported on this browser.');
        }
    }
</script>
