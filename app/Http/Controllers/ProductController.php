<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        $this->product = new Product();
        $this->productgallery = new ProductGallery();
        $this->productcategory = new ProductCategory();
        $this->color = new Color();
        $this->sizes = new Size();
        $this->category = new Category();
    }

    public function showAddProductForm(){
        return 'Hello';
        return view('add-product',[
            'colors'=>$this->color->getColors(),
            'sizes'=>$this->sizes->getSizes(),
            'categories'=>$this->category->getCategories(),
        ]);
    }

    public function storeProduct(Request $request){
        $this->validate($request, [
            'productName'=>'required',
            'productDetails'=>'required',
            'size'=>'required',
            'color'=>'required',
            'price'=>'required',
            'category'=>'required|array',
            'category.*'=>'required',
            'gallery'=>'required|array'
        ],[
            "productName.required"=>"Enter a product name",
            "productDetails.required"=>"Enter a brief description for this product",
            "size.required"=>"Choose product size",
            "color.required"=>"What's the color of this product?",
            "price.required"=>"Certainly this is not for FREE. Enter an amount ):",
            "category.required"=>"What's this product category?",
            "gallery.required"=>"Choose product images to upload."
        ]);
        $product = $this->product->setProduct($request);
        $this->productgallery->uploadProductGalleryImages($request, $product->id);
        foreach ($request->category as $cat){
            $this->productcategory->setProductCategory($product->id, $cat);
        }
        session()->flash("success", "New product added!");
        return back();

    }
}
