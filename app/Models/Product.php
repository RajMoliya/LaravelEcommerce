<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasFactory;
    protected $table = "products";

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'featured',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function findBrand(){
        return $this->belongsTo(Brand::class,'brand','name');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function productColors(){
        return $this->hasMany(ProductColor::class,'product_id','id');
    }
}
