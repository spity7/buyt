<footer class="fixed-bottom">
    <div class="bottom-nav-buttons">
        <a href="{{ route('account') }}" class="bottom-btns {{ Route::is('account') ? 'active' : '' }}"
            aria-label="My account">
            <svg xmlns="http://www.w3.org/2000/svg" width="15.84" height="19.87" viewBox="0 0 15.84 19.87">
                <g transform="translate(0.75 0.714)" style="isolation: isolate">
                    <path id="Stroke_1" data-name="Stroke 1"
                        d="M7.17-.75a16.978,16.978,0,0,1,5.284.636C14.633.627,15.09,1.96,15.09,2.948S14.631,5.266,12.444,6a17.178,17.178,0,0,1-5.274.624,16.988,16.988,0,0,1-5.285-.636C-.293,5.248-.75,3.915-.75,2.927S-.291.607,1.9-.126A17.187,17.187,0,0,1,7.17-.75Zm0,5.874c4.26,0,6.42-.732,6.42-2.177,0-.468-.168-1.148-1.618-1.642A15.842,15.842,0,0,0,7.17.75C2.91.75.75,1.482.75,2.927c0,.469.168,1.149,1.618,1.642A15.852,15.852,0,0,0,7.17,5.124Z"
                        transform="translate(0 12.532)" fill="currentColor"></path>
                    <path id="Stroke_3" data-name="Stroke 3"
                        d="M4.6-.714a5.31,5.31,0,0,1,0,10.62H4.564A5.295,5.295,0,0,1-.714,4.593,5.315,5.315,0,0,1,4.6-.714Zm-.03,9.191H4.6A3.881,3.881,0,1,0,.714,4.6,3.866,3.866,0,0,0,4.566,8.477Z"
                        transform="translate(2.574 0)" fill="currentColor"></path>
                </g>
            </svg>
            <br>
            @auth
                <span>{{ auth()->user()->first_name }}</span>
            @endauth
            @guest
                <span>حسابي</span>
            @endguest
        </a>
        <a href="{{ route('associations_page') }}"
            class="bottom-btns {{ Route::is('associations_page') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24.671" height="19.026" viewBox="0 0 24.671 19.026">
                <g id="Iconly_Light_3_User" data-name="Iconly/Light/3 User" transform="translate(-1 -3.5)"
                    style="isolation: isolate">
                    <g id="_3_User" data-name="3 User" transform="translate(1 3.5)" style="isolation: isolate">
                        <path id="Stroke_1" data-name="Stroke 1"
                            d="M.1,7.383A.85.85,0,0,1-.018,5.691a2.418,2.418,0,0,0,2.07-2.379A2.4,2.4,0,0,0,.037.939.85.85,0,1,1,.312-.739,4.09,4.09,0,0,1,3.751,3.313,4.126,4.126,0,0,1,.218,7.374.858.858,0,0,1,.1,7.383Z"
                            transform="translate(19.036 1.849)" fill="currentColor"></path>
                        <path id="Stroke_3" data-name="Stroke 3"
                            d="M1.383,4.384a.85.85,0,0,1-.3-1.644c.77-.294.77-.616.77-.771,0-.5-.631-.843-1.875-1.029A.85.85,0,1,1,.226-.741,5.5,5.5,0,0,1,2.44,0,2.288,2.288,0,0,1,3.549,1.97,2.467,2.467,0,0,1,1.686,4.328.848.848,0,0,1,1.383,4.384Z"
                            transform="translate(21.122 12.082)" fill="currentColor"></path>
                        <path id="Stroke_5" data-name="Stroke 5"
                            d="M6.852-.75a16.129,16.129,0,0,1,5.022.606C14.006.58,14.453,1.9,14.453,2.875S14,5.168,11.863,5.883a16.359,16.359,0,0,1-5.011.593,16.165,16.165,0,0,1-5.022-.6C-.3,5.149-.75,3.832-.75,2.856S-.3.563,1.84-.154A16.31,16.31,0,0,1,6.852-.75Zm0,5.526a14.818,14.818,0,0,0,4.472-.5c1.43-.478,1.43-1.122,1.43-1.4,0-.253,0-.925-1.426-1.41A14.8,14.8,0,0,0,6.852.95a14.983,14.983,0,0,0-4.472.507C.95,1.937.95,2.581.95,2.856c0,.252,0,.923,1.426,1.406A14.834,14.834,0,0,0,6.852,4.776Z"
                            transform="translate(5.484 12.55)" fill="currentColor"></path>
                        <path id="Stroke_7" data-name="Stroke 7"
                            d="M4.427-.75a5.177,5.177,0,0,1,0,10.355H4.4A5.16,5.16,0,0,1-.75,4.424,5.182,5.182,0,0,1,4.427-.75Zm0,8.655A3.478,3.478,0,1,0,.95,4.427,3.46,3.46,0,0,0,4.4,7.9Z"
                            transform="translate(7.909 0.75)" fill="currentColor"></path>
                        <path id="Stroke_9" data-name="Stroke 9"
                            d="M2.9,7.383a.857.857,0,0,1-.119-.008A4.1,4.1,0,0,1,2.689-.739.85.85,0,1,1,2.964.939a2.4,2.4,0,0,0,.055,4.753A.85.85,0,0,1,2.9,7.383Z"
                            transform="translate(2.634 1.849)" fill="currentColor"></path>
                        <path id="Stroke_11" data-name="Stroke 11"
                            d="M1.416,4.384a.848.848,0,0,1-.3-.056A2.467,2.467,0,0,1-.75,1.97,2.288,2.288,0,0,1,.359,0,5.5,5.5,0,0,1,2.574-.741.85.85,0,1,1,2.825.94C1.581,1.126.95,1.473.95,1.97c0,.155,0,.477.77.771a.85.85,0,0,1-.3,1.644Z"
                            transform="translate(0.75 12.082)" fill="currentColor"></path>
                    </g>
                </g>
            </svg>
            <br>
            <span>جمعيات</span>
        </a>
        <a href="{{ route('donations.create') }}"
            class="bottom-btns bottom-donation-btn {{ Route::is('donations.create') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="25.926" height="18.321" viewBox="0 0 25.926 18.321">
                <g id="Group_13" data-name="Group 13" transform="translate(-143.964 -2155.671)">
                    <path id="Path_1539" data-name="Path 1539"
                        d="M287.286,151.957a.864.864,0,1,0,.864.864A.865.865,0,0,0,287.286,151.957Zm0,0"
                        transform="translate(-128.631 2016.85)" fill="currentColor"></path>
                    <path id="Path_1542" data-name="Path 1542"
                        d="M129.057,18.321H149.8a2.6,2.6,0,0,0,2.593-2.593V2.592A2.6,2.6,0,0,0,149.8,0H129.057a2.6,2.6,0,0,0-2.593,2.593V15.728A2.6,2.6,0,0,0,129.057,18.321ZM150.662,6.913H128.193V5.185h22.469Zm-.864,9.679H129.057a.865.865,0,0,1-.864-.864V8.642h22.469v7.086A.865.865,0,0,1,149.8,16.593ZM129.057,1.728H149.8a.865.865,0,0,1,.864.864v.864H128.193V2.592A.865.865,0,0,1,129.057,1.728Zm0,0"
                        transform="translate(17.499 2155.671)" fill="currentColor"></path>
                    <path id="Path_1543" data-name="Path 1543"
                        d="M330.731,151.957h-3.457a.864.864,0,0,0,0,1.729h3.457a.864.864,0,1,0,0-1.729Zm0,0"
                        transform="translate(-165.163 2016.85)" fill="currentColor"></path>
                </g>
            </svg>
            <br>
            <span>تبرعات</span>
        </a>
        <a href="{{ route('housings.create') }}" class="bottom-btns {{ Route::is('housings.create') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <path id="Path_505" data-name="Path 505"
                    d="M13,7H11v4H7v2h4v4h2V13h4V11H13ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.011,8.011,0,0,1,12,20Z"
                    transform="translate(-2 -2)" fill="currentColor"></path>
            </svg>
            <br>
            <span>إضافة سكن</span>
        </a>
        <a href="{{ route('main') }}" class="bottom-btns {{ Route::is('main') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.378" height="17.61" viewBox="0 0 17.378 17.61">
                <g id="Group_10" data-name="Group 10" transform="translate(-1662.252 -4427.22)">
                    <path id="Path_2" data-name="Path 2"
                        d="M1677.045,4444.831H1664.1a1.853,1.853,0,0,1-1.853-1.854v-7.4a1.841,1.841,0,0,1,.543-1.31l6.509-6.509a1.853,1.853,0,0,1,2.628.008l6.431,6.506a1.843,1.843,0,0,1,.535,1.3v7.4A1.853,1.853,0,0,1,1677.045,4444.831Zm-12.025-2.354h11.11a.414.414,0,0,0,.414-.414v-6.106a.413.413,0,0,0-.12-.291l-5.52-5.585a.415.415,0,0,0-.587,0l-5.59,5.591a.413.413,0,0,0-.121.292v6.1A.414.414,0,0,0,1665.02,4442.477Z"
                        transform="translate(0 0)" fill="currentColor"></path>
                    <path id="Path_3" data-name="Path 3"
                        d="M1776.224,4501.886a1.172,1.172,0,0,1-.832-.345l-2.713-2.712a.445.445,0,0,1,0-.628l1.037-1.036a.444.444,0,0,1,.628,0l1.566,1.566a.443.443,0,0,0,.628,0l6.975-6.975a.444.444,0,0,1,.628,0l1.036,1.037a.444.444,0,0,1,0,.628l-8.121,8.121A1.173,1.173,0,0,1,1776.224,4501.886Z"
                        transform="translate(-105.677 -61.708)" fill="currentColor"></path>
                </g>
            </svg>
            <br>
            <span>الرئيسية</span>
        </a>
    </div>
</footer>
