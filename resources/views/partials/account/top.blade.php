@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="account-top">

    <div>
        <img src="https://dev.buytfinder.com/assets/images/profile-photo.png" alt="logo" width="50">
    </div>
    <div class="account-top__left">
        <h5>{{ auth()->user()->getFullNameAttribute() }}</h5>
        <p>{{ auth()->user()->email }}</p>
    </div>
</div>
