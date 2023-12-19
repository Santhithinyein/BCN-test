<!-- resources/views/brochure.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Brochure</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .brochure {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }

        .product {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .product h3 {
            color: #333;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="brochure">
        <h2>Your Order Brochure</h2>
        <p>Dear {{ Auth::user()->name }},</p>
        <p>We are pleased to provide you with a brochure detailing your recent order. Please find the information below:</p>

        @foreach ($user->cart->products as $product)
            <div class="product">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>
                <p>Quantity: {{ $product->pivot->quantity }}</p>
                <p>Total: ${{ $product->price * $product->pivot->quantity }}</p>
            </div>
        @endforeach

        <hr>
        <p>If you have any questions or concerns, please contact our customer support.</p>
        <p>Thank you for choosing our service!</p>
    </div>
</body>
</html>
