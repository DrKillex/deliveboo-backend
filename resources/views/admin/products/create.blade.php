@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inserisci i dati</h1>

    <form action="{{ route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome prodotto</label>
            <input type="text" class="form-control" id="name" value="{{ old('name')}}" >
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione prodotto</label>
            <textarea class="form-control" id="description" rows="3">{{ old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" v-model="formData.price">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input class="form-control" type="file" id="image" value="{{ old('image')}}">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gluten-free">
            <label class="form-check-label" for="gluten-free" value="{{ old('gluten-free')}}">
                Gluten Free
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="vegan">
            <label class="form-check-label" for="vegan" value="{{ old('vegan')}}">
                Vegan
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Invia</button>

    </form>
</div>
@endsection


