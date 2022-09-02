<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Color extends Model
{
    use HasFactory;

    public function setColor($data){
        $color = new Color();
        $color->color_code = $data['colorCode'];
        $color->save();
    }
    public function updateColor(Request $request){
        $color =  Color::find($request->colorId);
        $color->color_code = $request->colorCode;
        $color->save();
    }

    public function getColors(){
        return Color::all();
    }
}
