<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Image;

class ProductGallery extends Model
{
    use HasFactory;

    public function uploadProductGalleryImages($data, $productId){
        if($data->hasFile('gallery'))
        {
            foreach($data->file('gallery') as $file)
            {
                $image = Image::make($file);
                $extension = $file->extension();
                $dir = 'assets/products/';
                $galleryName = '_' . uniqid() . '_' . time() . '.' . $extension;
                $image->save(public_path($dir.$galleryName));
                $gallery = new ProductGallery();
                $gallery->product_image = $galleryName;
                $gallery->product_id = $productId;
                $gallery->save();
            }
        }
    }

    public function deleteImage($imageId, $productId){
        $image = ProductGallery::where('id', $imageId)->first();
        $path = 'assets/products/';
        if(!empty($image)){
            $imagePath = $path.$image->product_image;
            if(File::exists($imagePath)){
                File::delete($imagePath);
            }
            $image->delete();
            return true;
        }else{
            return false;
        }
    }
}
