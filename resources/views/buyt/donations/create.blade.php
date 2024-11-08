@extends('app')

@section('title')
    Donation
@endsection

@section('content')
    <div class="donation-container">
        @include('partials.donations.create.form')
        @include('partials.donations.create.options')
    </div>
@endsection
