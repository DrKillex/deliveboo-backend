@extends('layouts.app')

@section('content')

    {{-- message Notifica--}}
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
    {{-- /message Notifica--}}

    <div class="container">
        <h2 class="my-3 text-center my-5">Nome Ristorante: {{ $restaurant->name }}</h2>
        <div class="row gy-5">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><a class="nav-link"
                                href="{{ route('admin.products.create') }}">{{ __('Nuovo Prodotto') }}</a></h3>
                    </div>
                </div>
            </div>
            @foreach ($products as $product)
                <div class="col-4">
                    <div class="card mx-3">
                        <div>
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a
                                    href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a></h3>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#product{{ $product->id }}">Rimuovi</a>

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
                                Sei sicuro di voler cancellare il prodotto Nome: <strong>{{ $product->name }}</strong>, con id <strong>{{ $product->id }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" id="form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Torna Indietro</button>
                                    <button type="submit" value="elimina" class="btn btn-danger">Rimuovi Prodotto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- pop up warning message --}}

            @endforeach
        </div>
    </div>
@endsection
