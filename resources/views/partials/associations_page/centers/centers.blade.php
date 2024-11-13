@if (!$governorate)
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('centers_page') }}" method="GET">
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
            @foreach ($centers as $center)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $center->name }}</span>
                        </div>
                        <div>
                            @if ($center->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $center->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $center->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($center->price)
                                <span class="text-danger">{{ $center->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $center->city->name }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $center->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $center->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $center->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $center->id }}" aria-hidden="true">
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
                                                    <span class="option-title">{{ $center->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($center->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $center->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $center->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($center->price)
                                                        <span class="text-danger">{{ $center->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $center->city->name }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $center->nb_rooms }} :غرف
                                                </div>
                                                <div class="assoc__bottom-left">
                                                    <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
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
        {{ $centers->links() }}
    </div>
@endif
@if ($governorate === 'بيروت')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('centers_page') }}" method="GET">
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
            @foreach ($centers1 as $center1)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $center1->name }}</span>
                        </div>
                        <div>
                            @if ($center1->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $center1->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $center1->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($center1->price)
                                <span class="text-danger">{{ $center1->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $center1->city->name }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $center1->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $center1->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $center1->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $center1->id }}" aria-hidden="true">
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
                                                    <span class="option-title">{{ $center1->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($center1->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $center1->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $center1->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($center1->price)
                                                        <span class="text-danger">{{ $center1->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $center1->city->name }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $center1->nb_rooms }} :غرف
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
        {{ $centers1->links() }}
    </div>
@endif
@if ($governorate === 'جبل لبنان')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('centers_page') }}" method="GET">
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
            @foreach ($centers2 as $center2)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $center2->name }}</span>
                        </div>
                        <div>
                            @if ($center2->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $center2->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $center2->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($center2->price)
                                <span class="text-danger">{{ $center2->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $center2->city->name }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $center2->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $center2->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $center2->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $center2->id }}" aria-hidden="true">
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
                                                    <span class="option-title">{{ $center2->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($center2->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $center2->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $center2->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($center2->price)
                                                        <span class="text-danger">{{ $center2->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $center2->city->name }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $center2->nb_rooms }} :غرف
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
        {{ $centers2->links() }}
    </div>
@endif
@if ($governorate === 'الجنوب')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('centers_page') }}" method="GET">
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
            @foreach ($centers3 as $center3)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $center3->name }}</span>
                        </div>
                        <div>
                            @if ($center3->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $center3->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $center3->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($center3->price)
                                <span class="text-danger">{{ $center3->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $center3->city->name }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $center3->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $center3->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $center3->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $center3->id }}" aria-hidden="true">
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
                                                    <span class="option-title">{{ $center3->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($center3->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $center3->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $center3->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($center3->price)
                                                        <span class="text-danger">{{ $center3->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $center3->city->name }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $center3->nb_rooms }} :غرف
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
        {{ $centers3->links() }}
    </div>
@endif
@if ($governorate === 'النبطية')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('centers_page') }}" method="GET">
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
            @foreach ($centers4 as $center4)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $center4->name }}</span>
                        </div>
                        <div>
                            @if ($center4->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $center4->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $center4->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($center4->price)
                                <span class="text-danger">{{ $center4->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $center4->city->name }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $center4->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $center4->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $center4->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $center4->id }}" aria-hidden="true">
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
                                                    <span class="option-title">{{ $center4->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($center4->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $center4->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $center4->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($center4->price)
                                                        <span class="text-danger">{{ $center4->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $center4->city->name }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $center4->nb_rooms }} :غرف
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
        {{ $centers4->links() }}
    </div>
@endif
@if ($governorate === 'البقاع')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('centers_page') }}" method="GET">
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
            @foreach ($centers5 as $center5)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $center5->name }}</span>
                        </div>
                        <div>
                            @if ($center5->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $center5->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $center5->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($center5->price)
                                <span class="text-danger">{{ $center5->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $center5->city->name }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $center5->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $center5->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $center5->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $center5->id }}" aria-hidden="true">
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
                                                    <span class="option-title">{{ $center5->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($center5->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $center5->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $center5->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($center5->price)
                                                        <span class="text-danger">{{ $center5->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $center5->city->name }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $center5->nb_rooms }} :غرف
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
        {{ $centers5->links() }}
    </div>
@endif
@if ($governorate === 'الشما')
    <div class="assoc-housing">
        <div class="text-secondary assoc-housing__top">
            <form action="{{ route('centers_page') }}" method="GET">
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
            @foreach ($centers6 as $center6)
                <div class="assoc-housing__option">
                    <div class="assoc-housing__option-top">
                        <div>
                            <span class="option-title">{{ $center6->name }}</span>
                        </div>
                        <div>
                            @if ($center6->furnishing_status == 'مفروش')
                                <span class="furnitured-badge text-success">{{ $center6->furnishing_status }}</span>
                            @else
                                <span class="furnitured-badge text-danger">{{ $center6->furnishing_status }}</span>
                            @endif
                        </div>
                        <div class="text-danger assoc-price">
                            @if ($center6->price)
                                <span class="text-danger">{{ $center6->price }}$</span>
                            @else
                                <span class="text-secondary">مجانا</span>
                            @endif
                        </div>
                    </div>
                    <div class="assoc-housing__option-middle">
                        <div>
                            {{ $center6->city->name }}
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="assoc-housing__option-bottom">
                        <div class="assoc__nb-rooms">
                            {{ $center6->nb_rooms }} :غرف
                        </div>
                        <div class="assoc__bottom-left">
                            <a href="tel:+96171601751" target="_blank" class="btn assoc__call">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+96171601751" target="_blank" class="btn assoc__whats">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $center6->id }}">...المزيد</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $center6->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $center6->id }}" aria-hidden="true">
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
                                                    <span class="option-title">{{ $center6->name }}</span>
                                                </div>
                                                <div>
                                                    @if ($center6->furnishing_status == 'مفروش')
                                                        <span
                                                            class="furnitured-badge text-success">{{ $center6->furnishing_status }}</span>
                                                    @else
                                                        <span
                                                            class="furnitured-badge text-danger">{{ $center6->furnishing_status }}</span>
                                                    @endif
                                                </div>
                                                <div class="text-danger assoc-price">
                                                    @if ($center6->price)
                                                        <span class="text-danger">{{ $center6->price }}$</span>
                                                    @else
                                                        <span class="text-secondary">مجانا</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-middle">
                                                <div>
                                                    {{ $center6->city->name }}
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="assoc-housing__option-bottom">
                                                <div class="assoc__nb-rooms">
                                                    {{ $center6->nb_rooms }} :غرف
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
        {{ $centers6->links() }}
    </div>
@endif
