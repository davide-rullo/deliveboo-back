@extends('layouts.admin')

@section('content')
    <div class="vh-100 back_image">
        <div class="container">
            <h1 class="pt-5 pb-3 text-center">Your Dishes</h1>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.plates.create') }}" class="btn btn-outline-dark my-4"><i class="fa-solid fa-plus"></i>
                    Add
                    a
                    new
                    dish</a>
            </div>



            <table class="table table-light table-borderless table-responsive-lg table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Ingredients</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Available</th>


                    </tr>
                </thead>
                <tbody>

                    @forelse ($filteredPlates as $plate)
                        <tr class="text-center">
                            <td>{{ $plate->name }}</td>
                            <td>{{ $plate->description }}</td>
                            <td>{{ $plate->ingredients }}</td>
                            <td>







                                @if ($plate->cover_image)
                                    {{-- <img width="100" src="{{ asset('storage/' . $plate->cover_image) }}"> --}}

                                    <img width="100" src="{{ asset('storage/' . $plate->cover_image) }}">
                                @else
                                    <img width="100" src="{{ asset('storage/covers/panino.jpg') }}">
                                @endif
                            </td>
                            <td>{{ $plate->price }} €</td>

                            @if ($plate->is_available == 1)
                                <td>✅</td>
                            @else
                                <td>❌</td>
                            @endif



                        @empty
                        <tr class="">
                            <td scope="row">No dishes yet!</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
