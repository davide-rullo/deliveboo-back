@extends('layouts.admin')

@section('title', 'DeliveBoo-Back')

@section('content')

    <!-- Container fluid with background image and 100% viewport height -->
    <div class="container-fluid back_image vh-100">

        <!-- Main container with Bootstrap container class -->
        <div class="container">

            <!-- Inner container with padding on the top -->
            <div class="container py-4">

                <!-- Container for the button to see the restaurant -->
                <div class="container d-flex justify-content-end pt-3">
                    <a class="btn btn-outline-dark" href="{{ route('admin.restaurants.index') }}"><i
                            class="fa-solid fa-utensils"></i>
                        See Your Restaurant</a>
                </div>

                <!-- Logo -->
                <div class="logo">
                    <img height="200" src="{{ asset('storage/img/Logo-con-testo.png') }}" alt="">
                </div>

                <!-- Heading -->
                <h1 class="display-5 fw-bold">
                    Join the DeliveBoo Feast: Boost Your Restaurant with Booster the Rooster!
                </h1>
            </div>

            <!-- Button with onclick event -->
            <a id="animation" class="btn btn-outline-dark my-3" href="{{ route('admin.restaurants.index') }}"
                onclick="animateAndRedirect(event)">
                <i class="fa-solid fa-utensils"></i>
                See Your Restaurant
            </a>

            <!-- Row with the animated chicken image -->
            <div class="row">
                <div id="pollo_mobile" class="col-2">
                    <img class="img-fluid" src="{{ asset('storage/img/pollo.png') }}" alt="">
                </div>
            </div>

        </div>

    </div>

    <!-- JavaScript script for animation and redirection -->
    <script>
        function animateAndRedirect(event) {
            // Prevent the default behavior of the link
            event.preventDefault();

            // Select the div with id pollo_mobile
            let polloMobile = document.getElementById('pollo_mobile');

            // Animation: Move the div to the right by 500px in 1 second
            polloMobile.style.transition = 'margin-left 1s ease-out';
            polloMobile.style.marginLeft = (polloMobile.offsetLeft + 500) + 'px';

            // Wait for 3 seconds before redirecting to the route
            setTimeout(function() {
                window.location.href = event.target.href;
            }, 1000);
        }
    </script>
@endsection