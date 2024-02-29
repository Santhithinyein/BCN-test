<!-- resources/views/cart/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container col-10">
        <h3 class="text-center">Your Shopping Cart</h3>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($user->cart)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->cart->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>${{ $product->price }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>${{ $product->price * $product->pivot->quantity }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="/cart/{{$product->id}}/edit">
                                          <button class="btn btn-warning btn-sm me-2">Edit</button>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <form action="/remove/{{$product->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                        </form>
                                    </div>
                                </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                <p class="mx-4">Total Quantity: {{ $user->cart->products->sum('pivot.quantity') }}</p>
                <p>Total Price: ${{ $user->cart->products->sum(function ($product) {
                    return $product->price * $product->pivot->quantity;
                }) }}</p>
            </div>

            <div class="row text-end mt-3">
                @if ($user->cart->products)
                    <form action="/product/confirm-order" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning me-2">Order Confirm</button>
                    </form>      
                @endif
            </div>
            
        @else
            <div class="alert alert-warning" role="alert">
                Your cart is empty. <br>
                Please <a href="/product" class="alert-link" style="text-decoration:none"> add items to your cart </a> before confirming the order.
            </div>
            <div>
                
            <div class="mt-2">
                    <h4>Payment Instructions</h4>
                    <p>Please  scan the QR code for payment and send your payment voucher using the form below.</p>
            </div>
            <!-- Payment Voucher Form -->
            <div class="mt-2">
            <!-- QR Code for Payment -->
                <div class="mt-3 py-2">
                    <h4>Payment QR Code</h4>
                    <img src="/Photo/code.jpg" style="width:250px; height:350px;" alt="QR Code">
                </div>

                <h4>Add Payment Voucher</h4> 
                <form action="/upload-voucher" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="payment_voucher" class="form-label">Upload Payment Voucher</label>
                        <input type="file" class="form-control"  name="voucher" required>
                    </div>

                    @error('voucher')
                    <p class="text-danger">{{$message }}</p>
                    @enderror
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        @endif
    </div>
@endsection
