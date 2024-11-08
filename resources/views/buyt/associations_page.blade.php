@extends('app')

@section('title')
    جمعيات
@endsection

@section('content')
    <div class="assoc-container">
        @include('partials.associations_page.top')
        @include('partials.associations_page.middle')
        @include('partials.associations_page.housings')
        @include('partials.associations_page.associations')
        @include('partials.associations_page.centers')
    </div>
@endsection
