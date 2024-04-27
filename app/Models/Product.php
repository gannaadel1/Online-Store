<?php

namespace App\Models;


use App\Models\User;
use App\Models\Image;
use App\Models\Review;
use App\Models\ProductDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function details(){
        return $this->hasOne(ProductDetails::class,'product_id','id');
    }


    public function reviews(){
        return $this->hasMany(Review::class,'id','product_id');
    }

    public function image(){
        return $this->morphOne(Image::class,'imagable');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public static function scopeSearch($query,$word){
        $query->where('title','like','%'.$word.'%')
        ->orWhere('description','like','%'.$word.'%');

    }
}
