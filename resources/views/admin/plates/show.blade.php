@extends('layouts.admin')

@section('title', 'Show Dish')

@section('content')
    <div class="vh-100 back_image">
        <div class="container">

            <a class="btn btn-secondary mt-2" href="{{ route('admin.plates.index') }}">
                <i class="fa-solid fa-arrow-left"></i> Back to Dish Home
            </a>

            <h2 class="my-5 display-3 fw-bold text-muted">Your Dish : {{ $plate->name }}
            </h2>

            <div class="row py-4">

                <div class="col">
                    <div class="card mb-3 shadow-lg">

                        <div class="row g-0 p-4">
                            <div class="col-12 col-lg-5 text-center py-2">


                                @if ($plate->cover_image)
                                    <div class="text-center">
                                        <img class="" height="250"
                                            src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
                                    </div>
                                @else
                                    <img class="img-fluid rounded-2" src="{{ asset('storage/img/delivery.jpeg') }}}"
                                        alt="">
                                @endif

                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title fs-3 my-4">
                                        <span class="text-muted">Dish name: </span>{{ $plate->name }}
                                    </h5>

                                    <p class="card-text fs-5">
                                        <span class="text-muted">Dish description: </span>{{ $plate->description }}
                                    </p>

                                    <p class="card-text fs-5">
                                        <span class="text-muted">Dish ingredients: </span>{{ $plate->ingredients }}
                                    </p>

                                    <p class="card-text fs-5">
                                        <span class="text-muted">Dish price: </span>{{ $plate->price }} €
                                    </p>

                                    <p class="card-text fs-5">
                                        <span class="text-muted">Dish available: </span>
                                        @if ($plate->is_available === 1)
                                            <td>✅</td>
                                        @else
                                            <td>❌</td>
                                        @endif
                                    </p>





                                    {{-- <div class="d-flex">
                                        Type:
                                        <ul class="d-flex list-untyled gap-1 ps-2">
                                            @forelse ($plate->types as $type)
                                                <li class="badge my_badge">
                                                    <i class="fas fa-tag fa-xs fa-fw"></i>
                                                    {{ $type->name }}
                                                </li>
                                            @empty
                                                <li class="badge my_badge">No Type selected</li>
                                            @endforelse
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end align-items-center gap-4">

                            <a class="btn btn-outline-dark" href="{{ $plate->web_link }}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-solid fa-link fa-lg"></i>
                            </a>


                            <a href="{{ route('admin.plates.edit', $plate) }}" class="btn btn-outline-dark"><i
                                    class="fa-solid fa-file-pen"></i></a>

                            <!-- Modal trigger button -->
                            {{-- <button type="button" class="btn btn-danger ms-4" data-bs-toggle="modal" data-bs-target="#modalId">
                            Delete
                        </button> --}}
                            <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#modalId">
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
                                            <h5 class="modal-title" id="modalTitleId">Delete Dish</h5>

                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-5">
                                            <h4 class="text-black">Do you really want to delete this Dish?</h4>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                            <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST">

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
    </div>
@endsection
