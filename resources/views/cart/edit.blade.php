@extends('layouts.app')

@section('content')
     <div class="container col-8">
        <h2 class="text-center my-2">Edit your product</h2>
        <form action="/cart/{{$product->id}}/update" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 form-group">
                <label for="title" class="form-label">Product name</label>
                <input type="text" class="form-control" placeholder="Enter product" 
                 name="title" value="{{$product->name}}">
                @error('title')
                   <p class="text-danger">{{$message }}</p>
                @enderror
           </div>
            
           <div class="mb-3 form-group">
            @foreach ($user->cart->products as $cartProduct)
                @if ($cartProduct->id == $product->id)
                 <input type="number" name="quantity" value="{{ $cartProduct->pivot->quantity }}" min="1">
                @endif
            @endforeach
            @error('quantity')
               <p class="text-danger">{{$message }}</p>
            @enderror
        </div>
            <button type="submit" class="btn btn-primary mt-3" >
                Update
            </button>
        </form>
     </div>
@endsection
