<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        // $restaurants = Restaurant::all()->paginate(5);
        $restaurants = Restaurant::with('categories')->get();

        if($restaurants){
            return response()->json([
                'success' => true,
                'results' => $restaurants
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }


    }

    public function show(string $slug)
    {

        $restaurants = Restaurant::where('slug', $slug)->with('categories', 'products')->get();

        if($restaurants){
            return response()->json([
                'success' => true,
                'results' => $restaurants
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }

    }

}
