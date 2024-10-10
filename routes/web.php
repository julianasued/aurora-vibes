<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    // 
});

Route::middleware(['auth', RoleMiddleware::class . ':pad'])->group(function () {
    // 
});

Route::middleware(['auth', RoleMiddleware::class . ':aluno'])->group(function () {
    // 
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de tickets
    Route::get('/tickets/comprar', [TicketController::class, 'showPurchasePage'])->name('tickets.comprar');
    Route::post('/tickets/comprar', [TicketController::class, 'processPurchase'])->name('tickets.processarCompra');
    Route::post('/tickets/validar/{id}', [TicketController::class, 'validatePurchase'])->name('tickets.validar');
    Route::get('/tickets/pendentes', [TicketController::class, 'showPendingPurchases'])->name('tickets.pendentes');



    Route::get('/tickets/editar/{id}', [TicketController::class, 'editPurchase'])->name('tickets.editar');
    Route::post('/tickets/atualizar-compra/{id}', [TicketController::class, 'updatePurchase'])->name('tickets.atualizar-compra');
    Route::get('/tickets/editar-ticket/{id}', [TicketController::class, 'edit'])->name('tickets.editTicket');
    Route::post('/tickets/atualizar/{id}', [TicketController::class, 'update'])->name('tickets.atualizar');



    Route::get('/tickets/informacoes-pessoais', [TicketController::class, 'showUserTickets'])->name('tickets.informacoes-pessoais');

    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::resource('tickets', TicketController::class);
});

require __DIR__.'/auth.php';

Route::get('/app', function () {
    return view('app');

});

// Route::get('/compras', function () {
//     return view('alunos.index');

// });

