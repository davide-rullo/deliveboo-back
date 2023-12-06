@extends('layouts.admin')

@section('content')
    <div class="vh-100 back_image">

        <div class="container">

            <div class="d-flex justify-content-end py-3">

                @if (!$restaurant)
                    <a class="btn btn-outline-dark" href="{{ route('admin.restaurants.create') }}">
                        <i class="fa-solid fa-utensils"></i>
                        Add Your Restaurant
                    </a>
                @endif
            </div>
            <div class="row justify-content-end py-5">

                <div class="col-5">


                    @if ($restaurant)
                        <div class="card">
                            <div class="card-img-top">
                                <img class="img-fluid" src="{{ asset('storage/img/delivery.jpeg') }}" alt="">
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h6>Your Restaurant:</h6>
                                    <h4>{{ $restaurant->name }}</h4>
                                </div>
                                <div class="card-text">
                                    <a href="{{ route('admin.restaurants.show', $restaurant->slug) }}"
                                        class="btn btn-outline-dark me-4"><i class="fa-solid fa-eye"></i></a>


                                    <a href="{{ route('admin.restaurants.edit', $restaurant) }}"
                                        class="btn btn-outline-dark"><i class="fa-solid fa-file-pen"></i></a>

                                    <!-- Modal trigger button -->
                                    <a type="button" class="btn btn-outline-danger mx-4" data-bs-toggle="modal"
                                        data-bs-target="#modalId"><i class="fa-solid fa-trash-can"></i></a>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title" id="modalTitleId">Delete Restaurant</h5>

                                                    <button type="button" class="btn-close bg-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-5">
                                                    <h4>Do you really want to delete this Restaurant?</h4>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                    <form action="{{ route('admin.restaurants.destroy', $restaurant) }}"
                                                        method="POST">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">Confirm</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-img-top">
                                <img class="img-fluid" src="{{ asset('storage/img/delivery.jpeg') }}" alt="">
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <a class="btn btn-outline-dark" href="{{ route('admin.restaurants.create') }}">
                                        <i class="fa-solid fa-utensils"></i>
                                        Add Your Restaurant
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>

            </div>



        </div>
    </div>
@endsection
