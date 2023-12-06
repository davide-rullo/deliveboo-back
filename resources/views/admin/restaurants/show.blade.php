@extends('layouts.admin')

@section('content')
    <div class="container">

        <a class="btn btn-secondary mt-2" href="{{ route('admin.restaurants.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back to Home
        </a>

        <h2 class="my-5 display-3 fw-bold text-muted">Your Restaurant : {{ $restaurant->name }}
        </h2>

        <div class="row py-4">

            <div class="col">
                <div class="card mb-3 shadow-lg">

                    <div class="row g-0 p-4">
                        <div class="col-lg-5 text-center py-2">


                            @if ($restaurant->logo)
                                <img class="img-fluid" src="{{ asset('storage/' . $restaurant->logo) }}" alt="">
                            @else
                                <img class="img-fluid rounded-2" src="{{ asset('storage/img/delivery.jpeg') }}}"
                                    alt="">
                            @endif

                        </div>
                        <div class="col-lg-7">
                            <div class="card-body">
                                <h5 class="card-title fs-4 my-4"><span class="text-white-50">Your Restaurant name:
                                    </span>{{ $restaurant->name }}
                                </h5>

                                <p class="card-text fs-5 py-4"><span class="text-white-50">Address:
                                    </span>{{ $restaurant->address }}</p>


                                <div class="d-flex">
                                    <span class="text-white-50">Type: </span>
                                    <ul class="d-flex list-untyled gap-1 ps-2">
                                        @forelse ($restaurant->types as $type)
                                            <li class="badge bg-secondary">
                                                <i class="fas fa-tag fa-xs fa-fw"></i>
                                                {{ $type->name }}
                                            </li>
                                        @empty
                                            <li class="badge bg-secondary">No Type selected</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end bg-secondary bg-gradient align-items-center gap-4">

                        <a class="btn btn-outline-dark" href="{{ $restaurant->web_link }}" target="_blank"
                            rel="noopener noreferrer">
                            <i class="fa-solid fa-link fa-lg"></i>
                        </a>


                        <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-outline-dark"><i
                                class="fa-solid fa-file-pen"></i></a>

                        <!-- Modal trigger button -->
                        {{-- <button type="button" class="btn btn-danger ms-4" data-bs-toggle="modal" data-bs-target="#modalId">
                            Delete
                        </button> --}}
                        <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalId">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="modalTitleId">Delete Restaurant</h5>

                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-5">
                                        <h4 class="text-black">Do you really want to delete this Restaurant?</h4>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                        <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST">

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
        </div>




    </div>
@endsection
