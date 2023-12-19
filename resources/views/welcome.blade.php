@extends('layouts.app')

@section('title', 'DeliveBoo-Back')

@section('content')
<div class=" back_image">

    <div class="jumbotron rounded-3">
        <div class="container py-5">
            <div class="logo">
                <img height="200" src="{{ asset('storage/img/Logo-con-testo.png') }}" alt="">
            </div>
            <h1 class="display-5 fw-bold">
                Join the DeliveBoo Feast: Boost Your Restaurant with Booster the Rooster!
            </h1>

            <p class="col-md-8 fs-4">Welcome to DeliveBoo, where culinary dreams come to life! 🚀 Booster the Rooster is
                here to welcome you to our flock of fantastic flavors. Ready to showcase your restaurant and tantalize
                taste
                buds? Let's get started on your delicious journey! 🌟 #JoinTheDeliveBooFamily #BoostedByBooster</p>
            {{-- <a href="https://packagist.org/packages/pacificdev/laravel_9_preset" class="btn btn-primary btn-lg"
                type="button">Documentation</a> --}}

            <a id="animation" class="btn btn-outline-dark my-3" href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-utensils"></i>
                Go to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection