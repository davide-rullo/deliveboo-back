@extends('layouts.admin')

@section('page-title', 'Create restaurant')

@section('content')
<div class="container py-5">
    <!-- Header della pagina -->
    <div class="row mb-3">
        <div class="col d-flex align-items-center mt-4">
            <h1 class="flex-grow-1 m-0">
                {{ __('Add your restaurant') }}
                </h1>
            </div>
        </div>
        
        <!-- Form per la creazione del ristorante -->
        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Campo: Nome del ristorante -->
            <div class="mb-3">
                <label for="name" class="form-label text-warning">Name restaurant</label>

                <input type="text" class="form-control" @error('name') is-invalid @enderror name="name" id="name"
                    aria-describedby="helpId" placeholder="Write the name of your restaurant" value="{{ old('name') }}">

                

                <small id="nameHelper" class="form-text text-white">
                    Type your name here
                    
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>
            
            {{-- Campo: Tipo di ristorante --}}
            <div class="dropdown my-3">
                <button class="btn btn-dark dropdown-toggle" type="button" id="multiSelectDropdownTech"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Type of restaurant
                </button>
                <ul class="dropdown-menu" aria-labelledby="multiSelectDropdownTech">
                    @forelse ($types as $type)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="types[]"
                                    value="{{ $type->id }}" id="type{{ $type->id }}"
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

            <!-- Campo: Indirizzo -->
            <div class="mb-3">
                <label for="address" class="form-label text-warning">Address</label>
                <input type="text" class="form-control" @error('address') is-invalid @enderror name="address"
                    id="address" aria-describedby="addressHelper" placeholder="Piazza Duomo 1, Milano"
                    value="{{ old('address') }}">
                <small id="addressHelper" class="form-text text-white">
                    Type the address here

                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <!-- Campo: Numero di partita IVA -->
            <div class="mb-3">
                <label for="vat_number" class="form-label text-warning">Vat number</label>
                <input type="text" class="form-control" @error('vat_number') is-invalid @enderror name="vat_number"
                    id="vat_number" aria-describedby="vat_numberHelper" placeholder="0123456789"
                    value="{{ old('vat_number') }}">
                <small id="vat_numberHelper" class="form-text text-white">
                    Type the vat number here

                    @error('vat_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <!-- Campo: Carica il logo -->
            <div class="mb-3">
                <label for="logo" class="form-label text-warning">Upload your logo</label>
                <input type="file" class="form-control" name="logo" id="logo" placeholder=""

                  

                    aria-describedby="logo_helper">
                <div id="logo_helper" class="form-text text-white">

                    Upload your business logo
                </div>
            </div>
            @error('logo')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <!-- Campo: Numero di telefono -->
            <div class="mb-3">
                <label for="phone" class="form-label text-warning">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phoneHelper"
                    placeholder="0123456789" value="{{ old('phone') }}">
                <small id="phoneHelper" class="form-text text-white">
                    Type the phone number here

                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>


            <!-- Pulsante per inviare il modulo -->
            <button type="submit" class="btn btn-primary">
                Create restaurant
            </button>
        </form>

    </div>
@endsection
