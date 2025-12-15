<!-- resources/views/categories/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>

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
        label {
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Create Category
            </div>
            <div class="card-body">
                <!-- Success Message -->
               

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Create Form -->
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 4 JS, Popper.js, jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-+pK3lY+0X1v8ZtvukR8odl/H8aFBpMGv4D38vA2A44N/zRnhUrx2TKhFiXkVd+Iq" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha384-+2pS2yP9D3DFxG4K/I1rPcrQH6RZr3VfM6Y6LZ1qkIv/tstMrL7eDScxCVoCpl/8" crossorigin="anonymous"></script>
</body>
</html>
