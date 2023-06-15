<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{

    public function index()
    {
        // 

    }

    public function show(string $slug)
    {
        // 

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
}