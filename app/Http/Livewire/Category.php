<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category as Cat;
class Category extends Component
{


    public $success = false;
    public $error = false;
    public $categoryName;
    public $categoryId;
    protected $rules = [
        'categoryName'=>'required',
    ];
    protected $messages = [
        "categoryName.required"=>"Enter category name",
    ];

    public function __construct()
    {
        $this->category = new Cat();
    }

    public function render()
    {
        return view('livewire.category',[
            'categories'=>$this->category->getCategories()
        ]);
    }
    public function updated($requestObj)
    {
        $this->validateOnly($requestObj);
    }


    public function storeCategory(){
        $validatedData = $this->validate();
        $categoryResult = $this->category->setCategory($validatedData);
        $this->categoryName = "";
        if(!empty($categoryResult)){
            $this->success = true;

        }else{
            $this->error = true;
        }
    }
    public function editCategory(){
        $validatedData = $this->validate();
        $categoryResult = $this->category->editCategory($validatedData);
        $this->categoryName = "";
        if(!empty($categoryResult)){
            $this->success = true;

        }else{
            $this->error = true;
        }
    }
}
