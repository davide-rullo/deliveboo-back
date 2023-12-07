@extends('layouts.admin')

@section('content')
    <div class="vh-100 back_image">

        <div class="container d-flex justify-content-end pt-3">
            <a class="btn btn-outline-dark" href="{{ route('admin.restaurants.index') }}"><i class="fa-solid fa-utensils"></i>
                See Your Restaurant</a>
        </div>
        <div class="jumbotron p-3 mb-2 rounded-3">
            <div class="container py-5">
                <div class="logo">
                    <img height="200" src="{{ asset('storage/img/Logo-con-testo.png') }}" alt="">
                </div>
                <h1 class="display-5 fw-bold">
                    Join the DeliveBoo Feast: Boost Your Restaurant with Booster the Rooster!
                </h1>
                <a class="btn btn-outline-dark my-3" href="{{ route('admin.restaurants.index') }}">
                    <i class="fa-solid fa-utensils"></i>
                    See Your Restaurant
                </a>
                <div class="row">
                    <div class="col-2">
                        <img class="img-fluid" src="{{ asset('storage/img/pollo.png') }}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
