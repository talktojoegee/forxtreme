<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;

class Sizes extends Component
{
    public $success = false;
    public $error = false;
    public $productSize;
    protected $rules = [
        'productSize'=>'required',
    ];
    protected $messages = [
        "productSize.required"=>"Enter product size",
    ];

    public function __construct()
    {
        $this->psize = new Size();
    }
    public function updated($requestObj)
    {
        $this->validateOnly($requestObj);
    }


    public function render()
    {
        return view('livewire.sizes', [
            'sizes'=>$this->psize->getSizes()
        ]);
    }

    public function storeSize(){
        $validatedData = $this->validate();
        $sizeResult = $this->psize->setSize($validatedData);
        if(!empty($sizeResult)){
            $this->success = true;
        }else{
            $this->error = true;
        }
    }
}
