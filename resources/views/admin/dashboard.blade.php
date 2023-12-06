@extends('layouts.admin')

@section('content')
    <div class="vh-100 back_image">

        <div class="container d-flex justify-content-end py-3">
            <a class="btn btn-outline-dark" href="{{ route('admin.restaurants.index') }}"><i class="fa-solid fa-utensils"></i>
                See Your Restaurant</a>
        </div>
    </div>
@endsection
