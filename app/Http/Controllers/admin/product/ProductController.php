<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProductFormRequest;
use App\Models\admin\Category;
use App\Models\admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view ('admin.product.index',[
            "products" => Product::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $product =  new Product();
        $product->fill([
            'title'=>'Sac'
        ]);
        
        return view ('admin.product.form',[
           'product' => $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        //
        $product = Product::create($this->extractData(new Product(), $request));
        
   
        return  to_route('admin.product.index')->with('success', 'Le Product a bien été crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('admin.product.form', [
            'product' => $product,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        //
      
        $product->update($this->extractData($product, $request));
        
        return  to_route('admin.product.index')->with('success', 'Le Product a bien été Modifie');


    }

   private function extractData (Product $product , ProductFormRequest $request ):array
   {
     $data = $request->validated();
        /** @var UploadeadFile|null $image*/
        $image = $request->validated('image');
        if ($image === null || $image->getError()) {
            # code...
            return $data;
        }
        if ($product->image) {
            # code...
            Storage::disk('public')->delete($product->image);
        }
        $data['image']  = $image->store('product','public');
        return $data;
        

   }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        Storage::delete($product->image);
        $product->delete();
        return response()->json(['message' => 'Le Product a été bien supprimer']);
    }
}
