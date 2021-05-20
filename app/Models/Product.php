<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'product_slug',
        'product_category',
        'product_name',
        'product_image',
        'product_price',
    ];
    public function product_color()
    {
        return $this->hasMany(ProductColor::class);
    }
}
