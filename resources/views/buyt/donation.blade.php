@extends('app')

@section('title')
    Donation
@endsection

@section('content')
    <div class="donation-container">
        @include('partials.donation.form')
        @include('partials.donation.options')
    </div>
@endsection
