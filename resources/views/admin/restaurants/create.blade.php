@extends('layouts.admin')

@section('page-title', 'Create restaurant')

@section('content')
    <div class="container py-5">
        <div class="row mb-3">
            <div class="col d-flex align-items-center mt-4">
                <h1 class="flex-grow-1 m-0">
                    {{ __('Add your restaurant') }}
                </h1>
            </div>
        </div>

        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-warning">Name restaurant</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="Acolyte Eco Battle staff" value="{{ old('name') }}">
                <small id="nameHelper" class="form-text text-white">
                    Type your name here

                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label text-warning">Address</label>
                <input type="text" class="form-control" name="address" id="address" aria-describedby="addressHelper"
                    placeholder="Piazza Duomo 1, Milano" value="{{ old('address') }}">
                <small id="addressHelper" class="form-text text-white">
                    Type the address here

                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3">
                <label for="vat_number" class="form-label text-warning">Vat number</label>
                <input type="text" class="form-control" name="vat_number" id="vat_number" aria-describedby="vat_numberHelper"
                    placeholder="0123456789" value="{{ old('vat_number') }}">
                <small id="vat_numberHelper" class="form-text text-white">
                    Type the vat number here

                    @error('vat_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-warning">Upload your logo</label>
                <input type="file" class="form-control" name="image" id="image" placeholder=""
                    aria-describedby="image_helper">
                <div id="image_helper" class="form-text text-white">
                    Upload your business logo
                </div>
            </div>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror

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

            <button type="submit" class="btn btn-primary">
                Create restaurant
            </button>
        </form>

    </div>
@endsection