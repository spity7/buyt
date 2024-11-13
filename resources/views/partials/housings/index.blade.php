<div class="assoc-housing__bottom py-4">
    @if (!$housings->count())
        <h2 class="text-danger fw-bold">لا يوجد سكن خاص بك</h2>
    @else
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <h2 class="text-primary fw-bold">:السكن</h2>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <form action="{{ route('housings.index') }}" method="GET">
                        <div class="form-group">
                            <label for="pending" class="col-form-label w-100 text-end fs-5">الحالة:</label>
                            <select class="form-control border border-dark fs-6 fw-bold" name="pending" id="pending"
                                onchange="this.form.submit()">
                                <option value="all" {{ request('pending') == 'all' ? 'selected' : '' }}>الكل</option>
                                <option value="accepted" {{ request('pending') == 'accepted' ? 'selected' : '' }}>مقبول
                                </option>
                                <option value="pending" {{ request('pending') == 'pending' ? 'selected' : '' }}>قيد
                                    الانتظار</option>
                                <option value="rejected" {{ request('pending') == 'rejected' ? 'selected' : '' }}>مرفوض
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
                <hr>
                @if ($pending == 'all')
                    <div class="py-4">
                        @foreach ($housings as $housing)
                            <div class="assoc-housing__option">
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
                                        {{ $housing->city->name }}
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                                <div class="assoc-housing__option-bottom">
                                    <div class="assoc__nb-rooms">
                                        {{ $housing->nb_rooms }} :غرف
                                    </div>
                                    <div class="assoc__bottom-left">
                                        <form action="{{ route('housings.destroy', $housing) }}" method="POST"
                                            style="display: inline" onsubmit="return confirm('Are your sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                        <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $housing->id }}">...المزيد</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $housing->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $housing->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header">
                                                        <button type="button"
                                                            class="close btn text-secondary modal-close-btn"
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
                                                                    <span
                                                                        class="text-danger">{{ $housing->price }}$</span>
                                                                @else
                                                                    <span class="text-secondary">مجانا</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="assoc-housing__option-middle">
                                                            <div>
                                                                {{ $housing->city->name }}
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="assoc-housing__option-bottom">
                                                            <div class="assoc__nb-rooms">
                                                                {{ $housing->nb_rooms }} :غرف
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="description"
                                                        style="text-align: right; padding-top: 10px;">
                                                        <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن
                                                            الشقة
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
                        <div class="py-2">
                            {{ $housings->links() }}
                        </div>
                    </div>
                @endif
                @if ($pending == 'pending')
                    <div class="py-4">
                        @foreach ($pending_housings as $pending_housing)
                            <div class="assoc-housing__option">
                                <div class="assoc-housing__option-top">
                                    <div>
                                        <span class="option-title">{{ $pending_housing->name }}</span>
                                    </div>
                                    <div>
                                        @if ($pending_housing->furnishing_status == 'مفروش')
                                            <span
                                                class="furnitured-badge text-success">{{ $pending_housing->furnishing_status }}</span>
                                        @else
                                            <span
                                                class="furnitured-badge text-danger">{{ $pending_housing->furnishing_status }}</span>
                                        @endif
                                    </div>
                                    <div class="text-danger assoc-price">
                                        @if ($pending_housing->price)
                                            <span class="text-danger">{{ $pending_housing->price }}$</span>
                                        @else
                                            <span class="text-secondary">مجانا</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="assoc-housing__option-middle">
                                    <div>
                                        {{ $pending_housing->city->name }}
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                                <div class="assoc-housing__option-bottom">
                                    <div class="assoc__nb-rooms">
                                        {{ $pending_housing->nb_rooms }} :غرف
                                    </div>
                                    <div class="assoc__bottom-left">
                                        <form action="{{ route('housings.destroy', $pending_housing) }}"
                                            method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                        <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $pending_housing->id }}">...المزيد</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $pending_housing->id }}"
                                            tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $pending_housing->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header">
                                                        <button type="button"
                                                            class="close btn text-secondary modal-close-btn"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="fs-1">×</span>
                                                        </button>
                                                        <div class="col-md-8" align="right">
                                                            <h5 class="modal-title" id="myModalLabel">تفاصيل السكن
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="assoc-housing__option modal-housing__option">
                                                        <div class="assoc-housing__option-top">
                                                            <div>
                                                                <span
                                                                    class="option-title">{{ $pending_housing->name }}</span>
                                                            </div>
                                                            <div>
                                                                @if ($pending_housing->furnishing_status == 'مفروش')
                                                                    <span
                                                                        class="furnitured-badge text-success">{{ $pending_housing->furnishing_status }}</span>
                                                                @else
                                                                    <span
                                                                        class="furnitured-badge text-danger">{{ $pending_housing->furnishing_status }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="text-danger assoc-price">
                                                                @if ($pending_housing->price)
                                                                    <span
                                                                        class="text-danger">{{ $pending_housing->price }}$</span>
                                                                @else
                                                                    <span class="text-secondary">مجانا</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="assoc-housing__option-middle">
                                                            <div>
                                                                {{ $pending_housing->city->name }}
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="assoc-housing__option-bottom">
                                                            <div class="assoc__nb-rooms">
                                                                {{ $pending_housing->nb_rooms }} :غرف
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="description"
                                                        style="text-align: right; padding-top: 10px;">
                                                        <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن
                                                            الشقة
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
                        <div class="py-2">
                            {{ $pending_housings->links() }}
                        </div>
                    </div>
                @endif
                @if ($pending == 'accepted')
                    <div class="py-4">
                        @foreach ($accepted_housings as $accepted_housing)
                            <div class="assoc-housing__option">
                                <div class="assoc-housing__option-top">
                                    <div>
                                        <span class="option-title">{{ $accepted_housing->name }}</span>
                                    </div>
                                    <div>
                                        @if ($accepted_housing->furnishing_status == 'مفروش')
                                            <span
                                                class="furnitured-badge text-success">{{ $accepted_housing->furnishing_status }}</span>
                                        @else
                                            <span
                                                class="furnitured-badge text-danger">{{ $accepted_housing->furnishing_status }}</span>
                                        @endif
                                    </div>
                                    <div class="text-danger assoc-price">
                                        @if ($accepted_housing->price)
                                            <span class="text-danger">{{ $accepted_housing->price }}$</span>
                                        @else
                                            <span class="text-secondary">مجانا</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="assoc-housing__option-middle">
                                    <div>
                                        {{ $accepted_housing->city->name }}
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                                <div class="assoc-housing__option-bottom">
                                    <div class="assoc__nb-rooms">
                                        {{ $accepted_housing->nb_rooms }} :غرف
                                    </div>
                                    <div class="assoc__bottom-left">
                                        <form action="{{ route('housings.destroy', $accepted_housing) }}"
                                            method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                        <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $accepted_housing->id }}">...المزيد</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $accepted_housing->id }}"
                                            tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $accepted_housing->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header">
                                                        <button type="button"
                                                            class="close btn text-secondary modal-close-btn"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="fs-1">×</span>
                                                        </button>
                                                        <div class="col-md-8" align="right">
                                                            <h5 class="modal-title" id="myModalLabel">تفاصيل السكن
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="assoc-housing__option modal-housing__option">
                                                        <div class="assoc-housing__option-top">
                                                            <div>
                                                                <span
                                                                    class="option-title">{{ $accepted_housing->name }}</span>
                                                            </div>
                                                            <div>
                                                                @if ($accepted_housing->furnishing_status == 'مفروش')
                                                                    <span
                                                                        class="furnitured-badge text-success">{{ $accepted_housing->furnishing_status }}</span>
                                                                @else
                                                                    <span
                                                                        class="furnitured-badge text-danger">{{ $accepted_housing->furnishing_status }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="text-danger assoc-price">
                                                                @if ($accepted_housing->price)
                                                                    <span
                                                                        class="text-danger">{{ $accepted_housing->price }}$</span>
                                                                @else
                                                                    <span class="text-secondary">مجانا</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="assoc-housing__option-middle">
                                                            <div>
                                                                {{ $accepted_housing->city->name }}
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="assoc-housing__option-bottom">
                                                            <div class="assoc__nb-rooms">
                                                                {{ $accepted_housing->nb_rooms }} :غرف
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="description"
                                                        style="text-align: right; padding-top: 10px;">
                                                        <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن
                                                            الشقة
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
                        <div class="py-2">
                            {{ $accepted_housings->links() }}
                        </div>
                    </div>
                @endif
                @if ($pending == 'rejected')
                    <div class="py-4">
                        @foreach ($rejected_housings as $rejected_housing)
                            <div class="assoc-housing__option">
                                <div class="assoc-housing__option-top">
                                    <div>
                                        <span class="option-title">{{ $rejected_housing->name }}</span>
                                    </div>
                                    <div>
                                        @if ($rejected_housing->furnishing_status == 'مفروش')
                                            <span
                                                class="furnitured-badge text-success">{{ $rejected_housing->furnishing_status }}</span>
                                        @else
                                            <span
                                                class="furnitured-badge text-danger">{{ $rejected_housing->furnishing_status }}</span>
                                        @endif
                                    </div>
                                    <div class="text-danger assoc-price">
                                        @if ($rejected_housing->price)
                                            <span class="text-danger">{{ $rejected_housing->price }}$</span>
                                        @else
                                            <span class="text-secondary">مجانا</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="assoc-housing__option-middle">
                                    <div>
                                        {{ $rejected_housing->city->name }}
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                                <div class="assoc-housing__option-bottom">
                                    <div class="assoc__nb-rooms">
                                        {{ $rejected_housing->nb_rooms }} :غرف
                                    </div>
                                    <div class="assoc__bottom-left">
                                        <form action="{{ route('housings.destroy', $rejected_housing) }}"
                                            method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                        <a href="" class="assoc__more-details" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $rejected_housing->id }}">...المزيد</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $rejected_housing->id }}"
                                            tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $rejected_housing->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header">
                                                        <button type="button"
                                                            class="close btn text-secondary modal-close-btn"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="fs-1">×</span>
                                                        </button>
                                                        <div class="col-md-8" align="right">
                                                            <h5 class="modal-title" id="myModalLabel">تفاصيل السكن
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="assoc-housing__option modal-housing__option">
                                                        <div class="assoc-housing__option-top">
                                                            <div>
                                                                <span
                                                                    class="option-title">{{ $rejected_housing->name }}</span>
                                                            </div>
                                                            <div>
                                                                @if ($rejected_housing->furnishing_status == 'مفروش')
                                                                    <span
                                                                        class="furnitured-badge text-success">{{ $rejected_housing->furnishing_status }}</span>
                                                                @else
                                                                    <span
                                                                        class="furnitured-badge text-danger">{{ $rejected_housing->furnishing_status }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="text-danger assoc-price">
                                                                @if ($rejected_housing->price)
                                                                    <span
                                                                        class="text-danger">{{ $rejected_housing->price }}$</span>
                                                                @else
                                                                    <span class="text-secondary">مجانا</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="assoc-housing__option-middle">
                                                            <div>
                                                                {{ $rejected_housing->city->name }}
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="assoc-housing__option-bottom">
                                                            <div class="assoc__nb-rooms">
                                                                {{ $rejected_housing->nb_rooms }} :غرف
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="description"
                                                        style="text-align: right; padding-top: 10px;">
                                                        <h2 class="text-secondary" style="font-size: 18px;">تفاصيل عن
                                                            الشقة
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
                        <div class="py-2">
                            {{ $rejected_housings->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
