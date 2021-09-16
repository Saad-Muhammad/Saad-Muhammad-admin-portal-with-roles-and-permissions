<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
       /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);

         $this->middleware('permission:product-create', ['only' => ['create','store']]);

         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:product-delete', ['only' => ['destroy']]);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $products = Products::latest()->paginate(10);

        return view('products.index',compact('products'))

            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('products.create');

    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
      
        request()->validate([
            'name' => 'required',
            'image' => ['nullable'],
            'detail' => 'required'
        ]);
        //check if file attached
        $newImageName =null;
        if($file = $request->file('image')){
           $tmp = explode('.', $file->getClientOriginalName());//get client file name
           $name = $file->getClientOriginalName();
           $newImageName = round(microtime(true)).'.'.end($tmp);
           $file->move(storage_path('app\public\products'), $newImageName);
       }

       $newImage = null;
       $newImage = $newImageName?$newImageName: null;

       Products::create(array_merge($request->all(),['image' => $newImage]));
       return redirect()->route('products.index')
                        ->with('success','Products created successfully.');

    }

    

    /**

     * Display the specified resource.

     *

     * @param  \App\Products  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Products $product)
    {
        return view('products.show',compact('product'));
    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Products  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Products $product)

    {

        return view('products.edit',compact('product'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Products  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Products $product)
    {
        // dd($request->file());
         request()->validate([
            'name' => ['required'],
            'detail' => 'required'
        ]);
        $newImageName = null;

         //check if file attached
         if($file = $request->file('image')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $name = $file->getClientOriginalName();
            $newImageName = round(microtime(true)).'.'.end($tmp);
            $file->move(storage_path('app\public\products'), $newImageName);
        }

        $newImage = null;
        $newImage = $newImageName == null? $product->image:$newImageName;
        $product->update(array_merge($request->all(),['image' => $newImage]));

        // $product->update($request->all());
        return redirect()->route('products.index')
                        ->with('success','Products updated successfully');

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Products  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Products $product)
    {
        
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index')
             ->with('success','Products deleted successfully');

    }
}
