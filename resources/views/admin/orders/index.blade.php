@extends('layouts.app')

@section('content')
    <div id="title_restaurant" class="py-3">
        <div class="container">
            <div class="row">
                <h3 class="mt-3 fw-bold">{{ $restaurant->name }}</h3>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row mt-3">
            <div class="col-12 mx-auto col-sm-12 col-md-3 mb-4">
                <div id="comands_restaurant">
                    <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.dashboard') }}">Torna alla
                            dashboard</a></button>
                </div>
            </div>
            <div class="col-12 mx-auto col-sm-12 col-md-9 mb-4">
                <div class="mt-3">
                    <h4 class="text-center fw-bold">Qui avrai a disposizione la paronamica degli ordini ricevuti</h4>
                </div>

                
                    {{-- <thead id="title-table">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">Stato Pagamento</th>
                            <th scope="col">Data</th>
                            <th scope="col">Prodotti ordinati</th>
                            <th scope="col">Totale</th>
                        </tr>
                    </thead> --}}
                    <div class="row mt-4">
                        @foreach ($orders as $order)
                            <div class="accordion mt-2 py-2" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#{{ $loop->index }}" aria-expanded="false"
                                            aria-controls="{{ $loop->index }}">
                                            Data Ordine: {{ $order->created_at }}| Totale Ordine: {{ $order->total_price }}€|
                                            {{ $order->payment_state == 0 ? 'Pagamento ❌' : 'Pagato con Successo ✔' }}
                                        </button>
                                    </h2>
                                    <div id="{{ $loop->index }}" class="accordion-collapse collapse"
                                        data-bs-parent="#{{ $loop->index }}">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="d-flex col-sm-12 col-md-12 col-lg-6 mb-2">
                                                    <div class="fw-bold name me-4">Nome: </div>
                                                    <div>{{ $order->name }}</div>
                                                </div>
                                                <div class="d-flex col-sm-12 col-md-12 col-lg-6  mb-2">
                                                    <div class="fw-bold surname me-4">Cognome: </div>
                                                    <div>{{ $order->surname }}</div>
                                                </div>
                                                <div class="d-flex col-sm-12 col-md-12 col-lg-6  mb-2">
                                                    <div class="fw-bold name me-4">Email: </div>
                                                    <div>{{ $order->email }}</div>
                                                </div>
                                                <div class="d-flex col-sm-12 col-md-12 col-lg-6  mb-2">
                                                    <div class="fw-bold surname me-4">Numero di Telefono: </div>
                                                    <div>{{ $order->telephone }}</div>
                                                </div>
                                                <div class="d-flex col-sm-12 col-md-12 col-lg-6  mb-2">
                                                    <div class="fw-bold address me-4">Indirizzo: </div>
                                                    <div>{{ $order->address }}</div>
                                                </div>
                                                <div class="d-flex col-sm-12 col-md-12 col-lg-6  mb-2">
                                                    <div class="fw-bold paymant_state me-4">Stato Pagamento: </div>
                                                    <div>{{ $order->payment_state == 0 ? '❌' : '✔' }}</div>
                                                </div>
                                                <div class="d-flex col-sm-12 col-md-12 col-lg-6  mb-2">
                                                    <div class="fw-bold products-order me-4">Prodotti Ordinati: </div>
                                                    <div>                                                            
                                                        <ul class="list-unstyled">
                                                        @foreach ($order->products as $product)
                                                            <li>
                                                                <div>{{ $product->name }} (x
                                                                    {{ $product->pivot->quantity }})</div>
                                                            </li>
                                                        @endforeach
                                                    </ul></div>
                                                </div>
                                                <div class="d-flex col-sm-12 col-md-12 col-lg-6  mb-2">
                                                    <div class="fw-bold total-price me-4">Prezzo Totale: </div>
                                                    <div>{{ $order->total_price }} €</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <tr>
                                <td>
                                    <div> {{ $order->id }}</div>
                                </td>
                                <td>
                                    {{ $order->name }}
                                </td>
                                <td>
                                    {{ $order->surname }}
                                </td>
                                <td>
                                    {{ $order->email }}
                                </td>
                                <td>
                                    {{ $order->telephone }}
                                </td>
                                <td>
                                    {{ $order->address }}
                                </td>
                                <td class="text-center">
                                    {{ $order->payment_state == 0 ? '❌' : '✔' }}
                                </td>
                                <td class="col-3">
                                    {{ $order->created_at }}
                                </td>
                                <td class="col-4">
                                    <ul class="list-unstyled">
                                        @foreach ($order->products as $product)
                                            <li>
                                                <div>{{ $product->name }} (x {{ $product->pivot->quantity }})</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <h5>{{ $order->total_price }}€</h5>
                                </td>
                            </tr> --}}
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
    {{-- <button id="test"><a class="text-decoration-none"
        href="{{ route('admin.orders.charts') }}">charts</a></button>
    <script>
        const test = document.getElementById('test')
        test.addEventListener('click', function(){

            console.log({{Js::from($orders)}})
        })
        
    </script> --}}
@endsection
