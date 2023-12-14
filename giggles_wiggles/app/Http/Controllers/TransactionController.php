<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pacewdd\_5bx;

class TransactionController extends Controller
{

    public function transaction()
    {
        $transaction = new _5bx(BX_LOGIN_ID, BX_API_KEY);
        $transaction->amount(5.99);
        $transaction->card_num(4111111111111111);
        $transaction->exp_date ('0418');
        $transaction->cvv(333);
        $transaction->ref_num('2011099');
        $transaction->card_type('visa');
    
        $response = $transaction->authorize_and_capture();
    
        var_dump($response);
    }

    
}
