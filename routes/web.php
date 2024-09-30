<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/app', function () {
    return view('app');

});

Route::get('/compras', function () {
    return view('alunos.index');

});

// Rotas de tickets
Route::get('/tickets/comprar', [TicketController::class, 'showPurchasePage'])->name('tickets.comprar');
Route::post('/tickets/comprar', [TicketController::class, 'processPurchase'])->name('tickets.processarCompra');
Route::post('/tickets/validar/{id}', [TicketController::class, 'validatePurchase'])->name('tickets.validar');
Route::get('/tickets/pendentes', [TicketController::class, 'showPendingPurchases'])->name('tickets.pendentes');
Route::resource('tickets', TicketController::class);