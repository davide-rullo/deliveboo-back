@extends('layouts.admin')

@section('title', 'Show Dish')

@section('content')
    <!-- Contenitore principale con sfondo -->
    <div class="container-fluid back_image">
        <div class="container">

            <!-- Pulsante per tornare alla Home dei piatti -->
            <a class="btn btn-secondary mt-2" href="{{ route('admin.plates.index') }}">
                <i class="fa-solid fa-arrow-left"></i> Back to Dish Home
            </a>

            <!-- Titolo della pagina -->
            <h2 class="my-5 display-3 fw-bold text-muted">Your Dish: {{ $plate->name }}</h2>

            <div class="row py-4">

                <!-- Colonna principale per la card -->
                <div class="col">
                    <!-- Card principale -->
                    <div class="card mb-3 shadow-lg">

                        <!-- Contenuto della card -->
                        <div class="row g-0 p-4">
                            <!-- Colonna per l'immagine del piatto -->
                            <div class="col-12 col-lg-5 text-center py-2">
                                <!-- Verifica se esiste un'immagine del piatto -->
                                @if ($plate->cover_image)
                                    <div class="text-center">
                                        <!-- Immagine del piatto con angoli arrotondati -->
                                        <img class="img-fluid rounded-2" height="250"
                                            src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
                                    </div>
                                @else
                                    <!-- Immagine di default se l'immagine del piatto non esiste con angoli arrotondati -->
                                    <img class="img-fluid rounded-2" src="{{ asset('storage/img/delivery.jpeg') }}"
                                        alt="">
                                @endif
                            </div>
                            <!-- Colonna per le informazioni del piatto -->
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <!-- Nome del piatto -->
                                    <h5 class="card-title fs-3 my-4">
                                        <span class="text-muted">Dish name: </span>{{ $plate->name }}
                                    </h5>

                                    <!-- Descrizione del piatto -->
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Dish description: </span>{{ $plate->description }}
                                    </p>

                                    <!-- Ingredienti del piatto -->
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Dish ingredients: </span>{{ $plate->ingredients }}
                                    </p>

                                    <!-- Prezzo del piatto -->
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Dish price: </span>{{ $plate->price }} €
                                    </p>

                                    <!-- Disponibilità del piatto -->
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Dish available: </span>
                                        @if ($plate->is_available === 1)
                                            <span class="badge bg-success">Available</span>
                                        @else
                                            <span class="badge bg-danger">Not Available</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer della card con pulsanti -->
                        <div class="card-footer d-flex justify-content-end align-items-center gap-4">

                            <!-- Pulsante per aprire il link del piatto in una nuova finestra -->
                            <a class="btn btn-outline-dark" href="{{ $plate->web_link }}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-solid fa-link fa-lg"></i>
                            </a>

                            <!-- Pulsante per modificare il piatto -->
                            <a href="{{ route('admin.plates.edit', $plate) }}" class="btn btn-outline-dark"><i
                                    class="fa-solid fa-file-pen"></i></a>

                            <!-- Pulsante per aprire il modal di conferma eliminazione -->
                            <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#modalId">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>

                            <!-- Modal di conferma eliminazione -->
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
                                            <!-- Pulsante per chiudere il modal -->
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <!-- Form per confermare l'eliminazione -->
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
