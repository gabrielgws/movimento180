<?php

use App\Http\Controllers\ObrigadoController;
use App\Http\Controllers\retiro;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('pages.retiro');
});

Route::get('/dashboard/retiro', [retiro::class, 'index'])->name('pages.retiro.index');


Route::get('/dashboard/retiro/{user}/edit', [retiro::class, 'edit'])->name('pages.retiro.edit');
Route::put('/dashboard/retiro/{user}', [retiro::class, 'update'])->name('pages.retiro.update');


// retiro
Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin/inscricoes', [App\Http\Controllers\Admin\InscricaoController::class, 'index']);
    Route::patch('/admin/inscricoes/{id}', [App\Http\Controllers\Admin\InscricaoController::class, 'update']);
});

// Pagina de obrigado
//Route::get('/obrigado', function () {
//    return view('obrigado');
//})->name('obrigado');

Route::get('/obrigado', ObrigadoController::class)->name('obrigado');


//Testing emails
Route::get('/send-test-email', function () {
    $details = [
        'title' => 'Teste de E-mail - Local',
        'body' => 'Este é um e-mail de teste enviado a partir do Laravel'
    ];

    Mail::raw('Teste de e-mail de Laravel', function ($message) {
        $message->to('gabrielgws.dev@gmail.com')
            ->subject('Teste de E-mail Laravel - Local');
    });

    return 'E-mail enviado com sucesso! - Localmente';
});

// Gereciamento de times
Route::get('/team-invitations/accept/{invitation}', 'TeamInvitationController@accept')
    ->name('accept.team-invitation');


