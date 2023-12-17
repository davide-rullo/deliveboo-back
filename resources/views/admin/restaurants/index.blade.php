@extends('layouts.admin')

@section('title', 'Your Restaurant')

@section('content')
    <!-- Container per l'immagine di sfondo -->
    <div class="container-fluid back_image">

        <!-- Container principale -->
        <div class="container">

            <div class="container py-5">
                
                <!-- Barra di navigazione -->
                <div class="d-flex justify-content-end py-3">
                    <!-- Verifica se il ristorante non esiste per mostrare il pulsante "Add Your Restaurant" -->
                    @if ($restaurant == null)
                        <a class="btn btn-outline-dark me-3" href="{{ route('admin.restaurants.create') }}">
                            <i class="fa-solid fa-utensils"></i>
                            Add Your Restaurant
                        </a>
                    @endif
    
                    <!-- Pulsante per visualizzare i ristoranti eliminati -->
                    <a class="btn btn-outline-dark" href="{{ route('admin.recycle') }}">
                        <i class="fa-solid fa-utensils"></i>
                        Trashed Restaurants
                    </a>
                </div>

            </div>


            <!-- Messaggio di successo dopo un'azione -->
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Message: </strong> {{ session('message') }}
                </div>
            @endif

            <!-- Contenuto principale -->
            <div class="row py-5">

                <!-- Colonna per il ristorante -->
                <div class="col-12 col-md-8 offset-md-2 col-lg-5 offset-lg-0">

                    <!-- Verifica se il ristorante esiste -->
                    @if ($restaurant)
                        <!-- Scheda del ristorante -->
                        <div class="card shadow">

                            <!-- Immagine del ristorante -->
                            @if ($restaurant->logo)
                                <div class="card-img-top">
                                    <img class="img-fluid rounded" src="{{ asset('storage/' . $restaurant->logo) }}" alt="">
                                </div>
                            @else
                                <div class="card-img-top">
                                    <img class="img-fluid rounded" src="{{ asset('storage/img/delivery.jpeg') }}">
                                </div>
                            @endif

                            <!-- Contenuto della scheda -->
                            <div class="card-body">
                                <div class="card-title">
                                    <h6>Your Restaurant:</h6>
                                    <h4>{{ $restaurant->name }}</h4>
                                </div>
                                <div class="card-text">
                                    <!-- Pulsanti per visualizzare, modificare ed eliminare il ristorante -->
                                    <a href="{{ route('admin.restaurants.show', $restaurant->slug) }}"
                                       class="btn btn-outline-dark me-4"><i class="fa-solid fa-eye"></i></a>

                                    <a href="{{ route('admin.restaurants.edit', $restaurant) }}"
                                       class="btn btn-outline-dark"><i class="fa-solid fa-file-pen"></i></a>

                                    <!-- Pulsante per aprire il modal di conferma eliminazione -->
                                    <a type="button" class="btn btn-outline-danger mx-sm-4" data-bs-toggle="modal"
                                       data-bs-target="#modal{{ $restaurant->id }}"><i class="fa-solid fa-trash-can"></i></a>

                                    <!-- Modal di conferma eliminazione -->
                                    <div class="modal fade" id="modal{{ $restaurant->id }}" tabindex="-1"
                                         data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                         aria-labelledby="modalTitleId" aria-hidden="true">
                                        <!-- Contenuto del modal rimane invariato -->
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg_my_dark-pink">
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
                                                        <button type="submit"
                                                            class="btn btn-danger bg_my_dark-pink">Confirm</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Scheda per aggiungere un nuovo ristorante -->
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


