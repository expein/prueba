<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/searchFlights",  [Controller::class, "searchFlights"]);

Route::post("/getFlights", [Api::class, "getFlights"])->name('getFlights');

Route::view('/flights', 'flights')->name('flights');

