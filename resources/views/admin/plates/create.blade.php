@extends('layouts.admin')

@section('content')
    <div class="vh-100 back_image">
        <div class="container py-5">
            <!-- Header della pagina -->
            <div class="row mb-3">
                <div class="col d-flex align-items-center mt-4">
                    <h1 class="flex-grow-1 m-0">
                        {{ __('Add a new dish') }}
                    </h1>
                </div>
            </div>

            <!-- Form per la creazione del piatto -->
            <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Campo: Nome del piatto -->
                <div class="mb-3">
                    <label for="name" class="form-label text-warning">Dish name</label>
                    <input type="text" class="form-control" @error('name') is-invalid @enderror name="name"
                        id="name" aria-describedby="helpId" placeholder="Name of new Plate"
                        value="{{ old('name') }}">
                    <small id="nameHelper" class="form-text text-white">
                        Type dish name here

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <!-- Campo: Descrizione -->
                <div class="mb-3">
                    <label for="description" class="form-label text-warning">description</label>
                    <input type="text" class="form-control" name="description" id="description"
                        aria-describedby="descriptionHelper" placeholder="Piazza Duomo 1, Milano"
                        value="{{ old('description') }}">
                    <small id="descriptionHelper" class="form-text text-white">
                        Type the description here

                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <!-- Campo: Ingredienti -->
                <div class="mb-3">
                    <label for="ingredients" class="form-label text-warning">ingredients</label>
                    <input type="text" class="form-control" name="ingredients" id="ingredients"
                        aria-describedby="ingredientsHelper" placeholder="Piazza Duomo 1, Milano"
                        value="{{ old('ingredients') }}">
                    <small id="ingredientsHelper" class="form-text text-white">
                        Type the ingredients here

                        @error('ingredients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>


                <!-- Campo: Carica immagine -->
                <div class="mb-3">
                    <label for="image" class="form-label text-warning">Upload your image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder=""
                        aria-describedby="image_helper">
                    <div id="image_helper" class="form-text text-white">
                        Upload your dish image
                    </div>
                </div>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <!-- Campo: Prezzo -->
                <div class="mb-3">
                    <label for="price" class="form-label text-warning">price</label>
                    <input type="text" class="form-control" name="price" id="price" aria-describedby="priceHelper"
                        placeholder="0123456789" value="{{ old('price') }}">
                    <small id="priceHelper" class="form-text text-white">
                        Type the price number here

                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                {{-- Campo: Tipo di piatto --}}
                {{-- <div class="dropdown my-3">
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
    </div> --}}

                <!-- Gestione degli errori per il campo 'types' -->
                @error('types')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <!-- Pulsante per inviare il modulo -->
                <button type="submit" class="btn btn-primary">
                    Add dish to the menu
                </button>
            </form>

        </div>
    </div>
@endsection
