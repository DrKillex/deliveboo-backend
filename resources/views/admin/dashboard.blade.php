@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
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

                        
                        @if ($restaurant)
                            @foreach ($restaurant as $res)
                                <div><a href="{{ route('admin.restaurants.show', $res) }}">{{$res->name}}</a></div>
                            @endforeach
                        @else
                            <div><a class="nav-link" href="{{ route('admin.restaurants.create') }}">{{ __('Nuovo Ristorante') }}</a></div>
                        @endif

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
