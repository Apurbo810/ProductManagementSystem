<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>Product List</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" role="search" method="GET" action="{{ url('/products') }}">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search" value="{{ request('query') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container mt-5">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">

                        <a href="{{ url('/products?sort_by=product_id&sort_order=' . (request('sort_order') == 'asc' ? 'desc' : 'asc')) }}">
                            Product ID
                            @if (request('sort_by') == 'product_id')
                                <span>{{ request('sort_order') == 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </th>
                    <th scope="col">

                        <a href="{{ url('/products?sort_by=name&sort_order=' . (request('sort_order') == 'asc' ? 'desc' : 'asc')) }}">
                            Name
                            @if (request('sort_by') == 'name')
                                <span>{{ request('sort_order') == 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image" width="200">
                        </td>
                        <td>
                            <a href="{{ url('/products/' . $product->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ url('/products/' . $product->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('/products/' . $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="d-flex justify-content-between">
            <a href="{{ url('/products/create') }}" class="btn btn-primary">Create Product</a>
            <div>
                {{ $products->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
