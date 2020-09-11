<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    public function parent()
    {
      return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products()
    {
      return $this->hasMany(Product::class);
    }

    public static function parentOrNot($child_id, $parent_id )
    {
      $categories = Category::where('id', $child_id)->where('parent_id', $parent_id);
      if(!is_null($categories)) {
        return true;
      } else {
        return false;
      }
    }

}
