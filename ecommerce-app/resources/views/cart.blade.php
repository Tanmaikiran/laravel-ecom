<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f9f9f9;
        }
        h1, h3 {
            color: #333;
        }
        .cart-item {
            background: white;
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            display: flex;
            gap: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
        .details {
            flex: 1;
        }
        .total {
            font-size: 20px;
            margin-top: 20px;
            color: #222;
            font-weight: bold;
        }
        .remove-btn {
            background: #dc3545;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .nav-btn {
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px 16px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    @include('header')

    <h1>Your Shopping Cart 🛒</h1>

    @if (count($cart) > 0)
        @foreach ($cart as $index => $item)
            <div class="cart-item">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                <div class="details">
                    <h3>{{ $item['name'] }}</h3>
                    <p>Price: ₹{{ $item['price'] }}</p>

                    <form action="/remove-from-cart" method="POST">
                        @csrf
                        <input type="hidden" name="index" value="{{ $index }}">
                        <button class="remove-btn">Remove</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="total">
            Total: ₹{{ $total }}
        </div>
    @else
        <p>Your cart is currently empty.</p>
    @endif

    <br>
    <a class="nav-btn" href="/">← Continue Shopping</a>
@include('footer')
</body>
</html>
