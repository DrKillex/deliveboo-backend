<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.restaurant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.restaurant.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        $newRestaurant = new Restaurant();
        $newRestaurant->slug = Str::slug($data['name']);
        if (isset($data['img'])) {
            $newRestaurant->img = Storage::put('uploads', $data['img']);
        }
        $newRestaurant->fill($data);
        $newRestaurant->save();
        if(isset($data['categories'])){
            $newRestaurant->technologies()->sync($data['categories']);
        }
        return redirect()->route('admin.restaurant.show', $newRestaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories=Category::all();
        return view('admin.restaurant.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();
        $restaurant->slug = Str::slug($data['name']);
        if (isset($data['img'])) {
            if($restaurant->img){
                Storage::delete($restaurant->img);
            }
            $restaurant->img = Storage::put('uploads', $data['img']);
        }        
        $categories = isset($data['categories']) ? $data['categories'] : [];
        $restaurant->technologies()->sync($categories);
        $restaurant->update($data);
        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        if($restaurant->img){
            Storage::delete($restaurant->img);
        }
        return to_route('admin.restaurant.index');
    }
}
