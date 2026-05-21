<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Editar Chamado
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">

            <form method="POST" action="{{ route('chamados.update', $chamado) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1">Assunto</label>
                    <input type="text" name="assunto" value="{{ $chamado->assunto }}" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Descrição</label>
                    <textarea name="descricao" rows="5" class="w-full border rounded p-2" required>{{ $chamado->descricao }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Categoria</label>

                    <select
                        name="categoria"
                        class="w-full border rounded p-2"
                        required
                    >
                        <option value="Suporte Externo"
                            {{ $chamado->categoria == 'Suporte Externo' ? 'selected' : '' }}>
                            Suporte Externo
                        </option>

                        <option value="Correção de Sistema"
                            {{ $chamado->categoria == 'Correção de Sistema' ? 'selected' : '' }}>
                            Correção de Sistema
                        </option>

                        <option value="Implementação"
                            {{ $chamado->categoria == 'Implementação' ? 'selected' : '' }}>
                            Implementação
                        </option>

                        <option value="Melhorias de Sistemas"
                            {{ $chamado->categoria == 'Melhorias de Sistemas' ? 'selected' : '' }}>
                            Melhorias de Sistemas
                        </option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Prioridade</label>
                    <select name="prioridade" class="w-full border rounded p-2" required>
                        <option value="baixa" {{ $chamado->prioridade == 'baixa' ? 'selected' : '' }}>Baixa</option>
                        <option value="media" {{ $chamado->prioridade == 'media' ? 'selected' : '' }}>Média</option>
                        <option value="alta" {{ $chamado->prioridade == 'alta' ? 'selected' : '' }}>Alta</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Status</label>
                    <select name="status" class="w-full border rounded p-2" required>
                        <option value="aberto" @selected($chamado->status == 'aberto')>Aberto</option>
                        <option value="em_andamento" @selected($chamado->status == 'em_andamento')>Em andamento</option>
                        <option value="finalizado" @selected($chamado->status == 'finalizado')>Finalizado</option>
                    </select>
                </div>

                <div class="flex gap-2 mt-4">

    <a
        href="{{ route('chamados.index') }}"
        style="background:#dc2626; color:white; padding:10px 16px; border-radius:6px; font-weight:bold; text-decoration:none;"
    >
        ← Voltar
    </a>

    <button
        type="submit"
        style="background:#2563eb; color:white; padding:10px 16px; border-radius:6px; font-weight:bold; border:none; cursor:pointer;"
    >
        💾 Atualizar Chamado
    </button>

</div>
            </form>

        </div>
    </div>

</x-app-layout>
