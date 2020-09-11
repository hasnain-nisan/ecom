<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductImage;
use App\Brand;
use App\Category;

class Product extends Model
{
    public function images()
    {
      return $this->hasMany(ProductImage::class);
    }

    public function brand()
    {
      return $this->belongsTo(Brand::class);
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }
}
