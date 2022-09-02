<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    public function getProductImage(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public function getProductCategories(){
        return $this->hasMany(ProductCategory::class, 'product_id');
    }

    public function getColor(){
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function setProduct(Request $request){
        $product = new Product();
        $product->product_name = $request->productName;
        $product->product_details = $request->productDetails;
        $product->color_id = $request->color;
        $product->size_id = $request->size;
        $product->price = $request->price;
        $product->slug = Str::slug($request->productName)."-".Str::random(8);
        $product->save();
        return $product;
    }
    public function setLivewireProduct($data){
        $product = new Product();
        $product->product_name = $data['productName'];
        $product->product_details = $data['productDetails'];
        $product->color_id = $data['color'];
        $product->size_id = $data['size'];
        $product->price = $data['price'];
        $product->slug = Str::slug($data['productName'])."-".Str::random(8);
        $product->save();
        return $product;
    }
    public function updateProduct(Request $request){
        $product =  Product::find($request->productId);
        $product->product_name = $request->productName;
        $product->product_details = $request->productDetails;
        $product->color_id = $request->color;
        $product->size_id = $request->size;
        $product->price = $request->price;
        $product->slug = Str::slug($request->productName)."-".Str::random(8);
        $product->save();
        return $product;
    }


    public function getProducts(){
        return Product::orderBy('id', 'DESC')->paginate(10);
    }

    public function getFeaturedProductImage($productId){
        return ProductGallery::where('product_id', $productId)->first();
    }
}
