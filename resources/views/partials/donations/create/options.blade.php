<div class="donation-options__top">
    <hr>
    <span>او تواصل مباشرة مع جمعيات</span>
    <hr>
</div>

<div class="donation-options__bottom">
    @foreach ($associations as $association)
        <div class="donation-option__bottom-option">
            <div class="donation-option__left">
                <div class="donation-option__left-top">
                    <span id="organization-name">{{ $association->title }}</span>
                </div>
                <div class="donation-option__left-bottom">
                    <div class="don-right">
                        <span class="text-secondary" id="organization-type">{{ $association->category }}</span>
                        <span id="organization-address">
                            {{ $association->location }}
                            <i class="fa fa-map-marker mr-2 text-secondary"></i>
                        </span>
                    </div>
                    <div class="don-left">
                        <a class="insta"
                            href="https://www.instagram.com/https://www.instagram.com/banin.lb/?__pwa=1%2F"
                            target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="https://buy.stripe.com/3csaHib8p4eugp2cMR?fbclid=IwZXh0bgNhZW0CMTEAAR2Nc8tky31bPW4ee4CcQvwe-LLhJSddRcY9OGcu57ZW8ZqvtrxY1Ei83Sw_aem_432eM6jW31MsfUwMOEZgGQ"
                            class="donate" target="_blank">تبرع</a>
                    </div>
                </div>
            </div>
            <div class="donation-option__right">
                <img src="https://dev.buytfinder.com/assets/images/logo.png" alt="">
            </div>
        </div>
    @endforeach
</div>
