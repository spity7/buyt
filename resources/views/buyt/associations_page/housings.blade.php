@extends('app')

@section('title')
    جمعيات
@endsection

@section('content')
    <div class="assoc-container">
        @include('partials.associations_page.housings.top')
        @include('partials.associations_page.housings.middle')
        @include('partials.associations_page.housings.housings')
    </div>
@endsection
