<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Size extends Model
{
    use HasFactory;


    public function setSize($data){
        $size = new Size();
        $size->size = $data['productSize'];
        $size->save();
    }
    public function updateSize(Request $request){
        $size =  Size::find($request->sizeId);
        $size->size = $request->size;
        $size->save();
    }

    public function getSizes(){
        return Size::all();
    }
}
