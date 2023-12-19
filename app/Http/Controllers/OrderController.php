<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function comfirm(){
        $user = auth()->user();
        $email = $user->email;
        Mail::to($email)->send(new OrderConfirmation($user));
        $user->cart->products()->detach();
        $user->cart->delete();
        return redirect()->back()->with('success', 'Order confirmed successfully! An email has been sent.');
    }
}
