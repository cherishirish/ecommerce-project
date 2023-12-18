
    @extends('layouts.admin')

        @section('content')

        

        <div id="admin_content">
            <div id="statistics">
                <div class="stat_card stat_card_bg_one text-center">
                    <h4 class="text-uppercase font-weight-bold">Users</h4>
                    <p class="big-font" id="users-counter">0</p>
                </div>
                <div class="stat_card stat_card_bg_two text-center">
                    <h4 class="text-uppercase">Categories</h4>
                    <p class="big-font" id="categories-counter">0</p>
                </div>

                <div class="stat_card stat_card_bg_three text-center">
                    <h4 class="text-uppercase">Products</h4>
                    <p class="big-font" id="products-counter">0</p>
                </div>    
                
                <div class="stat_card stat_card_bg_four text-center">
                    <h4 class="text-uppercase">Orders</h4>
                    <p class="big-font" id="orders-counter">0</p>
                </div>

            </div>

            <div class="row mt-5 px-5">
                <div class="col-md-6">
                    <canvas id="myChart" width="200" height="80"></canvas>
                </div>
                <div class="col-md-6 pt-3 mx-5 text-center">
                    
                </div>
            </div>
            

        </div>
   
    
    @endsection
