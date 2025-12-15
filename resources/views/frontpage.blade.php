<!-- resources/views/shop.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Commerce Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-brand { font-size: 1.8rem; display: flex; align-items: center; }
        .navbar-brand img { height: 40px; margin-right: 10px; }
        .product-card { border-radius: 15px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        .product-card img { height: 200px; object-fit: cover; transition: transform 0.3s; }
        .product-card:hover img { transform: scale(1.05); }
        .card-body { text-align: center; }
        .old-price { text-decoration: line-through; color: #888; font-size: 14px; }
        .badge { font-size: 0.85rem; padding: 0.45em 0.7em; }
        .btn-add-cart { margin-top: 10px; border-radius: 25px; padding: 0.5rem 1.2rem; transition: background-color 0.3s; }
        .btn-add-cart:hover { background-color: #dc3545; color: #fff; }
        h3 { font-weight: 700; letter-spacing: 1px; }
        footer { background-color: #343a40; color: #fff; padding: 15px 0; text-align: center; margin-top: 50px; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRI5tzQaIGEvyEzsIv3vUfOG3G7oITGip-9jw&s" alt="Logo">
            MyShop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Product Section -->
<div class="container my-5">
    <h3 class="text-center mb-5">Our Products</h3>

    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card product-card shadow-sm">
                @if($product->getMedia('images')->count())
                    <img src="{{ $product->getMedia('images')->first()->getUrl() }}" class="card-img-top" alt="Product Image">
                @else
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="mb-1">
                        <span class="fw-bold text-danger">${{ $product->price }}</span>
                        @if($product->previous_price)
                            <span class="old-price ms-2">${{ $product->previous_price }}</span>
                        @endif
                    </p>
                    <span class="badge bg-info text-dark">{{ $product->category->name ?? 'Uncategorized' }}</span>
                    <button class="btn btn-outline-danger btn-add-cart d-block mx-auto">Add to Cart</button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">
            <p>No products available.</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Footer -->
<footer>
    Developed by Moutusi Islam
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
