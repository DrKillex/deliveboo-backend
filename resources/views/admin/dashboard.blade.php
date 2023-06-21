@extends('layouts.app')

@section('content')
@if (!$restaurant)
{{-- <div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}

                        
                        
                            @foreach ($restaurant as $res)
                                <div><a href="{{ route('admin.restaurants.show', $res) }}">{{$res->name}}</a></div>
                            @endforeach
                        @else
                            <div><a class="nav-link" href="{{ route('admin.restaurants.create') }}">{{ __('Nuovo Ristorante') }}</a></div>
                        

                
                </div>
            </div>
        </div>
    </div>
</div> --}}
@php
header("Location: " . URL::to('/admin/restaurants/create'), true, 302);
exit();
@endphp
@else
@php
header("Location: " . URL::to('/admin/restaurants/'.$restaurant[0]->slug), true, 302);
exit();
@endphp

@endif
@endsection
