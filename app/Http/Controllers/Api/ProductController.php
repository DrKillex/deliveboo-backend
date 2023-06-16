<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;


use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Index
    public function index()
    {
        $products = Product::all();
        // prendiamo il file index dentro la cartella admin->products usando la dot notation
        return view('admin.products.index', compact('products'));
    }

    // Create
    public function create()
    {
        return view('admin.products.create');
    }

    // Store
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = new Product();
        $product->slug =  Str::slug($data['name']);
        $product->fill($data);
        // immagine
        $product->slug =  Str::slug($data['name']);
        if (isset($data['image'])) {
            $product->image = Storage::put('uploads', $data['image']);
        }
        // immagine
        $product->save(); 
        return redirect()->route('admin.products.index')->with('message', 'Nuovo prodotto aggiunto');
    }

    // Show
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    // Edit
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update
    public function update(UpdateProductRequest $request, Product $product){
        $data = $request->validated();
        $product->slug =  Str::slug($data['name']);
        // immagine
        if (isset($data['image'])) {
            $product->image = Storage::put('uploads', $data['image']);
        }
        // immagine
        $product->update($data);
        return redirect()->route('admin.products.index')->with('message', "Il $product->id prodotto è stato modificato con successo");
    }

    // Destroy
    public function destroy(Product $product)
    {
        $old_id = $product->id;
        // immagine
        if($product->image){
            Storage::delete($product->image);
        }
        $product->delete();
        // immagine
        return redirect()->route('admin.products.index')->with('message', "Il $old_id Prodotto è stato rimosso");
    }
}