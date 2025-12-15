<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('content')
<h2>Product Details</h2>
<a href="{{ route('products.index') }}">Back to List</a>

<p><strong>Name:</strong> {{ $product->product_name }}</p>
<p><strong>SKU:</strong> {{ $product->product_id }}</p>
<p><strong>Price:</strong> {{ $product->price }}</p>
<p><strong>Previous Price:</strong> {{ $product->previous_price }}</p>
<p><strong>Quantity:</strong> {{ $product->quantity }}</p>
<p><strong>Alert Quantity:</strong> {{ $product->alert_quantity }}</p>
<p><strong>Category:</strong> {{ $product->category->name }}</p>

<h4>Images</h4>
@foreach($product->getMedia('images') as $image)
    <img src="{{ $image->getUrl() }}" width="100" alt="">
@endforeach
@endsection
