<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chamado;
use Illuminate\Http\Request;

class ChamadoApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Chamado::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'assunto' => 'required',
            'descricao' => 'required',
            'categoria' => 'required',
            'prioridade' => 'required|in:baixa,media,alta',
        ]);

        $chamado = Chamado::create([
            'user_id' => 1,
            'assunto' => $request->assunto,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'prioridade' => $request->prioridade,
            'status' => 'aberto',
            'data_abertura' => now(),
        ]);

        return response()->json([
            'message' => 'Chamado criado com sucesso',
            'data' => $chamado
        ], 201);
    }

    public function show(string $id)
    {
        $chamado = Chamado::findOrFail($id);

        return response()->json($chamado);
    }

    public function update(Request $request, string $id)
    {
        $chamado = Chamado::findOrFail($id);

        $chamado->update($request->only([
            'assunto',
            'descricao',
            'categoria',
            'prioridade',
            'status'
        ]));

        return response()->json([
            'message' => 'Chamado atualizado',
            'data' => $chamado
        ]);
    }

    public function destroy(string $id)
    {
        $chamado = Chamado::findOrFail($id);

        $chamado->delete();

        return response()->json([
            'message' => 'Chamado removido com sucesso'
        ]);
    }
}
