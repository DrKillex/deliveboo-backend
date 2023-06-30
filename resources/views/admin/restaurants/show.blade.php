@extends('layouts.app')

@section('content')
    {{-- message Notifica --}}
    @if (session('message'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-info">Notifica</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif
    {{-- /message Notifica --}}
    <div id="title_restaurant" class="py-3">
        <h2 class="my-3 text-center my-5">Nome Ristorante: {{ $restaurant->name }}</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div id="comands_restaurant" class="col-3 py-3 d-flex flex-column align-items-center gap-3">
                <div class="col-7">
                    <div>
                        <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.products.create') }}">Nuovo
                                prodotto</a></button>
                    </div>
                </div>
                <div class="col-7">
                        <button class="btn ms-btn"><a class="nav-link"
                                href="{{ route('admin.restaurants.edit', $restaurant) }}">Modifica ristorante</a></button>
                </div>
                <div class="col-7">
                        <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.orders.index') }}">Visualizza
                                Ordini</a></button>
                </div>
                <div class="col-7">
                    <button id="test" class="btn ms-btn"><a class="nav-link"
                            href="{{ route('admin.orders.charts') }}">charts</a></button>
                </div>
            </div>
            <div id="section_products" class="col-9">
                <div class="row gy-5 py-3">
                    @foreach ($products as $product)
                        <div class="col-3">
                            <div class="card h-100 mx-3 d-flex">
                                <div>
                                    <img class="img-fluid" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="card-body d-flex align-items-end">
                                    <div class=" mt-auto">
                                        <h5 class="card-title"><a id="pdt_name" class="text-decoration-none"
                                                href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a>
                                        </h5>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#product{{ $product->id }}">Rimuovi</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- pop up warning message --}}
                        <div class="modal fade" id="product{{ $product->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Attenzione</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler cancellare il prodotto Nome:
                                        <strong>{{ $product->name }}</strong>, con id
                                        <strong>{{ $product->id }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                            id="form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Torna
                                                Indietro</button>
                                            <button type="submit" value="elimina" class="btn btn-danger">Rimuovi
                                                Prodotto</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- pop up warning message --}}
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
