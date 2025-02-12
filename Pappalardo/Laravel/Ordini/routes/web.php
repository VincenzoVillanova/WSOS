<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/order/api/serchByOrder', function (Request $request) {
    $id = request('id');
    $order = Order::where('client_id', $id)->get();
    $client = Client::all();
    return view('order.list', compact('order', 'client'));
});

Route::resource('/client', ClientController::class);
Route::resource('/order', OrderController::class);
