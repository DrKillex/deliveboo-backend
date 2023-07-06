@extends('layouts.app')

@section('content')
    {{-- <script>
        const test = document.getElementById('test')
        test.addEventListener('click', function() {

            console.log({{ Js::from($products) }})
        })
    </script> --}}
    <div id="title_restaurant" class="py-3">
        <div class="container">
            <div class="row">
                <h3 class="mt-3 fw-bold">Statistiche prodotti</h3>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row">
            <h3 class="mt-3">Statische prodotti</h3>
            <p>Qui sarà possibile visualizzare la quantità per ogni prodotto ordinato</p>
        </div>
    </div> --}}
    <div>
        <div class="container">
            <div class="row">
                <div class="mt-3">
                    
                </div>
                <div class="col-12 mx-auto col-sm-12 col-md-3 mb-4">
                    <div id="comands_restaurant">
                        <button class="btn ms-btn"><a class="nav-link" href="{{ route('admin.dashboard') }}">Torna alla
                                dashboard</a></button>
                    </div>
                </div>
                <div class="col-12 mx-auto col-sm-12 col-md-9">
                    <h4 class="px-5">Qui sarà possibile visualizzare la quantità per ogni prodotto ordinato.</h4>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');
            const products = {{ Js::from($products) }};
            console.log(products)
            const productsName = products.map(product => product.name)
            // console.log(productsName)

            const productsOrder = products.map(product => {
                let ordered = 0;
                product.orders.forEach(order => {
                    if(order.payment_state===1){
                        ordered += order.pivot.quantity
                    }
                    
                });
                return ordered;
            })

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: productsName,
                    datasets: [{
                        label: 'N of Orders',
                        data: productsOrder,
                        borderWidth: 1
                    }]

                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
@endsection
