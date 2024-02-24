<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function index(){
        
        $filter =request(['search','category']);
        $products = Product::with('category')
                    ->search($filter)#scope query method
                    ->latest()
                    ->paginate(6)
                    ->withQueryString();
        
         $user = Auth::user();
        if ($user) {
            if ($user->cart) {
                $totalQuantity = $user->cart->products->sum('pivot.quantity');
            } else {
                $totalQuantity = 0;
            }
        } else {
            $totalQuantity = 0;
        }
       

        return view('products.index',[
         'products' => $products,
         'totalQuantity' =>$totalQuantity
        ]);
    }

}
