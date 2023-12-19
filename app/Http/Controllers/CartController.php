<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  

    public function addToCart( Product $product){ 
        $user = Auth::user();
        $product = Product::find($product->id);
        $quantity = request('quantity');
        
        if ($user->cart) {
            $cart = $user->cart; 
        } else {
            $cart = new Cart();
            $user->cart()->save($cart); 
        }
        
        // At this point, $cart should not be null
        $existingRecord = $cart->products()
            ->where('product_id', $product->id)->first();
        
        if ($existingRecord) {
            $newQuantity = $existingRecord->pivot->quantity + $quantity;
            $cart->products()->updateExistingPivot($product, ['quantity' => $newQuantity]);
        } else {
            $cart->products()->attach($product, ['quantity' => $quantity]);
        }
        
        return redirect()->back()->with('success', 'Product added to the cart');
}


    public function viewCart()
    {    
        $user = User::with('cart')->find(Auth::id());
        return view('cart.index',[
            'user' =>$user
        ]); 
    }

   
    public function removeFromCart(Product $product)
    {
        // Add logic to remove the product from the cart
        $productId =$product->id;
        auth()->user()->cart->products()->detach($productId);
        return redirect()->back()->with('success', 'Product removed from cart.');
    }


    public function edit(Product $product){
        $user = User::with('cart')->find(Auth::id());
        return view('cart.edit',[
            'user' =>$user,
            'product' => $product
        ]);
    }
   public function update(Product $product){
        $id = $product->id; // Assuming you're passing the product_id in the request
        $user = auth()->user();
        $cart = $user->cart;
        if ($cart) {
            $cart->products()->updateExistingPivot($id, ['quantity' => request('quantity')]);
        } 
    return redirect('/view');
   }
}



