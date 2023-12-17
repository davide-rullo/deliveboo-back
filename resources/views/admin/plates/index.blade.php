@extends('layouts.admin')

@section('title', 'Your Dishes')

@section('content')

    <div class="container-fluid back_image">

        <div class="container">

            <div class="container py-5">
                <!-- Back to Home Button -->
                <a class="btn btn-secondary mt-2" href="{{ route('admin.restaurants.index') }}">
                    <i class="fa-solid fa-arrow-left"></i> Back to Home
                </a>

                <!-- Page Title -->
                <h1 class="pt-5 pb-3 text-center">Your Dishes</h1>

                <!-- Buttons for Adding a New Dish and Trashed Dishes -->
                <div class="d-flex justify-content-end flex-wrap gap-2">
                    <a href="{{ route('admin.plates.create') }}" class="btn btn-outline-dark my-2">
                        <i class="fa-solid fa-plus"></i> Add a new dish
                    </a>
                    <a class="btn btn-outline-dark my-2" href="{{ route('admin.recycle.plates') }}">
                        <i class="fa-solid fa-utensils"></i> Trashed Dishes
                    </a>
                </div>

                <!-- Display Success Message -->
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Message: </strong> {{ session('message') }}
                    </div>
                @endif

                <!-- Table of Dishes -->
                <div class="table-responsive-lg">
                    <table class="table table-light table-borderless table-striped">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Available</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($filteredPlates as $plate)
                                <tr class="text-center align-middle">
                                    <!-- Dish Image -->
                                    <td>
                                        @if ($plate->cover_image)
                                            <img width="100" src="{{ asset('storage/' . $plate->cover_image) }}"
                                                alt="{{ $plate->name }}">
                                        @else
                                            <img width="100" src="{{ asset('storage/covers/panino.jpg') }}"
                                                alt="{{ $plate->name }}">
                                        @endif
                                    </td>
                                    <!-- Dish Name -->
                                    <td>{{ $plate->name }}</td>
                                    <!-- Dish Price -->
                                    <td>{{ $plate->price }} €</td>
                                    <!-- Availability Badge -->
                                    <td>
                                        @if ($plate->is_available === 1)
                                            <span class="badge bg-success">Available</span>
                                        @else
                                            <span class="badge bg-danger">Not Available</span>
                                        @endif
                                    </td>
                                    <!-- Action Buttons -->
                                    <td>
                                        <!-- View Button -->
                                        <a href="{{ route('admin.plates.show', $plate->slug) }}"
                                            class="btn btn-outline-dark me-2"><i class="fa-solid fa-eye"></i></a>
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.plates.edit', $plate->slug) }}"
                                            class="btn btn-outline-dark me-2"><i class="fa-solid fa-file-pen"></i></a>
                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-outline-danger me-2" data-bs-toggle="modal"
                                            data-bs-target="#modal{{ $plate->id }}"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </td>
                                </tr>

                            @empty
                                <!-- No Dishes Message -->
                                <tr class="">
                                    <td colspan="5">No dishes yet!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
