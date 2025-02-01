<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class retiro extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $status = $request->input('status', 'all'); // Pode ser 'active', 'inactive' ou 'all'
        $search = $request->input('search', ''); // Campo de pesquisa

        $query = User::whereHas('retiro2025');

        // Aplicando filtro de status
        if ($status === 'active') {
            $query->whereHas('retiro2025', function ($q) {
                $q->where('ativo', true);
            });
        } elseif ($status === 'inactive') {
            $query->whereHas('retiro2025', function ($q) {
                $q->where('ativo', false);
            });
        }

        // Aplicando pesquisa se houver
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('retiro2025', function ($q2) use ($search) {
                    $q2->where('nome_completo', 'like', "%$search%")
                        ->orWhere('telefone', 'like', "%$search%")
                        ->orWhere('cpf', 'like', "%$search%")
                        ->orWhere('rg', 'like', "%$search%");
                });
            });
        }

        $usuarios = $query->paginate($perPage);

        return view('pages.retiro.index', compact('usuarios'));
    }


    public
    function edit(User $user)
    {
        return view('pages.retiro.edit', compact('user'));
    }

    public
    function update(Request $request, User $user)
    {
        $request->validate([
            'pagamento_realizado' => 'required|boolean',
            'forma_pagamento' => 'nullable|string',
            'ativo' => 'nullable|boolean',
            'descricao' => 'nullable|string',
            'carro' => 'nullable|in:0,1,2,3,4,5',
            'lote' => 'nullable|string',
        ]);

        $user->retiro2025()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'pagamento_realizado' => $request->pagamento_realizado,
                'forma_pagamento' => $request->forma_pagamento,
                'ativo' => $request->input('ativo'),
                'descricao' => $request->input('descricao'),
                'carro' => $request->input('carro'),
                'lote' => $request->input('lote'),
            ]
        );

        // return redirect()->route('pages.retiro.index')->with('success', 'Informações atualizadas com sucesso.');
        return redirect()->route('pages.retiro.edit', $user->id)
            ->with('success', 'Dados atualizado com sucesso!');

    }
}
