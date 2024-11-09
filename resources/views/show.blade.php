<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>

    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image" width="200">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ $product->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Product ID: {{ $product->product_id }}</li>
              <li class="list-group-item">Price: ${{ number_format($product->price, 2) }}</li>
              <li class="list-group-item">Stock: {{ $product->stock }}</li>
            </ul>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ url('/products') }}" class="btn btn-primary">All Product</a>
        <div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
