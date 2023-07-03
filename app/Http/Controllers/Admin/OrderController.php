<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $item=[];
        $restaurant = auth()->user()->restaurant;
        // $products = Product::where('restaurant_id', $restaurant->id)->with('orders')->get();
        // // dd($products);
        // // dd($products[0]->orders);
        // foreach($products as $product){
        //    $item[]=$product->id;
        // }
        // // dd($item);
        // $orders=Order::with('products')->wherePivot('product_id', $item)->get();
        // dd($orders);
        // $orders=Order::with('products', 'restaurant')->get();
        $orders=Order::whereHas('products', function($query) use ($restaurant){
            $query->where('restaurant_id', $restaurant->id);
        })->with('products')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders', 'restaurant'));
    }

    public function charts(){
        $restaurant = auth()->user()->restaurant;
        $products = Product::where('restaurant_id', $restaurant->id)->with('orders')->get();
        return view('admin.orders.charts', compact('products', 'restaurant'));
    }
}
