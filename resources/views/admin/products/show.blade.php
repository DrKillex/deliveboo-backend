@extends('layouts.app')

@section('content')
    {{-- validazione errori --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- validazione errori --}}
    <section id="section-create">
        <div class="container">
            <div class="row py-4">
                <h2>Area creazione prodotto del tuo ristorante</h2>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-2">
                <div id="comands_restaurant">
                    <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.dashboard') }}">Torna alla
                            dashboard</a></button>
                </div>
            </div>
            <div class="col-9">
                <div class="h-100 mx-3 my-2 d-flex">
                    <div class="col-3">
                        <img class="img-fluid ms-img"
                            src="{{ asset(!str_starts_with($product->image, 'http') ? 'http://127.0.0.1:8000/storage/' . $product->image : $product->image) }}"
                            alt="{{ $product->name }}">
                    </div>
                    <div class="card-body mx-4">
                        <h4 class="card-title">Nome prodotto: {{ $product->name }}
                        </h4>
                        <h5>Prezzo: {{ $product->price }}€</h5>
                        <p>Descrizione prodotto: {{ $product->description }}</p>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#product{{ $product->id }}">Rimuovi</a>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning"
                            data-bs-target="#product{{ $product->id }}">Modifica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
