@extends('layouts.app')

@section('content')
    @if ($restaurant)
        <h1>hai gia un ristorante</h1>
    @else

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

        <div class="container">
            <div class="row">
                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data"
                    class="form-input-image">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome ristorante:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Inserisci nome ristorante">
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
                            placeholder="Inserisci indirizzo ristorante">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione ristorante:</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Inserisci numero di telefono:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone"
                            placeholder="Inserisci numero di telefono">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email ristorante:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="inserisci email">
                    </div>
                    <div class="mb-3">
                        <label for="p_iva" class="form-label">Partita Iva:</label>
                        <input type="text" class="form-control" id="p_iva" name="p_iva"
                            placeholder="Inserisci partita Iva">
                    </div>
                    <div class="mb-3">
                        <label for="opening_hours" class="form-label">Orario d'apertura:</label>
                        <input type="text" class="form-control" id="opening_hours" name="opening_hours"
                            placeholder="Inserisci orario d'apertura">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine ristorante:</label>
                        <input class="form-control" type="file" id="image" name="img">
                    </div>
                    {{-- Image Preview Upload --}}
                    <div class="preview">
                        <img id="file-image-preview">
                    </div>
                    <button class="btn btn-primary">Aggiungi</button>
                </form>
            </div>

        </div>
    @endif

@endsection
