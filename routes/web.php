<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ticket;



Route::get('/', function () {
    return view('app');
});

Route::resource('tickets', Ticket::class);