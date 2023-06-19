@extends('layouts.app')

@section('content')
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
            @foreach ($restaurant->products as $product)
                <div class="col-4">
                    <div class="card mx-3">
                        <div>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a></h3>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" id="form">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="elimina" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
