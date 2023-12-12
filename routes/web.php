<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

Route::get("/",  [Api::class, "searchFlights"])->name('searchFlights');

Route::post("/get-flights", [Api::class, "getFlights"])->name('getFlights');

Route::view('/flights', 'flights')->name('flights');

