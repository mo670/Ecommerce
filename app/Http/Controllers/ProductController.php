<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index() {
        $products = Product::with('category')->get();
        return view('backend.Product.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('backend.Product.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_id' => 'required|string|unique:products',
            'price' => 'required|numeric',
            'previous_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'alert_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $product = Product::create($request->except('images'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function show(Product $product) {
        $product->load('category', 'media');
        return view('backend.Product.show', compact('product'));
    }

    public function edit(Product $product) {
        $categories = Category::all();
        return view('backend.Product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_id' => 'required|string|unique:products,product_id,'.$product->id,
            'price' => 'required|numeric',
            'previous_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'alert_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $product->update($request->except('images'));

        if ($request->hasFile('images')) {
            $product->clearMediaCollection('images');
            foreach ($request->file('images') as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }


     public function frontpage()
    {
        // Get all products with their category
        $products = Product::with('category')->get();

        // Pass products to the view
        return view('frontpage', compact('products'));
    }
}
