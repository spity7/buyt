<div class="pending-housings_heading">: الطلبات المعلقة</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<hr>

<div class="container">
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
                            <span class="text-danger">{{ $housing->price }}</span>
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
                        <form action="{{ route('accept_pending', $housing) }}" method="POST" style="display: inline">
                            @csrf
                            @method('PUT')
                            <input type="submit" class="btn assoc__call pending-housings_accept" value="accept">
                        </form>
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
                                                    <span class="text-danger">{{ $housing->price }}</span>
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
        <button class="btn assoc-housing__bottom-button">اظهار المزيد</button>
    </div>
</div>
