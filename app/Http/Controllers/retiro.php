<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class retiro extends Controller
{

    public function index()
    {
        $user = auth()->user();

        if ($user->role === 0) {
            $usuarios = User::whereHas('retiro2025')->get();
            return view('pages.retiro.index', compact('usuarios'));
        } else {
            $usuarios = User::whereHas('retiro2025')->get();
            return view('pages.retiro.index', compact('usuarios'));
        }
    }


    public function edit(User $user)
    {
        return view('pages.retiro.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'pagamento_realizado' => 'required|boolean',
            'forma_pagamento' => 'nullable|string',
        ]);

        $user->retiro2025()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'pagamento_realizado' => $request->pagamento_realizado,
                'forma_pagamento' => $request->forma_pagamento,
            ]
        );

        return redirect()->route('pages.retiro.index')->with('success', 'Informações atualizadas com sucesso.');
    }
}
