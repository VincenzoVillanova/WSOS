<?php

use App\Http\Controllers\ChefController;
use App\Http\Controllers\RestaurantController;
use App\Models\Chef;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/restaurants/api/findByChef', function (Request $request) {
    $id = request('id');
    $restaurant = Restaurant::where('chef_id', $id)->get();
    $chefs = Chef::all();
    return view("restaurant.list", compact("restaurant", "chefs"));
});


Route::get('/restaurants/api/deleteAllRestaurants', function () {
    $restaurant = Restaurant::query()->delete();
    return redirect("/restaurants");
});

Route::resource("/chefs", ChefController::class);
Route::resource("/restaurants", RestaurantController::class);
