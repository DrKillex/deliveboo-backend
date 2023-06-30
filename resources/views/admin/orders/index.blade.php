@extends('layouts.app')

@section('content')
<div id="title_restaurant" class="py-3">
    <div class="container">
        <div class="row">
            <h3 class="mt-3">{{ $restaurant->name }}</h3>
        </div>
    </div>
</div>
    <div class="container">
        <div class="mt-3">
            <h4>Qui avrai a disposizione la paronamica degli ordini ricevuti</h4>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead id="title-table">
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
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
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
                                {{ $order->payment_state }}
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
