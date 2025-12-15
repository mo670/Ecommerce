<!-- resources/views/products/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

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
        .existing-images img {
            max-width: 100px;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Edit Product</h3>
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

                <!-- Edit Form -->
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="product_name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="product_name" id="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" placeholder="Enter product name" required>
                    </div>

                    <div class="form-group">
                        <label for="product_id">SKU <span class="text-danger">*</span></label>
                        <input type="text" name="product_id" id="product_id" class="form-control" value="{{ old('product_id', $product->product_id) }}" placeholder="Enter SKU" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" placeholder="Enter price" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="previous_price">Previous Price</label>
                            <input type="number" step="0.01" name="previous_price" id="previous_price" class="form-control" value="{{ old('previous_price', $product->previous_price) }}" placeholder="Enter previous price">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="quantity">Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" placeholder="Enter quantity" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alert_quantity">Alert Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="alert_quantity" id="alert_quantity" class="form-control" value="{{ old('alert_quantity', $product->alert_quantity) }}" placeholder="Enter alert quantity" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Existing Images -->
                    @if($product->getMedia('images')->count())
                        <div class="form-group existing-images">
                            <label>Existing Images:</label><br>
                            @foreach($product->getMedia('images') as $image)
                                <img src="{{ $image->getUrl() }}" alt="Product Image">
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="images">Upload New Images</label>
                        <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                        <small class="form-text text-muted">You can upload multiple images. Existing images will remain unless removed in backend.</small>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update Product</button>
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
