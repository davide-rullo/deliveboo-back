@extends('layouts.admin')

@section('content')
    <div class="vh-100 back_image">

        <div class="container">

            <div class="d-flex justify-content-end py-3">

                <a class="btn btn-outline-dark" href="{{ route('admin.restaurants.create') }}">
                    <i class="fa-solid fa-utensils"></i>
                    Add Your Restaurant
                </a>
            </div>
            <div class="row justify-content-end py-3">

                <div class="col-5">


                    <div class="card">
                        <div class="card-img-top">
                            <img class="img-fluid" src="{{ asset('storage/img/delivery.jpeg') }}" alt="">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <h4>{{ $restaurant->name }}</h4>
                            </div>
                        </div>
                    </div>


                </div>

            </div>



        </div>
    </div>
@endsection
