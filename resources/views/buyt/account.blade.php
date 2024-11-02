@extends('app')

@section('title')
    Account
@endsection

@section('content')
    <div class="account-container">
        @include('partials.account.top')
        @include('partials.account.bottom')
    </div>
@endsection
