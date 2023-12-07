@extends('layouts.admin')

@section('content')

<div class="vh-100 back_image">
    <div class="container">
        <h1 class="pt-5 pb-3 text-center">Trashed restaurants</h1>




        <table class="table table-primary">
            <thead>
                <tr class="text-center">
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Vat Number</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>

                @forelse ($trashed_restaurants as $trashed)
                <tr class="text-center">
                    <td>{{ $trashed->name }}</td>
                    <td>{{ $trashed->address }}</td>
                    <td>{{ $trashed->vat_number }}</td>
                    <td>{{ $trashed->phone }}</td>
                    <td>
                        @if ($trashed->logo)
                        {{-- <img width="100" src="{{ asset('storage/' . $trashed->logo) }}"> --}}

                        <img width="100" src="{{ asset('storage/' . $trashed->logo) }}">
                        @else
                        <img width="100" src="{{ asset('storage/covers/american.png') }}">
                        @endif
                    </td>


                    <td>
                        <div class="card-text">
                            <a href="{{ route('admin.restaurants.show', $restaurant->slug) }}" class="btn btn-outline-dark me-4"><i class="fa-solid fa-eye"></i></a>


                            <a href="#" class="btn btn-outline-dark"> <i class="fa-solid fa-recycle"></i></a>

                            <!-- Modal trigger button -->
                            <a type="button" class="btn btn-outline-danger mx-sm-4" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fa-solid fa-trash-can"></i></a>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg_my_dark-pink">
                                            <h5 class="modal-title" id="modalTitleId">Delete Restaurant</h5>

                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-5">
                                            <h4>Do you really want to delete this Restaurant?</h4>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger bg_my_dark-pink">Confirm</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>




                    @empty
                <tr class="">
                    <td scope="row">No restaurants trashed!</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection