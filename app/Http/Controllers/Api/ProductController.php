<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{

    public function index()
    {
         $products = Product::with('restaurants')->paginate(50);

             return response()->json([
                 'success' => true,
                 'results' => $products
             ]);
    }

    public function show(string $slug)
    {
        $products = Product::where('slug', $slug)->with('restaurants')->get();

            return response()->json([
                'success' => true,
                'results' => $products
            ]);
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $newProduct = new Product();
        $newProduct->slug =  Str::slug($data['name']);
        $newProduct->fill($data);
        $newProduct->save(); 
        return $newProduct;
    }

    public function edit(string $slug)
    {
        $products = Product::where('slug', $slug)->with('restaurants')->get();

        return response()->json([
            'success' => true,
            'results' => $products
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product){
        $data = $request->validated();
        $product->slug =  Str::slug($data['name']);
        $product->update($data);
        return $product;
    }

    public function destroy(Product $product)
    {
        $old_id = $product->id;
        $product->delete();

    }
}