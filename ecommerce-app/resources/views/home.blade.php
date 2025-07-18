<!DOCTYPE html>
<html>
<head>
    <title>My Furniture Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            width: 250px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
        }
        button {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    @include('header')

    <h1>Welcome to My Furniture Store 🪑</h1>
    <div class="container">

        <!-- Product 1 -->
        <div class="product">
            <form action="/add-to-cart" method="POST">
                @csrf
                <input type="hidden" name="name" value="Elegant Chair">
                <input type="hidden" name="price" value="1299">
                <input type="hidden" name="image" value="https://www.nilkamalfurniture.com/cdn/shop/files/1_1_1024x1024.jpg?v=1692176235">
                <img src="https://www.nilkamalfurniture.com/cdn/shop/files/1_1_1024x1024.jpg?v=1692176235" alt="Chair">
                <h3>Elegant Chair</h3>
                <p>₹1,299</p>
                <button type="submit">Add to Cart</button>
            </form>
        </div>

        <!-- Product 2 -->
        <div class="product">
            <form action="/add-to-cart" method="POST">
                @csrf
                <input type="hidden" name="name" value="Wooden Table">
                <input type="hidden" name="price" value="2999">
                <input type="hidden" name="image" value="https://www.nilkamalfurniture.com/cdn/shop/files/1_17_1024x1024.jpg?v=1692176297">
                <img src="https://www.nilkamalfurniture.com/cdn/shop/files/1_17_1024x1024.jpg?v=1692176297" alt="Table">
                <h3>Wooden Table</h3>
                <p>₹2,999</p>
                <button type="submit">Add to Cart</button>
            </form>
        </div>

        <!-- Product 3 -->
        <div class="product">
            <form action="/add-to-cart" method="POST">
                @csrf
                <input type="hidden" name="name" value="Comfy Sofa">
                <input type="hidden" name="price" value="5499">
                <input type="hidden" name="image" value="https://www.nilkamalfurniture.com/cdn/shop/files/1_9_1024x1024.jpg?v=1692176271">
                <img src="https://www.nilkamalfurniture.com/cdn/shop/files/1_9_1024x1024.jpg?v=1692176271" alt="Sofa">
                <h3>Comfy Sofa</h3>
                <p>₹5,499</p>
                <button type="submit">Add to Cart</button>
            </form>
        </div>

    </div>
    @include('footer')

</body>
</html>
