<!-- resources/views/products/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>

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
        .alert {
            border-radius: 10px;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Add New Product</h3>
            </div>
            <div class="card-body">
                <!-- Back Button -->
                <div class="mb-3">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>

                <!-- Validation Errors -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Product Form -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="product_name" id="product_name" class="form-control" value="{{ old('product_name') }}" placeholder="Enter product name" required>
                    </div>

                    <div class="form-group">
                        <label for="product_id">SKU <span class="text-danger">*</span></label>
                        <input type="text" name="product_id" id="product_id" class="form-control" value="{{ old('product_id') }}" placeholder="Enter SKU" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price') }}" placeholder="Enter price" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="previous_price">Previous Price</label>
                            <input type="number" step="0.01" name="previous_price" id="previous_price" class="form-control" value="{{ old('previous_price') }}" placeholder="Enter previous price">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="quantity">Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" placeholder="Enter quantity" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alert_quantity">Alert Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="alert_quantity" id="alert_quantity" class="form-control" value="{{ old('alert_quantity') }}" placeholder="Enter alert quantity" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="images">Product Images</label>
                        <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                        <small class="form-text text-muted">You can upload multiple images.</small>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 4 JS, Popper.js, jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
