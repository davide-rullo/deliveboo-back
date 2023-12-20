@extends('layouts.admin')

@section('title', 'Show Order')

@section('content')



    <!-- Contenitore principale con sfondo -->
    <div class="container-fluid back_image">
        <div class="container">

            <!-- Pulsante per tornare alla Home degli ordini -->
            <a class="btn btn-secondary mt-2" href="{{ route('admin.orders.index') }}">
                <i class="fa-solid fa-arrow-left"></i> Back to Orders
            </a>

            <!-- Titolo della pagina -->
            <h2 class="my-5 display-3 fw-bold text-muted">Your Order: #{{ $order->id }}</h2>

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



                                    <div class="row row-cols-1 row-cols-md-2 g-2">
                                        <div class="col">
                                            <!-- Nome del piatto -->
                                            <h5 class="card-title fs-3 mb-4">
                                                <span class="text-muted">User Name: </span>{{ $order->customer_name }}
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
                                            <p class="card-text fs-5">
                                                <span class="text-muted">Date: </span>{{ $order->created_at }}
                                            </p>
                                            <p class="card-text fs-5">
                                                <span class="text-muted">State: </span>{{ $order->state }}
                                            </p>


                                            <!-- Tot ordine -->
                                            <p class="card-text fs-5">
                                                <span class="text-muted">Order price: </span>{{ $order->tot_price }} €
                                            </p>
                                        </div>

                                        <div class="col">
                                            @forelse ($order->plates as $plate)
                                                <p class="card-text fs-5">
                                                    <span class="text-muted">plate: </span>{{ $plate->name }}
                                                </p>
                                                <p class="card-text fs-5">
                                                    <span class="text-muted">price: </span>{{ $plate->price }}
                                                </p>
                                                <p class="card-text fs-5">
                                                    <span class="text-muted">quantity:
                                                    </span>{{ $plate->pivot->quantity_plate }}
                                                </p>
                                                <hr>

                                            @empty
                                            @endforelse
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
