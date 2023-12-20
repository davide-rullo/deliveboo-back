@extends('layouts.admin')

@section('title', 'Show Order')

@section('content')

 <!-- Contenitore principale con sfondo -->
 <div class="container-fluid back_image">
        <div class="container">

            <!-- Pulsante per tornare alla Home degli ordini -->
            <a class="btn btn-secondary mt-2" href="{{ route('admin.orders') }}">
                <i class="fa-solid fa-arrow-left"></i> Back to Orders
            </a>

            <!-- Titolo della pagina -->
            <h2 class="my-5 display-3 fw-bold text-muted">Your Order: {{ $order->name }}</h2>

            <div class="row py-4">

                <!-- Colonna principale per la card -->
                <div class="col">
                    <!-- Card principale -->
                    <div class="card mb-3 shadow-lg">

                        <!-- Contenuto della card -->
                        <div class="row g-0 p-4">
                        
                            
                            <!-- Colonna per le informazioni del piatto -->
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <!-- Nome del piatto -->
                                    <h5 class="card-title fs-3 my-4">
                                        <span class="text-muted">Name: </span>{{ $order->customer_name }}
                                    </h5>

                                    <!-- Descrizione del piatto phone address message - state data totalprice - plate(ciclare) -->
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Email: </span>{{ $order->customer_email }}
                                    </p>
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Phone: </span>{{ $order->customer_phone }}
                                    </p>
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Address: </span>{{ $order->customer_address }}
                                    </p>
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Message: </span>{{ $order->customer_message }}
                                    </p>
                         

                                    <!-- Prezzo del piatto -->
                                    <p class="card-text fs-5">
                                        <span class="text-muted">Order price: </span>{{ $order->price }} €
                                    </p>

                             
                           
                                </div>
                            </div>
                        </div>

                 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
