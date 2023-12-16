<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mail;
use App\Models\User;
use App\Models\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function mail()
    {
        $template_path = 'email_template';
        $order = Order::where('id', session('order'));
        $user = User::where('id', $order->user_id);
        

        Mail::send(['text' => $template_path], function($message){
            $message->to('cheezbrgeryumm@gmail.com', 'Loresa Bueckert')->subject('Giggles Wiggles Order Confirmation');

            $message->from('lbwebdev@outlook.com', 'Giggles Wiggles');
        });

        return view('order/confirmation');
    }
}
