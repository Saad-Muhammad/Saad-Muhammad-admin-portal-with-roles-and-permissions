<?php
namespace App\Repositories;

use App\Products;
use DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class ProductsRepository
{
    public function createProduct($request)
    {
        try {
            $newImageName = $this->saveImage($request);
            $newImage = null;
            $newImage = $newImageName?$newImageName: null;
        
            $prod = Products::create(array_merge($request->all(),['image' => $newImage]));
            return $prod;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
    
    public function updateProduct($request, $product)
    {
        try {
            $newImageName = $this->saveImage($request);
            $newImage = null;
            $newImage = $newImageName == null? $product->image : $newImageName;
            $prod = $product->update(array_merge($request->all(),['image' => $newImage]));
            return $prod;
        } catch (\Exception $e) {
           dd($e->getMessage());
        }

    }

    private function saveImage($request){
        $newImageName = null;
        //check if file attached
        if($file = $request->file('image')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newImageName = round(microtime(true)).'.'.end($tmp);
            $file->move(storage_path('app\public\products'), $newImageName);
        }
        return $newImageName;
    }
}
