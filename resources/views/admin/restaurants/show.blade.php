@extends('layouts.admin')

@section('title', 'Show Restaurant')

@section('content')
    <!-- Contenitore principale con sfondo -->
    <div class="container-fluid back_image">
        
        <div class="container">

            <!-- Pulsante per tornare alla Home -->
            <a class="btn btn-secondary mt-2" href="{{ route('admin.restaurants.index') }}">
                <i class="fa-solid fa-arrow-left"></i> Back to Home
            </a>

            <!-- Titolo della pagina -->
            <h2 class="my-5 display-3 fw-bold text-muted">Your Restaurant: {{ $restaurant->name }}</h2>

            <div class="row py-4">

                <!-- Colonna centrale per la card -->
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <!-- Card principale -->
                    <div class="card mb-3 shadow-lg">

                        <!-- Contenuto della card -->
                        <div class="row g-0 p-4">
                            <!-- Colonna per l'immagine del ristorante con classe rounded -->
                            <div class="col-lg-5 text-center py-2">
                                <!-- Verifica se esiste un logo del ristorante -->
                                @if ($restaurant->logo)
                                    <img class="img-fluid rounded" src="{{ asset('storage/' . $restaurant->logo) }}" alt="">
                                @else
                                    <!-- Immagine di default se il logo non esiste con classe rounded -->
                                    <img class="img-fluid rounded" src="{{ asset('storage/img/delivery.jpeg') }}"
                                        alt="">
                                @endif
                            </div>
                            <!-- Colonna per le informazioni del ristorante -->
                            <div class="col-lg-7">
                                <div class="card-body">
                                    <!-- Nome del ristorante -->
                                    <h5 class="card-title fs-3 my-4">
                                        {{ $restaurant->name }}
                                    </h5>

                                    <!-- Indirizzo del ristorante -->
                                    <p class="card-text fs-5 py-4">Address: {{ $restaurant->address }}</p>

                                    <!-- Tipi di ristorante -->
                                    <div class="d-flex">
                                        Type:
                                        <ul class="list-untyled gap-1 ps-2">
                                            <!-- Visualizza i tipi di ristorante -->
                                            @forelse ($restaurant->types as $type)
                                                <li class="badge my_badge">
                                                    <i class="fas fa-tag fa-xs fa-fw"></i>
                                                    {{ $type->name }}
                                                </li>
                                            @empty
                                                <!-- Nessun tipo selezionato -->
                                                <li class="badge my_badge">No Type selected</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer della card con pulsanti -->
                        <div class="card-footer d-flex justify-content-end align-items-center gap-4">
                            <!-- Pulsante per aprire il link del ristorante in una nuova finestra -->
                            <a class="btn btn-outline-dark" href="{{ $restaurant->web_link }}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-solid fa-link fa-lg"></i>
                            </a>

                            <!-- Pulsante per modificare il ristorante -->
                            <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-outline-dark"><i
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
                                            <h5 class="modal-title" id="modalTitleId">Delete Restaurant</h5>
                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-5">
                                            <h4 class="text-black">Do you really want to delete this Restaurant?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Pulsante per chiudere il modal -->
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <!-- Form per confermare l'eliminazione -->
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
            </div>

        </div>
    </div>
@endsection
