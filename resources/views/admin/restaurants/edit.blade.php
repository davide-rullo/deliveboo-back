@extends('layouts.admin')

@section('page-title', 'Edit restaurant')

@section('content')

    <div class="vh-100 back_image">

        <div class="container py-5">

            <div class="row mb-3">
                <div class="col d-flex align-items-center mt-4">
                    <h1 class="flex-grow-1 m-0">
                        {{ __('Edit Restaurant') }}
                    </h1>
                </div>
            </div>


            <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label text-muted">Name restaurant</label>
                    <input type="text" class="form-control" @error('name') is-invalid @enderror name="name"
                        id="name" aria-describedby="helpId" placeholder="Acolyte Eco Battle staff"
                        value="{{ old('name', $restaurant->name) }}">
                    <small id="nameHelper" class="form-text text-white">
                        Type your name here

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>


                <div class="mb-3">
                    <label for="address" class="form-label text-muted">Address</label>
                    <input type="text" class="form-control" @error('address') is-invalid @enderror name="address"
                        id="address" aria-describedby="addressHelper" placeholder="Piazza Duomo 1, Milano"
                        value="{{ old('address', $restaurant->address) }}">
                    <small id="addressHelper" class="form-text text-white">
                        Type the address here

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
                                    <input class="form-check-input mx-1" @error('types') is-invalid @enderror
                                        type="checkbox" name="types[]" value="{{ $type->id }}"
                                        id="type{{ $type->id }}"
                                        {{--  {{ in_array($type->id, old('types', [])) ? 'checked' : '' }} --}}{{ $restaurant->types->contains($type) ? 'checked' : '' }}>
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


                <div class="mb-3">
                    <label for="vat_number" class="form-label text-muted">Vat number</label>
                    <input type="text" class="form-control" @error('vat_number') is-invalid @enderror name="vat_number"
                        id="vat_number" aria-describedby="vat_numberHelper" placeholder="0123456789"
                        value="{{ old('vat_number', $restaurant->vat_number) }}">
                    <small id="vat_numberHelper" class="form-text text-white">
                        Type the vat number here

                        @error('vat_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>


                <div class="mb-3">
                    <label for="logo" class="form-label text-muted">Upload your logo</label>
                    <input type="file" class="form-control" name="logo" id="logo" placeholder=""
                        aria-describedby="image_helper">
                    <div id="image_helper" class="form-text text-white">
                        Upload your business logo
                    </div>
                    @error('logo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <label for="phone" class="form-label text-muted">Phone</label>
                    <input type="text" class="form-control" @error('phone') is-invalid @enderror name="phone"
                        id="phone" aria-describedby="phoneHelper" placeholder="0123456789"
                        value="{{ old('phone', $restaurant->phone) }}">
                    <small id="phoneHelper" class="form-text text-white">
                        Type the phone number here

                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>


                <button type="submit" class="btn btn-primary">Update Restaurant</button>
            </form>
        </div>
    </div>
@endsection
