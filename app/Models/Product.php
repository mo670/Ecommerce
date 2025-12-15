<?php


// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'product_name',
        'product_id',
        'price',
        'previous_price',
        'quantity',
        'alert_quantity',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

