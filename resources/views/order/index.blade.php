<!-- orders.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container">
        <h1>Orders List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <!-- <th>Order Date</th> -->
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{  $loop->iteration  }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <!-- <td>{{ $order->created_at->toDateString() }}</td> -->
                        <td>${{ number_format($order->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
