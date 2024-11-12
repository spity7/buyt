<hr>

<div class="assoc-middle">
    <a href="{{ route('housings_page') }}" class="btn houses-btn {{ Route::is('housings_page') ? 'active' : '' }}">سكن</a>
    <a href="{{ route('associations_page') }}"
        class="btn associations-btn {{ Route::is('associations_page') ? 'active' : '' }}">جمعيات</a>
    <a href="{{ route('centers_page') }}"
        class="btn centers-btn {{ Route::is('centers_page') ? 'active' : '' }}">مراكز</a>
</div>
