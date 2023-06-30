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

    <section id="title_restaurant" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-auto my-2 d-flex ">
                    <div class="col-4">
                        <img class="img-fluid rounded w-100" src="{{ asset(!str_starts_with($restaurant->img, 'http')? 'http://127.0.0.1:8000/storage/'.$restaurant->img:$restaurant->img) }}"
                            alt="{{ $restaurant->name }}">

                    </div>
                    <div class="col-8">
                        <h2 class="mx-4 fw-bold">{{ $restaurant->name }}</h2>
                        <p class="mx-4 fw-bold">{{ $restaurant->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-descr">
        <div class="container">
            <div class="row py-3">
                <div>
                    <h5>Qui avrai la paronamica del tuo ristorante. Da qui avrai la possibilità di modificare il prodotto o
                        rimuoverlo, cambiare le info del tuo ristorante e tanto altro.</h5>
                </div>

            </div>
        </div>
    </section>
    <section id="main-products">
        <div class="container">

            <div class="row">
                <div id="comands_restaurant" class="col-3 py-3 d-flex flex-column align-items-start gap-3">
                    <div class="col-10">
                        <div>
                            <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.products.create') }}">Nuovo
                                    prodotto</a></button>
                        </div>
                    </div>
                    <div class="col-10">
                        <button class="btn ms-btn"><a class="nav-link"
                                href="{{ route('admin.restaurants.edit', $restaurant) }}">Modifica ristorante</a></button>
                    </div>
                    <div class="col-10">
                        <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.orders.index') }}">Visualizza
                                Ordini</a></button>
                    </div>
                    <div class="col-10">
                        <button id="test" class="btn ms-btn"><a class="nav-link"
                                href="{{ route('admin.orders.charts') }}">Statische prodotti</a></button>
                    </div>
                </div>

                <div id="section_products" class="col-9">
                    <div class="row gy-5 py-3">
                        @foreach ($products as $product)
                            <div class="col-4">

                                <div class="card ms-card h-100 mx-3 my-2 d-flex">
                                    <div>
                                        <img class="img-fluid ms-img" src="{{ asset(!str_starts_with($product->image, 'http')? 'http://127.0.0.1:8000/storage/'.$product->image:$product->image) }}"
                                            alt="{{ $product->name }}">
                                    </div>
                                    <div class="card-body d-flex align-items-end">
                                        <div class=" mt-auto">
                                            <h4 class="card-title">{{ $product->name }}
                                            </h4>
                                            <h5>{{ $product->price }}€</h5>
                                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#product{{ $product->id }}">Rimuovi</a>
                                            <a href="{{ route('admin.products.edit', $product) }}"
                                                class="btn btn-sm btn-warning"
                                                data-bs-target="#product{{ $product->id }}">Modifica</a>


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

                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Torna

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
    </section>
@endsection
