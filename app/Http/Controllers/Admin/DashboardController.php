<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        $restaurant = Restaurant::where('user_id', $user_id)->get();
        if (count($restaurant)==0){
            $restaurant=[];
        };
        return view('admin.dashboard',compact('restaurant'));
    }
}
