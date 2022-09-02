<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function getCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function setProductCategory($productId, $categoryId){
        $cat = new ProductCategory();
        $cat->product_id = $productId;
        $cat->category_id = $categoryId;
        $cat->save();
    }
}
