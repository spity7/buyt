<hr>

<div>
    <ul class="account-bottom__ul list-group">
        <li class="list-group-item account-bottom__li">
            <a href="{{ route('housings.index') }}">
                <span class="text-secondary">السكن المضاف</span>
                <i class="text-secondary fa fa-chevron-left"></i>
            </a>
        </li>
        <hr>
        @can('manage users')
            <li class="list-group-item account-bottom__li">
                <a href="{{ route('associations.index') }}">
                    <span class="text-secondary">الجمعيات</span>
                    <i class="text-secondary fa fa-chevron-left"></i>
                </a>
            </li>
            <hr>
        @endcan
        @can('manage users')
            <li class="list-group-item account-bottom__li">
                <a href="{{ route('pending_housings') }}">
                    <span class="text-secondary">الطلبات المعلقة</span>
                    <i class="text-secondary fa fa-chevron-left"></i>
                </a>
            </li>
            <hr>
        @endcan
        @can('manage users')
            <li class="list-group-item account-bottom__li">
                <a href="{{ route('users.index') }}">
                    <span class="text-secondary">الحسابات</span>
                    <i class="text-secondary fa fa-chevron-left"></i>
                </a>
            </li>
            <hr>
        @endcan
        <li class="list-group-item account-bottom__li">
            <a href="{{ route('users.edit', auth()->user()) }}">
                <span class="text-secondary">نعديل الحساب</span>
                <i class="text-secondary fa fa-chevron-left"></i>
            </a>
        </li>
        <hr>
        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are your sure?');">
            @csrf
            <button class="btn btn-danger">تسجيل الخروج</button>
        </form>
    </ul>
</div>
