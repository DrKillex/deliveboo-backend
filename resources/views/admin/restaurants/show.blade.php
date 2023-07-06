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
            <div class="row justify-content-center">
                <div class="my-2 row justify-content-center">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid rounded w-100 mb-4"
                            src="{{ asset(!str_starts_with($restaurant->img, 'http') ? 'http://127.0.0.1:8000/storage/' . $restaurant->img : $restaurant->img) }}"
                            alt="{{ $restaurant->name }}">

                    </div>
                    <div class="col-sm-12 col-md-8">
                        <h2 class="mx-4 fw-bold">{{ $restaurant->name }}</h2>
                        <p class="mx-4 fw-bold">{{ $restaurant->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-descr">
        <div class="container">
            <div class="row mt-4">
                <div class="text-center">
                    <h3 class="fw-bold">Paronamica del tuo ristorante</h3>
                    <p>
                        Da qui avrai la possibilità di modificare il prodotto o
                        rimuoverlo, cambiare le info del tuo ristorante e tanto altro.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- main --}}
    <main id="main-products">
        <div class="container py-3">
            <div class="titles d-flex justify-content-between">
                {{-- <h3 class=" fw-bold text-white">Utility Buttons</h3>
                <h3 class=" fw-bold text-md-white text-sm-black">Prodotti Ristorante</h3> --}}
            </div>
            <div class="row back-products d-flex justify-content-center">
                {{-- bottoni comandi --}}
                <div id="comands_restaurant"
                    class="col-12 col-sm-12 col-md-3 px-4 py-3 d-flex flex-column align-items-start gap-3">
                    <div class="col-10">
                        <div>
                            <button class="btn ms-btn w-100"><a class="nav-link"
                                    href="{{ route('admin.products.create') }}">Nuovo
                                    Prodotto</a></button>
                        </div>
                    </div>
                    <div class="col-10">
                        <button class="btn ms-btn w-100"><a class="nav-link"
                                href="{{ route('admin.restaurants.edit', $restaurant) }}">Modifica Ristorante</a></button>
                    </div>
                    <div class="col-10">
                        <button class="btn ms-btn w-100"><a class="nav-link"
                                href="{{ route('admin.orders.index') }}">Visualizza
                                Ordini</a></button>
                    </div>
                    <div class="col-10">
                        <button id="test" class="btn ms-btn w-100"><a class="nav-link"
                                href="{{ route('admin.orders.charts') }}">Statistiche Prodotti</a></button>
                    </div>
                </div>
                {{-- /bottoni comandi --}}

                {{-- prodotti --}}
                <div id="section_products" class="col-9 py-3 justify-content-center d-flex">
                    <div class="row gy-5 py-3">
                        @foreach ($products as $product)
                            <div class="col-sm-12 col-md-4">
                                {{-- cards prodotti --}}
                                <div class="card ms-card h-100 mx-3 my-2 d-flex flex-wrap">
                                    <div class="d-flex justify-content-center">
                                        <img class="img-fluid ms-img"
                                            src="{{ asset(!str_starts_with($product->image, 'http') ? 'http://127.0.0.1:8000/storage/' . $product->image : $product->image) }}"
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
                                            <a href="{{ route('admin.products.show', $product) }}"
                                                class="btn btn-sm btn-success my-2"
                                                data-bs-target="#product{{ $product->id }}">Dettaglio</a>




                                        </div>
                                    </div>
                                </div>
                                {{-- cards prodotti --}}

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
                {{-- /prodotti --}}

            </div>


        </div>
    </main>
    {{-- /main --}}

    {{-- footer --}}
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-6">
                    <h5 class="fw-bold">Scarica l'app</h5>
                    <ul class="list-unstyled">
                        <li><a href=""><img src="{{ Vite::asset('resources/img/google-play-download.png') }}"
                                    alt="google-play-download"></a>
                        </li>
                        <li class="mt-1"><a href=""><img
                                    src="{{ Vite::asset('resources/img/appstore-download.png') }}"
                                    alt="app-store-download"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <h5 class="fw-bold">Servizi</h5>
                    <ul class="list-unstyled">
                        <li><a href="">Chi Siamo</a></li>
                        <li><a href="">Contatti</a></li>
                        <li><a href="">Sei un ristorante</a></li>
                        <li><a href="">Domande frequenti</a></li>
                        <li><a href="">Lavora con noi</a></li>
                        <li><a href="">Design</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <h5 class="fw-bold">Termini</h5>
                    <ul class="list-unstyled">
                        <li><a href="">Termini di utilizzo</a></li>
                        <li><a href="">Normativa sulla privacy e sui cookie</a></li>
                        <li><a href="">Consenti i cookie</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Food For All Gift Card</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <h5 class="fw-bold">Social</h5>
                    <p>Seguici su tutti i nostri canali Social</p>
                    {{-- <ul class="social d-flex list-unstyled">
                        <li class="me-2">
                            <i class="fa-brands fa-facebook-f"></i>
                        </li>
                        <li class="me-2">
                            <i class="fa-brands fa-instagram"></i>
                        </li>
                        <li>
                            <i class="fa-brands fa-twitter"></i>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </footer>
    {{-- /footer --}}
@endsection
