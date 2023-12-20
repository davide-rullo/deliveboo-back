@extends('layouts.admin')

@section('title', 'Trashed Restaurants')

@section('content')
    <div class="vh-100 back_image overflow-y-auto">
        <div class="container">
            <h1 class="pt-5 pb-3 text-center">Ristoranti Eliminati</h1>

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Messaggio:</strong> {{ session('message') }}
                </div>
            @endif

            <table
                class="table table-light table-borderless table-responsive-lg table-responsive-md table-responsive-sm table-striped">
                <thead>
                    <tr class="text-center align-middle">
                        <th scope="col">Nome</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Numero IVA</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashed_restaurants as $trashed)
                        <tr class="text-center align-middle">
                            <td>{{ $trashed->name }}</td>
                            <td>{{ $trashed->address }}</td>
                            <td>{{ $trashed->vat_number }}</td>

                            <td>
                                @if ($trashed->logo)
                                    <img width="100" src="{{ asset('storage/' . $trashed->logo) }}" class="img-fluid">
                                @else
                                    <img width="100" src="{{ asset('storage/covers/american.png') }}" class="img-fluid">
                                @endif
                            </td>

                            <td>{{ $trashed->phone }}</td>

                            <td>
                                <div class="card-text d-flex justify-content-center">
                                    <a href="{{ route('admin.restore', $trashed->id) }}"
                                        class="btn btn-outline-dark mx-sm-1">
                                        <i class="fa-solid fa-recycle"></i>
                                    </a>

                                    <a type="button" class="btn btn-outline-danger mx-sm-1" data-bs-toggle="modal"
                                        data-bs-target="#modalId">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>

                                    <!-- Modal Body -->
                                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg_my_dark-pink">
                                                    <h5 class="modal-title" id="modalTitleId">Elimina Ristorante</h5>
                                                    <button type="button" class="btn-close bg-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-5">
                                                    <h4>Desideri davvero eliminare questo ristorante?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Chiudi</button>
                                                    <form action="{{ route('admin.forceDelete', $trashed->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger bg_my_dark-pink">Conferma</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">Nessun ristorante eliminato!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
