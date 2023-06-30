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

        <div class="container ">
            <div class="row">
                <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data"
                    class="form-input-image">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome ristorante:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Inserisci nome ristorante" required  minlength="1" maxlength="100" value="{{ old('name', $restaurant->name)}}">
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
                            placeholder="Inserisci indirizzo ristorante" required  minlength="1" maxlength="100" value="{{ old('address', $restaurant->address) }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione ristorante:</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $restaurant->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Inserisci numero di telefono:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone"
                            placeholder="Inserisci numero di telefono" required minlength="1" maxlength="100" value="{{ old('telephone', $restaurant->telephone) }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email ristorante:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="inserisci email" required  minlength="1" maxlength="100" value="{{ old('email', $restaurant->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="p_iva" class="form-label">Partita Iva:</label>
                        <input type="text" class="form-control" id="p_iva" name="p_iva"
                            placeholder="Inserisci partita Iva" required  minlength="1" maxlength="100" value="{{ old('p_iva', $restaurant->p_iva) }}">
                    </div>
                    <div class="mb-3">
                        <label for="opening_hours" class="form-label">Orario d'apertura:</label>
                        <input type="text" class="form-control" id="opening_hours" name="opening_hours"
                            placeholder="Inserisci orario d'apertura" value="{{ old('opening_hours', $restaurant->opening_hours) }}" required >
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine ristorante:</label>
                        <input class="form-control" type="file" id="image" name="img" value="{{ old('opening_hours', $restaurant->image) }}">
                    </div>
                    {{-- Image Preview Upload --}}
                    <div class="preview">
                        <img id="file-image-preview">
                    </div>
                    <button class="btn btn-primary">Modifica</button>
                </form>
            </div>

        </div>

@endsection
