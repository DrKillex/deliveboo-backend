<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){

        $products = Product::all();

            if($products) {
                return response()->json([
                    'success' => true,
                    'results' => $products
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'results' => null
                ], 404);
            }
    }

    public function show($id){

        $products = Product::where('id', $id)->get();

        if($products) {
            return response()->json([
                'success' => true,
                'results' => $products
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }
}
