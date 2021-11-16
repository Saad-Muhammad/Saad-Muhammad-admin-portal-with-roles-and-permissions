<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Products;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class ProductsController extends Controller
{

    private $productRepository;

       /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct(ProductsRepository $productRepository)

    {
         $this->productRepository = $productRepository;

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

    public function store(ProductRequest $request)
    {
       $stored = $this->productRepository->createProduct($request);
       if ($stored) {
        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
       } else {
        return redirect()->route('products.index')
            ->with('danger','Product could not be created.');
       }
       
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

    public function update(ProductRequest $request, Products $product)
    {
        // dd($request->file())
        $updated = $this->productRepository->updateProduct($request, $product);

        if ($updated) {
            return redirect()->route('products.index')
            ->with('success','Product updated successfully');
        } else {
            return redirect()->route('products.index')
            ->with('danger','Product could not be Updated.');
        }
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
