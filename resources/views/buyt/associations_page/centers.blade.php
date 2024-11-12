@extends('app')

@section('title')
    جمعيات
@endsection

@section('content')
    <div class="assoc-container">
        @include('partials.associations_page.centers.top')
        @include('partials.associations_page.centers.middle')
        @include('partials.associations_page.centers.centers')
    </div>
@endsection
