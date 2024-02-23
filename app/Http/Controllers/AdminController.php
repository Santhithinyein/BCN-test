<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'products' => Product::with('category')->latest()->paginate(5) //15
        ]);
    }


    public function create()
    {
        return view('admin.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(ProductFormRequest $request)
    {
        $cleanData = $request->validated();
       
        // $cleanData['user_id'] = auth()->id();
        $cleanData['image'] = '/storage/' . request('image')->store('/products');
        Product::create($cleanData);
        return redirect('/admin');
    }

    public function edit(Product $product)
    {
        return view('admin.edit', [
            'categories' => Category::all(),
            'product' => $product
        ]);
    }
    public function update(Product $product, ProductFormRequest $request)
    {
        $cleanData = $request->validated();
        

        if (request('image')) {
            $cleanData['image'] = '/storage/' . request('image')->store('/products');
            File::delete(public_path($product->image));
        }

        $product->update($cleanData);
        return redirect('/admin');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
