<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>

    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border-radius: 15px;
            margin-top: 50px;
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: 600;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn {
            border-radius: 8px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .alert {
            border-radius: 10px;
            font-size: 0.95rem;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span>Products</span>
                <a href="{{ route('products.create') }}" class="btn btn-light btn-sm">Add New Product</a>
            </div>

            <div class="card-body">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Previous Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $index => $product)
                                <tr class="@if($index % 3 == 0) table-primary
                                           @elseif($index % 3 == 1) table-success
                                           @else table-warning @endif">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}">
                                            {{ $product->product_name }}
                                        </a>
                                    </td>
                                    <td>{{ $product->product_id }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>
                                        @if($product->previous_price)
                                            <del>${{ $product->previous_price }}</del>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm mr-1">Edit</a>
                                         <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm mr-1">show</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">No products found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- /.table-responsive -->
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div> <!-- /.container -->

<!-- Bootstrap 4 JS, Popper.js, jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-+pK3lY+0X1v8ZtvukR8odl/H8aFBpMGv4D38vA2A44N/zRnhUrx2TKhFiXkVd+Iq" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha384-+2pS2yP9D3DFxG4K/I1rPcrQH6RZr3VfM6Y6LZ1qkIv/tstMrL7eDScxCVoCpl/8" crossorigin="anonymous"></script>
</body>
</html>
