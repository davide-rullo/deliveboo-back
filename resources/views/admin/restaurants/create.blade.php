@extends('layouts.admin')

@section('title', 'Create Restaurant')

@section('content')

    <!-- Container per l'immagine di sfondo -->
    <div class="container-fluid back_image">

        <!-- Container principale -->
        <div class="container">

            <!-- Container interno con padding verticale -->
            <div class="container py-5">

                <!-- Riga per il titolo -->
                <div class="row mb-3">
                    <div class="col d-flex align-items-center mt-4">
                        <h1 class="flex-grow-1 m-0">
                            {{ __('Add your Restaurant') }}
                        </h1>
                    </div>
                </div>

                <!-- Form per l'aggiornamento del ristorante -->
                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Campo: Nome del ristorante -->
                    <div class="mb-3">
                        <label for="name" class="form-label text-muted">Name restaurant</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Write the name of your restaurant" value="{{ old('name') }}" required>
                        <small id="nameHelper" class="form-text text-white">
                            
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </small>
                    </div>

                    <!-- Campo: Indirizzo del ristorante -->
                    <div class="mb-3">
                        <label for="address" class="form-label text-muted">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            id="address" placeholder="Piazza Duomo 1, Milano" value="{{ old('address') }}">
                        <small id="addressHelper" class="form-text text-white">
                            
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </small>
                    </div>

                    {{-- Campo: Tipo di ristorante --}}
                    <div class="dropdown my-3">
                        <button class="btn btn-outline-secondary dropdown-toggle bg_my_light-pink" type="button"
                            id="multiSelectDropdownTech" data-bs-toggle="dropdown" aria-expanded="false">
                            Type of restaurant
                        </button>
                        <ul class="dropdown-menu bg_my_light-pink" aria-labelledby="multiSelectDropdownTech">
                            @forelse ($types as $type)
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input mx-1 @error('name') is-invalid @enderror"
                                            type="checkbox" name="types[]" value="{{ $type->id }}"
                                            id="type{{ $type->id }}"
                                            {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type{{ $type->id }}">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                </li>
                            @empty
                                N/A
                            @endforelse
                        </ul>
                    </div>

                    <!-- Gestione degli errori per il campo 'types' -->
                    @error('types')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Campo: Partita IVA -->
                    <div class="mb-3">
                        <label for="vat_number" class="form-label text-muted">Vat number</label>
                        <input type="text" minlength="11" maxlength="16" class="form-control @error('vat_number') is-invalid @enderror"
                            name="vat_number" id="vat_number" placeholder="0123456789" value="{{ old('vat_number') }}">
                        <small id="vat_numberHelper" class="form-text text-white">
                          
                            @error('vat_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </small>
                    </div>

                    <!-- Campo: Logo del ristorante -->
                    <div class="mb-3">
                        <label for="logo" class="form-label text-muted">Upload your logo</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="logo"
                            placeholder="" aria-describedby="image_helper">
                        <div id="image_helper" class="form-text text-white">
                         
                        </div>
                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo: Numero di telefono -->
                    <div class="mb-3">
                        <label for="phone" class="form-label text-muted">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            id="phone" placeholder="0123456789" value="{{ old('phone') }}">
                        <small id="phoneHelper" class="form-text text-white">
                        
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </small>
                    </div>

                    <!-- Pulsante per l'aggiornamento del ristorante -->
                    <button type="submit" class="btn btn-outline-dark">Create Restaurant</button>
                </form>
            </div>
        </div>
    </div>
@endsection
