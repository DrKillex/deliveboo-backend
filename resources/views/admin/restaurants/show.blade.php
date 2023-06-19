@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-3">Nome Ristorante: {{ $restaurant->name }}</h2>
        <ul class="list-unstyled d-flex">
            <li>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><a class="nav-link" href="{{ route('admin.products.create') }}">{{ __('Nuovo Prodotto') }}</a></h3>
                    </div>
                </div>
            </li>
            @foreach ($restaurant->products as $product)
                <li>
                    <div class="card mx-3">
                        <div>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a
                                    href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a></h3>
                        </div>
                    </div>
                </li>
            @endforeach
            {{-- <!-- <li>
                <h3>type: <a href="@if ($record->type) {{ route('admin.types.show', $record->type) }} @endif">{{ $record->type?->name ?: 'Nessuna tipologia' }}</a></h3>
            </li> -->
            <!-- <li>
                <h3>technology:
                    @forelse ($record->technologies as $tech)
                        <a href="{{ route('admin.technologies.show', $tech) }}">{{ $tech->name}}</a>
                    @empty
                    <span>nessuna tecnologia</span>
                    @endforelse               
                </h3>
            </li>
            <li>creation date: {{ $record->creation_date }}</li>
            <li>description: {{ $record->record_description }}</li>
            <li>completed: {{ $record->completed }}</li>
            @if ($record->image)
                <li>image: <img src="{{$record->image}}" alt=""></li>
            @endif --> --}}
        </ul>
    </div>
@endsection
