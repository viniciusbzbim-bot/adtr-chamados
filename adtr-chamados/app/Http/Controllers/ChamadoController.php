<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChamadoController extends Controller
{
    public function index(Request $request)
    {
        $chamados = Chamado::where('user_id', Auth::id())
            ->when($request->busca, fn($query) =>
                $query->where('assunto', 'like', '%' . $request->busca . '%')
            )
            ->when($request->status, fn($query) =>
                $query->where('status', $request->status)
            )
            ->when($request->prioridade, fn($query) =>
                $query->where('prioridade', $request->prioridade)
            )
            ->orderByDesc('data_abertura')
            ->paginate(10);

        return view('chamados.index', compact('chamados'));
    }

    public function create()
    {
        return view('chamados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'assunto' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria' => 'required|string|max:100',
            'prioridade' => 'required|in:baixa,media,alta',
        ]);

        Chamado::create([
            'user_id' => Auth::id(),
            'assunto' => $request->assunto,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'prioridade' => $request->prioridade,
            'status' => 'aberto',
            'data_abertura' => now(),
        ]);

        return redirect()->route('chamados.index')
            ->with('success', 'Chamado criado com sucesso!');
    }

    public function edit(Chamado $chamado)
    {
        return view('chamados.edit', compact('chamado'));
    }

    public function update(Request $request, Chamado $chamado)
    {
        $request->validate([
            'assunto' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria' => 'required|string|max:100',
            'prioridade' => 'required|in:baixa,media,alta',
            'status' => 'required|in:aberto,em_andamento,finalizado',
        ]);

        $chamado->update($request->only([
            'assunto',
            'descricao',
            'categoria',
            'prioridade',
            'status'
        ]));

        return redirect()->route('chamados.index')
            ->with('success', 'Chamado atualizado com sucesso!');
    }

    public function destroy(Chamado $chamado)
    {
        $chamado->delete();

        return redirect()->route('chamados.index')
            ->with('success', 'Chamado removido com sucesso!');
    }
}
