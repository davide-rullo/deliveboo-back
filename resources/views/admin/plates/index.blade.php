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

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Message: </strong> {{ session('message') }}
                </div>
            @endif

            <table class="table table-light table-borderless table-responsive-lg table-striped">
                <thead>
                    <tr class="text-center align-middle">
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Ingredients</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Available</th>
                        <th scope="col">Actions</th>


                    </tr>
                </thead>
                <tbody>

                    @forelse ($filteredPlates as $plate)
                        <tr class="text-center align-middle">
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

                            @if ($plate->is_available === 1)
                                <td>✅</td>
                            @else
                                <td>❌</td>
                            @endif

                            <td>
                                <a href="{{ route('admin.plates.show', $plate->id) }}" class="btn btn-outline-dark me-4"><i
                                        class="fa-solid fa-eye"></i></a>


                                <a href="{{ route('admin.plates.edit', $plate->id) }}" class="btn btn-outline-dark"><i
                                        class="fa-solid fa-file-pen"></i></a>

                                <!-- Modal trigger button -->
                                <a type="button" class="btn btn-outline-danger mx-sm-4" data-bs-toggle="modal"
                                    data-bs-target="#modalId"><i class="fa-solid fa-trash-can"></i></a>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg_my_dark-pink">
                                                <h5 class="modal-title" id="modalTitleId">Delete Dish</h5>

                                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-5">
                                                <h4>Do you really want to delete this Dish?</h4>
                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>

                                                <form action="{{ route('admin.plates.destroy', $plate->id) }}"
                                                    method="POST">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="btn btn-danger bg_my_dark-pink">Confirm</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>



                        @empty
                        <tr class="">
                            <td colspan="6">No dishes yet!</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
