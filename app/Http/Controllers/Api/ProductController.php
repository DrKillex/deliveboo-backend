<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    // public function index($id){

    //     $products = Product::where('restaurant_id', $id)->get();

    //         if($products) {
    //             return response()->json([
    //                 'success' => true,
    //                 'results' => $products
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'results' => null
    //             ], 404);
    //         }
    // }

    // public function show($id){

    //     $products = Product::where('id', $id)->get();

    //     if($products) {
    //         return response()->json([
    //             'success' => true,
    //             'results' => $products
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'results' => null
    //         ], 404);
    //     }
    // }

    public function getMenu($slug){
        $restaurant = Restaurant::where('slug', $slug)->first();        
        $products = Product::where('restaurant_id', $restaurant->id)->with('restaurant')->get();
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
