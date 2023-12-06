@extends('layouts.admin')

@section('content')

<h1 class="pt-5 pb-3">Menu</h1>

<a href="{{route('admin.plates.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add a new dish</a>

<table class="table table-primary">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">Description</th>
            <th scope="col">Ingredients</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Is available</th>


        </tr>
    </thead>
    <tbody>

        @forelse ($plates as $plate)
        <tr class="">
            <td scope="row">{{$plate->name}}</td>
            <td>{{$plate->description}}</td>
            <td>{{$plate->ingredients}}</td>
            <td>
                @if ($plate->cover_image)
                <img width="100" src="{{asset('storage/' . $plate->cover_image)}}">
                @else
                N/A
                @endif
            </td>
            <td>{{$plate->Price}}</td>
            <td>{{$plate->is_available}}</td>


            <td>{{$plate->title}}</td>
            <td><a class="card-link pe-3" href="{{$plate->github_link}}" target=”_blank”><i class="fa-brands fa-square-github fa-lg"></i></a>
                <a class="card-link" href="{{$plate->online_link}}" target=”_blank”><i class="fa-solid fa-globe"></i></a>
            </td>



    </tbody>
</table>
@endsection