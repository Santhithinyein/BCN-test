<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function comfirm(){
        $user = auth()->user();

        $email = $user->email;
        Mail::to($email)->send(new OrderConfirmation($user));
    
       
        $cartItems = $user->cart->products;

        foreach ($cartItems as $cartItem) {  
            $product = Product::find($cartItem->id);
              
            $existingOrder = $user->orders()->where('product_id', $cartItem->id)->first();

        if ($existingOrder) {
            $existingOrder->quantity += $cartItem->pivot->quantity;
            $existingOrder->total_price = $existingOrder->product->price * $existingOrder->quantity;
            $existingOrder->save();
        } else {
            $order = new Order();
            $order->user_id = $user->id;
            $order->product_id = $cartItem->id;
            $order->quantity = $cartItem->pivot->quantity;
            // Calculate total price
            $product = Product::find($cartItem->id);
            $order->total_price = $product->price * $order->quantity;
            $order->save();
        }


            $product->quantity -= $cartItem->pivot->quantity;
            $product->save();
        }
    
        // Clear user's cart
        $user->cart->products()->detach();
        $user->cart->delete();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Order confirmed successfully! An email has been sent.');
    }

   public function orders(){
     $orders = Order::all();
     return view('order.index',[
        'orders'=>$orders
     ]);
   }
}
