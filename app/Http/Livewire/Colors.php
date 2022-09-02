<?php

namespace App\Http\Livewire;

use App\Models\Color;
use Livewire\Component;

class Colors extends Component
{
    public $success = false;
    public $error = false;
    public $colorCode;
    protected $rules = [
        'colorCode'=>'required',
    ];
    protected $messages = [
        "colorCode.required"=>"Choose a color",
    ];

    public function __construct()
    {
        $this->color = new Color();
    }
    public function updated($requestObj)
    {
        $this->validateOnly($requestObj);
    }


    public function render()
    {
        return view('livewire.colors', [
            'colors'=>$this->color->getColors()
        ]);
    }

    public function storeColor(){
        $validatedData = $this->validate();
        $color = $this->color->setColor($validatedData);
        if(!empty($color)){
            $this->success = true;
        }else{
            $this->error = true;
        }
    }
}
