@extends('layouts.admin')

@section('title', 'Your Orders')

@section('content')

    <div class="container-fluid back_image">

        <div class="container">

            <div class="container py-5">
                <!-- Back to Home Button -->
                <a class="btn btn-secondary mt-2" href="{{ route('admin.restaurants.index') }}">
                    <i class="fa-solid fa-arrow-left"></i> Back to Home
                </a>

                <!-- Page Title -->
                <h1 class="pt-5 pb-3 text-center">Your Orders</h1>

                <!-- Buttons for Refresh Orders -->
                <div class="d-flex justify-content-end flex-wrap gap-2">
                    <a href="{{ route('admin.orders') }}" class="btn btn-outline-dark my-2">
                        <i class="fa-solid fa-rotate-right"></i>
                    </a>
                </div>


                <!-- Table of orderes -->
                <div class="table-responsive-lg">
                    <table class="table table-light table-borderless table-striped">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">Id</th>
                                <th scope="col">From</th>
                                {{--  <th scope="col">Mail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th> --}}
                                <th scope="col">State</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($orders as $order)
                                <tr class="text-center align-middle">

                                    <!-- order id -->
                                    <td>{{ $order->id }}</td>
                                    <!-- order customer Name -->
                                    <td>{{ $order->customer_name }}</td>
                                    <!-- order customer email -->
                                    {{-- <td>{{ $order->customer_email }}</td> --}}
                                    <!-- order customer phone -->
                                    {{-- <td>{{ $order->customer_phone }}</td> --}}
                                    <!-- order customer address -->
                                    {{-- <td>{{ $order->customer_address }}</td> --}}
                                    <!-- order customer state -->
                                    <td>{{ $order->state }}</td>

                                    <!-- order Price -->
                                    <td>{{ $order->price }} €</td>
                                    {{-- Actions --}}
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="btn btn-outline-dark me-2"><i class="fa-solid fa-eye"></i></a></td>


                                </tr>

                            @empty
                                <!-- No orderes Message -->
                                <tr class="">
                                    <td colspan="5">No orders yet!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
