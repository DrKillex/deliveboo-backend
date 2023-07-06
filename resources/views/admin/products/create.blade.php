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
    <section class="container">
        <div class="row mt-4">
            <div class="col-12 mx-auto col-sm-12 col-md-3 mb-4">
                <div id="comands_restaurant">
                    <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.dashboard') }}">Torna alla
                            dashboard</a></button>
                </div>
            </div>
            <div class="col-12 mx-auto col-sm-12 col-md-9">


                <form id="create-product" action="{{ route('admin.products.store') }}" method="POST"
                    enctype="multipart/form-data" class="form-input-image">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome prodotto:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                            required minlength="1" maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione prodotto:</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo:</label>
                        <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}"
                            step="0.01" min="0.00" max="99.99">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine:</label>
                        <input class="form-control" name="image" type="file" id="image" value="{{ old('image') }}"
                            required>
                    </div>
                    <div class="gluten-free mb-3">
                        <h4>Prodotto senza glutine</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="gluten_free" id="gluten-free"
                                value="1" {{ old('gluten_free') ? 'checked' : '' }}>
                            <label class="form-check-label" for="gluten_free">
                                Gluten Free
                            </label>
                        </div>
                    </div>

                    <div class="vegan mb-3">
                        <h4>Prodotto vegano</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="vegan" id="vegan" value="1"
                                {{ old('vegan') ? 'checked' : '' }}>
                            <label class="form-check-label" for="vegan">
                                Vegan
                            </label>
                        </div>
                    </div>

                    <div class="visible mb-3">
                        <h4>Visibilità prodotto Menù Ristorante</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="visible" id="visible" value="1"
                                {{ old('visible') ? 'checked' : '' }}>
                            <label class="form-check-label" for="visible">
                                visible
                            </label>
                        </div>
                    </div>


                    {{-- Image Preview Upload --}}
                    <div class="preview">
                        <img id="file-image-preview" style="width: 400px">
                    </div>
                    <div id="comands_restaurant">
                        <button type="submit" class="btn ms-btn mt-3">Aggiungi</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
