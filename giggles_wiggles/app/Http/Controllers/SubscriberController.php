<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $valid=$request->validate([
            'email' => 'required|email',
        ]);

        $subscriber = Subscriber::create($valid);

        $subscriber->save();

        return redirect(route('home'))->with('success', 'You have successfully subscribed for our newsletter!');
    }
}
