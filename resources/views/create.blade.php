<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>Create Product</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ url('/products') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="product_id" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="product_id" name="product_id" required>
            </div>

            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="name" required>
            </div>

            <div class="mb-3">
                <label for="productDescription" class="form-label">Describe your product</label>
                <textarea class="form-control" id="productDescription" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="productPrice" name="price" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="productQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="productQuantity" name="stock">
            </div>

            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="productImage" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="{{ url('/products') }}" class="btn btn-primary">All Product</a>
        </form>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
