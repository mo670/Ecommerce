<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Commerce Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .product-card img {
            height: 200px;
            object-fit: cover;
        }
        .old-price {
            text-decoration: line-through;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- 🔹 Header / Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">MyShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
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

<!-- 🔹 Product Section -->
<div class="container my-5">
    <h3 class="text-center mb-4">Our Products</h3>

    <div class="row g-4">

        <!-- Product Card 1 -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card product-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Wireless Headphone</h5>
                    <p class="mb-1">
                        <span class="fw-bold text-danger">$80</span>
                        <span class="old-price ms-2">$100</span>
                    </p>
                    <span class="badge bg-info text-dark">Electronics</span>
                </div>
            </div>
        </div>

        <!-- Product Card 2 -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card product-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Smart Watch</h5>
                    <p class="mb-1">
                        <span class="fw-bold text-danger">$120</span>
                        <span class="old-price ms-2">$150</span>
                    </p>
                    <span class="badge bg-success">Accessories</span>
                </div>
            </div>
        </div>

        <!-- Product Card 3 -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card product-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Running Shoes</h5>
                    <p class="mb-1">
                        <span class="fw-bold text-danger">$65</span>
                        <span class="old-price ms-2">$90</span>
                    </p>
                    <span class="badge bg-warning text-dark">Footwear</span>
                </div>
            </div>
        </div>

        <!-- Product Card 4 -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card product-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Backpack</h5>
                    <p class="mb-1">
                        <span class="fw-bold text-danger">$45</span>
                        <span class="old-price ms-2">$60</span>
                    </p>
                    <span class="badge bg-primary">Bags</span>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
