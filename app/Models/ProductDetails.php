<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'size',
        'color',
        'price',
        'product_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
