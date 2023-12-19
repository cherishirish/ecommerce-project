
    @extends('layouts.admin')

        @section('content')

        

        <div id="admin_content">
            <div id="statistics">
                <div class="stat_card stat_card_bg_one text-center">
                    <h4 class="text-uppercase font-weight-bold">Users</h4>
                    <p class="big-font">{{count($customers)}}</p>
                </div>
                <div class="stat_card stat_card_bg_two text-center">
                    <h4 class="text-uppercase">Categories</h4>
                    <p class="big-font">{{ count($categories) }}</p>
                </div>

                <div class="stat_card stat_card_bg_three text-center">
                    <h4 class="text-uppercase">Orders</h4>
                    <p class="big-font">{{ count($orders) }}</p>
                </div>

                <div class="stat_card stat_card_bg_four text-center">
                    <h4 class="text-uppercase">Products</h4>
                    <p class="big-font">{{ count($products) }}</p>
                </div>                

            </div>
        </div>
    </div>
    
    
    @endsection
