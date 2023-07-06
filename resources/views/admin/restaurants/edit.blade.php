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
                <h2>Area modifica informazioni del tuo ristorante</h2>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row py-3">
            <div class="col-12 mx-auto col-sm-12 col-md-3 mb-4">
                <div id="comands_restaurant">
                    <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.dashboard') }}">Torna alla
                            dashboard</a></button>
                </div>
            </div>
            <div class="col-12 mx-auto col-sm-12 col-md-9">
                <form id="create-product" action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST"
                    enctype="multipart/form-data" class="form-input-image">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome ristorante:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Inserisci nome ristorante" required minlength="1" maxlength="100"
                            value="{{ old('name', $restaurant->name) }}">
                    </div>
                    @foreach ($categories as $category)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="category" value="{{ $category->id }}"
                                name="categories[]" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="category">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo ristorante:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Inserisci indirizzo ristorante" required minlength="1" maxlength="100"
                            value="{{ old('address', $restaurant->address) }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione ristorante:</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $restaurant->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Inserisci numero di telefono:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone"
                            placeholder="Inserisci numero di telefono" required minlength="1" maxlength="100"
                            value="{{ old('telephone', $restaurant->telephone) }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email ristorante:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="inserisci email" required minlength="1" maxlength="100"
                            value="{{ old('email', $restaurant->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="p_iva" class="form-label">Partita Iva:</label>
                        <input type="text" class="form-control" id="p_iva" name="p_iva"
                            placeholder="Inserisci partita Iva" required minlength="1" maxlength="100"
                            value="{{ old('p_iva', $restaurant->p_iva) }}">
                    </div>
                    <div class="mb-3">
                        <label for="opening_hours" class="form-label">Orario d'apertura:</label>
                        <input type="text" class="form-control" id="opening_hours" name="opening_hours"
                            placeholder="Inserisci orario d'apertura"
                            value="{{ old('opening_hours', $restaurant->opening_hours) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine ristorante:</label>
                        <input class="form-control" type="file" id="image" name="img"
                            value="{{ old('img', $restaurant->img) }}">
                    </div>
                     {{-- Image Preview Upload --}}
                    <div>
                        <img style="width: 400px" id="file-image-preview" class="img-fluid @if ($restaurant->img) mt-4 mb-3 @endif"
                            @if ($restaurant->img) src="{{ asset(!str_starts_with($restaurant->img, 'http') ? 'http://127.0.0.1:8000/storage/' . $restaurant->img : $restaurant->img) }}" @endif>
                    </div>
                   
                    <div id="comands_restaurant">
                        <button type="submit" class="btn ms-btn mt-3">Modifica</button>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>

@endsection
