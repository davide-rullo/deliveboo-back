@extends('layouts.admin')

@section('title', 'Create Dish')

@section('content')

    <div class="container-fluid back_image">

        <div class="container">

            <div class="container py-5">
                <!-- Navigazione indietro -->
                <a class="btn btn-secondary mt-2" href="{{ route('admin.plates.index') }}">
                    <i class="fa-solid fa-arrow-left"></i> Back to Dish Home
                </a>
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
                            id="name" aria-describedby="nameHelper" placeholder="Name of new Dish"
                            value="{{ old('name') }}" required>
                        <small id="nameHelper" class="form-text text-muted">
                          

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </small>
                    </div>

                    <!-- Campo: Descrizione -->
                    <div class="mb-3">
                        <label for="description" class="form-label text-muted">Description</label>
                        <textarea class="form-control" @error('description') is-invalid @enderror name="description" id="description"
                            aria-describedby="descriptionHelper" placeholder="Describe your dish">{{ old('description') }}</textarea>
                        <small id="descriptionHelper" class="form-text text-muted">
                       

                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </small>
                    </div>

                    <!-- Campo: Ingredienti -->
                    <div class="mb-3">
                        <label for="ingredients" class="form-label text-muted">Ingredients</label>
                        <input type="text" class="form-control" @error('ingredients') is-invalid @enderror
                            name="ingredients" id="ingredients" aria-describedby="ingredientsHelper"
                            placeholder="Acciughe...." value="{{ old('ingredients') }}">
                        <small id="ingredientsHelper" class="form-text text-muted">
                      

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
                        
                        </div>
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo: Prezzo -->
                    <div class="mb-3">
                        <label for="price" class="form-label text-muted">Price</label>
                        <input type="number" min="1" max="99" step=".01" class="form-control"
                            @error('price') is-invalid @enderror name="price" id="price"
                            aria-describedby="priceHelper" placeholder="9.99" value="{{ old('price') }}" required>
                        <small id="priceHelper" class="form-text text-muted">
                         

                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </small>
                    </div>

                    {{-- Campo: Available --}}
                    <div class="mb-4">
                        <label class="text-muted" for="is_available">Available:</label>
                        <input type="radio" id="is_available" name="is_available" value="1">
                        <label class="text-muted" for="is_not_available">Not Available:</label>
                        <input type="radio" id="is_not_available" name="is_available" value="0">
                    </div>

                    <!-- Pulsante per inviare il modulo -->
                    <button type="submit" class="btn btn-outline-dark">
                        Add dish to the menu
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
