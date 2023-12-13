
    
    @extends('layouts.admin')

        @section('content')

        

        <div id="admin_content">
            <div id="statistics">
                <div id="stat_card_one" class="stat_card">
                    <h2>User Amount</h2>
                    <h3>Admin:</h3>
                    <p>{{count($admin)}}</p>
                    <h3>Customers:</h3>
                    <p>{{count($customers)}}</p>
                </div>
                <div id="stat_card_one" class="stat_card">

                </div>
                <div id="stat_card_one" class="stat_card">

                </div>
                <div id="stat_card_one" class="stat_card">

                </div>
            </div>
        </div>
    </div>
    
    @endsection
