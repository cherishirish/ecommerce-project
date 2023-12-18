
@extends('layouts.admin')

    @section('content')

    

    <div id="admin_content">
        <div id="statistics">
            <div class="stat_card stat_card_bg_one text-center shadow">
                <h4 class="text-uppercase mt-4 card-font-color-1">Users</h4>
                <p class="big-font card-font-color-1" id="users-counter">0</p>
            </div>
            <div class="stat_card stat_card_bg_two text-center shadow">
                <h4 class="text-uppercase mt-4 card-font-color-1">Categories</h4>
                <p class="big-font card-font-color-1" id="categories-counter">0</p>
            </div>

            <div class="stat_card stat_card_bg_three text-center shadow">
                <h4 class="text-uppercase mt-4 card-font-color-2">Products</h4>
                <p class="big-font card-font-color-2" id="products-counter">0</p>
            </div>    
            
            <div class="stat_card stat_card_bg_four text-center shadow">
                <h4 class="text-uppercase mt-4 card-font-color-2">Orders</h4>
                <p class="big-font card-font-color-2" id="orders-counter">0</p>
            </div>

        </div>

        <div class="row mt-5 px-5">
            <div class="col-md-6 offset-md-3 text-center">
                <canvas id="myChart"></canvas>
            </div>    
        </div>
        

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Chart.js chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Users', 'Categories', 'Orders', 'Products'],
                datasets: [{
                    label: 'Count',
                    data: [
                        {{ count($customers ?? []) }},
                        {{ count($categories ?? []) }},
                        {{ count($orders ?? []) }},
                        {{ count($products ?? []) }}
                    ],
                    backgroundColor: [
                        'rgba(232, 162, 166)',
                        'rgba(156, 109, 111)',
                        'rgba(196, 137, 140)',
                        'rgba(166, 108, 111)'
                    ],
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

        // Animated Counters
        animateCounter('Users', {{ count($customers ?? []) }}, 'users-counter');
        animateCounter('Categories', {{ count($categories ?? []) }}, 'categories-counter');
        animateCounter('Orders', {{ count($orders ?? []) }}, 'orders-counter');
        animateCounter('Products', {{ count($products ?? []) }}, 'products-counter');

        
    });

    function animateCounter(label, endValue, elementId) {
        let startValue = 0;
        let duration = 2000;

        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            document.getElementById(elementId).innerText = Math.floor(progress * (endValue - startValue) + startValue);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
        
    }

    
</script>

@endsection
