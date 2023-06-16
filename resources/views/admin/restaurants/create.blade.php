@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                    <input type="email" class="form-control" id="email" name="email" placeholder="inserisci email">
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
                <!-- <div class="mb-3">
                        <label for="img" class="form-label">Immagine ristorante:</label>
                        <input class="form-control" type="file" id="img" name="img" ">
                    </div> -->
                <button class="btn btn-primary">Aggiungi</button>
            </form>
        </div>
    </div>
@endsection
