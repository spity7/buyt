@extends('app')

@section('title')
    جمعيات
@endsection

@section('content')
    <div class="assoc-container">
        @include('partials.associations.top')
        @include('partials.associations.middle')
        @include('partials.associations.associations')
    </div>
@endsection
