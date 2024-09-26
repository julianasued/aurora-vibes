<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ticket;



Route::get('/', function () {
    return view('app');

});

Route::get('/compras', function () {
    return view('alunos.index');

});

Route::resource('tickets', Ticket::class);