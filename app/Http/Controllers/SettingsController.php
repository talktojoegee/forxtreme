<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(){
        $this->color = new Color();
        $this->size = new Size();
        $this->category = new Category();
    }

    public function showColors(){
        return view('colors');
    }
    public function showSizes(){
        return view('sizes');
    }

    public function showCategories(){
        return view('categories');
    }
}
