@extends('layouts.app')

@section('content')
    <button id="test">aaaaa</button>
    {{-- <script>
        const test = document.getElementById('test')
        test.addEventListener('click', function() {

            console.log({{ Js::from($products) }})
        })
    </script> --}}

    <div>
        <div class="container">
            <div class="row">
                <div>
                    <canvas id="myChart"></canvas>
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
                    ordered += order.pivot.quantity
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
