@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-unstyled">
            <li>
                <div class="card">
                    <div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="card-body">
                        <h2>Name: {{ $product->name }}</h2>
                        <h3>Price: {{ $product->price }}$</h3>
                        <p>Description: {{ $product->description }}</p>
                        <div class="btn btn-warning">
                            <a href="{{ route('admin.products.edit', $product) }}">edit</a>
                        </div>
                    </div>
                    
                </div>
            </li>
            {{-- <li>
                @foreach ($restaurant->products as $product)
                    <div><a href="{{route('admin.product.show', $product)}}">{{$product->name}}</a></div>
                @endforeach
            </li> --}}
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
