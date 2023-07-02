<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;


use App\Models\Product;
use App\Models\Restaurant;
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
        $restaurant_id = auth()->user()->restaurant->id;
        $restaurant = Restaurant::where('id', $restaurant_id)->get();
        $restaurant = $restaurant[0]->slug;
        $data = $request->validated();
        $product = new Product();
        $product->slug =  Str::slug($data['name']);
        $product->restaurant_id = $restaurant_id;
        $product->fill($data);
        // immagine
        $product->slug =  Str::slug($data['name']);
        if (isset($data['image'])) {
            $product->image = Storage::put('uploads', $data['image']);
        }
        if (!isset($data['vegan'])) {
            $product->vegan = 0;
        }
        if (!isset($data['gluten_free'])) {
            $product->gluten_free = 0;
        }
        if (!isset($data['visible'])) {
            $product->visible = 0;
        }
        $product->save(); 
        return redirect()->route('admin.restaurants.show', compact('restaurant'))->with('message', "Nuovo prodotto con [Nome: $product->name] , [Id: $product->id] è stato aggiunto con successo");
    }

    // Show
    public function show(Product $product)
    {
        // $product = Product::orderBy('name')->get();
        return view('admin.products.show', compact('product'));
    }

    // Edit
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update
    public function update(UpdateProductRequest $request, Product $product){
        $restaurant_id = auth()->user()->restaurant->id;
        $restaurant = Restaurant::where('id', $restaurant_id)->get();
        $restaurant = $restaurant[0]->slug;
        $data = $request->validated();
        $product->slug =  Str::slug($data['name']);
        // immagine
        if (isset($data['image'])) {
            if($product->image){
                Storage::delete($product->image);
            }
            $data['image'] = Storage::put('uploads', $data['image']);
            $product->image = $data['image'];
        }
        // immagine

        
        $product->update($data);
        return redirect()->route('admin.restaurants.show', compact('restaurant'))->with('message', "Prodotto con [Nome: $product->name] , [Id: $product->id] è stato modificato con successo");
    }

    // Destroy
    public function destroy(Product $product)
    {
        $restaurant_id = auth()->user()->restaurant->id;
        $restaurant = Restaurant::where('id', $restaurant_id)->get();
        $restaurant = $restaurant[0]->slug;
        $old_id = $product->id;
        // immagine
        if($product->image){
            Storage::delete($product->image);
        }
        $product->delete();
        // immagine
        return redirect()->route('admin.restaurants.show', compact('restaurant'))->with('message', "Il Prodotto [Nome: $product->name] , [Id: $old_id] è stato rimosso con successo");
    }
}