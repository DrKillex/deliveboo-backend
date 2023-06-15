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
        $restaurants = Restaurant::with('category')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);


    }

    public function show(string $slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with('category', 'products')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurant
        ]);
    }

}
