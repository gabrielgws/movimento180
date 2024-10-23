<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Retiro2025;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function index()
    {
        $inscricoes = Retiro2025::with('user')->get();
        return view('admin.inscricoes.index', compact('inscricoes'));
    }

    public function update(Request $request, $id)
    {
        $inscricao = Retiro2025::findOrFail($id);
        $inscricao->pagamento_realizado = $request->input('pagamento_realizado');
        $inscricao->save();

        return back()->with('message', 'Status de pagamento atualizado.');
    }
}
