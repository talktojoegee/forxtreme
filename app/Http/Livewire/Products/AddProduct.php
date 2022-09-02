<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    public  $productName, $gallery = [], $productDetails, $size, $color, $price, $category, $productId;
    public $success = false;
    public $error = false;
    protected $rules = [
        'productName'=>'required',
        'productDetails'=>'required',
        'size'=>'required',
        'color'=>'required',
        'price'=>'required',
        'category'=>'required|array',
        'category.*'=>'required',
        'gallery'=>'required|array'
    ];
    protected $messages = [
        "productName.required"=>"Enter a product name",
        "productDetails.required"=>"Enter a brief description for this product",
        "size.required"=>"Choose product size",
        "color.required"=>"What's the color of this product?",
        "price.required"=>"Certainly this is not for FREE. Enter an amount ):",
        "category.required"=>"What's this product category?",
        "gallery.required"=>"Choose product images to upload."
    ];

    public function __construct()
    {
        $this->product = new Product();
        $this->productgallery = new ProductGallery();
        $this->productcategory = new ProductCategory();
    }

    public function render()
    {
        return view('livewire.products.add-product');
    }
    public function updated($requestObj)
    {
        $this->validateOnly($requestObj);
    }

    public function storeProduct(Request $request){
        $validatedData = $this->validate();
        return dd($validatedData);
        $product = $this->product->setLivewireProduct($validatedData);
        $this->productgallery->uploadProductGalleryImages($validatedData['gallery'], $product->id);
        foreach ($validatedData['category'] as $cat){
            $this->productcategory->setProductCategory($product->id, $cat);
        }
        if(!empty($product)){
            $this->success = true;
        }else{
            $this->error = true;
        }
    }
}
