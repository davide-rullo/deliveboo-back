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
                    <label for="name" class="form-label text-muted">Dish name</label>
                    <input type="text" class="form-control" @error('name') is-invalid @enderror name="name"
                        id="name" aria-describedby="helpId" placeholder="Name of new Dish" value="{{ old('name') }}">
                    <small id="nameHelper" class="form-text text-muted">
                        Type dish name here

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                <!-- Campo: Descrizione -->
                <div class="mb-3">
                    <label for="description" class="form-label text-muted">Description</label>
                    <textarea class="form-control" @error('description') is-invalid @enderror name="description" id="description"
                        aria-describedby="descriptionHelper" placeholder="Describe your dish" value="{{ old('description') }}"></textarea>
                    <small id="descriptionHelper" class="form-text text-muted">
                        Type the description here

                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>




                <!-- Campo: Ingredienti -->
                <div class="mb-3">
                    <label for="ingredients" class="form-label text-muted">Ingredients</label>
                    <input type="text" class="form-control" @error('ingredients') is-invalid @enderror name="ingredients"
                        id="ingredients" aria-describedby="ingredientsHelper" placeholder="Acciughe...."
                        value="{{ old('ingredients') }}">
                    <small id="ingredientsHelper" class="form-text text-muted">
                        Type the ingredients here

                        @error('ingredients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>


                <!-- Campo: Carica immagine -->
                <div class="mb-3">
                    <label for="cover_image" class="form-label text-muted">Upload your image</label>
                    <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder=""
                        aria-describedby="image_helper">
                    <div id="image_helper" class="form-text text-muted">
                        Upload your dish image
                    </div>
                    @error('cover_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo: Prezzo -->
                <div class="mb-3">
                    <label for="price" class="form-label text-muted">Price</label>
                    <input type="number" min="1" max="99" step=".01" class="form-control"
                        @error('price') is-invalid @enderror name="price" id="price" aria-describedby="priceHelper"
                        placeholder="9,99" value="{{ old('price') }}">
                    <small id="priceHelper" class="form-text text-muted">
                        Type the dish price here

                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>

                {{-- Campo: Available --}}
                <div class="mb-4">
                    <label class="text-muted" for="is_available">Available:</label>
                    <input type="radio" id="is_available" name="is_available" value="1">
                    <label class="text-muted" for="is_available">Not Available:</label>
                    <input type="radio" id="is_available" name="is_available" value="0">
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
                {{-- @error('types')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror --}}

                <!-- Pulsante per inviare il modulo -->
                <button type="submit" class="btn btn-primary">
                    Add dish to the menu
                </button>
            </form>

        </div>
    </div>
@endsection
