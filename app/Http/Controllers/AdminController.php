<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
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
            'products' => Product::with('category')->latest()->paginate(10) //15
        ]);
    }

    public function cat_index()
    {
        return view('category.index', [
            'categories' => Category::get() //15
        ]);
    }


    public function create()
    {
        return view('admin.create', [
            'categories' => Category::all()
        ]);
    }
    public function cat_create()
    {
        return view('category.create', [
           
        ]);
    }

    public function store(ProductFormRequest $request)
    {
        $cleanData = $request->validated();
        // $cleanData['user_id'] = auth()->id();
        $path = '/storage/'.$cleanData['image']->store('products','public');
        $cleanData['image'] =$path;
        Product::create($cleanData);
        return redirect('/admin');
    }
    public function cat_store(CategoryFormRequest $request)
    {
        $cleanData = $request->validated();
        // $cleanData['user_id'] = auth()->id();
        
        Category::create($cleanData);
        return redirect('/admin/categories');
    }

    public function edit(Product $product)
    {
        return view('admin.edit', [
            'categories' => Category::all(),
            'product' => $product
        ]);
    }
    public function cat_edit(Category $category)
    {
        return view('category.edit', [            
            'category' => $category
        ]);
    }

    public function update(Product $product, ProductFormRequest $request)
    {
        $cleanData = $request->validated();
        

        if (request('image')) {
            $cleanData['image'] = '/storage/'.$cleanData['image']->store('products','public');
            File::delete(public_path($product->image));
        }

        $product->update($cleanData);
        return redirect('/admin');
    }
    public function cat_update(Category $category, CategoryFormRequest $request)
    {
        $cleanData = $request->validated();   

        

        $category->update($cleanData);
        return redirect('/admin/categories');
    }



    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
    public function cat_destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
