<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getCategories(){
        return Category::orderBy('category_name', 'ASC')->get();
    }

    public function setCategory($data){
        $cat = new Category();
        $cat->category_name = $data['categoryName'];
        $cat->save();
    }
    public function editCategory($data){
        $cat =  Category::find($data['categoryId']);
        $cat->category_name = $data['categoryName'];
        $cat->save();
    }



}
