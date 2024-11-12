@extends('app')

@section('title')
    جمعيات
@endsection

@section('content')
    <div class="assoc-container">
        @include('partials.associations_page.associations.top')
        @include('partials.associations_page.associations.middle')
        @include('partials.associations_page.associations.associations')
    </div>
@endsection
