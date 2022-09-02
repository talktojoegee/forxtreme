<?php

namespace App\Http\Livewire\Products;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductCategory;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    public $success = false, $error = false;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function render()
    {
        return view('livewire.products.show-products',[
            'products'=>Product::paginate(2)
        ]);
    }


}
