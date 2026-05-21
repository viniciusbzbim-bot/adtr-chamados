<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Chamados
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a
            href="{{ route('chamados.create') }}"
            class="inline-block bg-gray-800 hover:bg-gray-900 text-white font-semibold px-4 py-2 rounded shadow"
        >
            Novo Chamado
        </a>

        <form method="GET" class="mt-4 flex gap-2">
            <input name="busca" placeholder="Buscar assunto" class="border rounded p-2" value="{{ request('busca') }}">

            <select name="status" class="border rounded p-2">
                <option value="" disabled selected>Status</option>
                <option value="aberto">Aberto</option>
                <option value="em_andamento">Em andamento</option>
                <option value="finalizado">Finalizado</option>
            </select>

            <select name="prioridade" class="border rounded p-2" style="width: 140px;">
                <option value="" disabled selected>Prioridade</option>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>

            <button class="bg-gray-800 text-white px-4 rounded">
                Filtrar
            </button>
        </form>

        <div class="mt-4 bg-white shadow rounded overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-3 text-center">Assunto</th>
                        <th class="px-4 py-3 text-center">Descrição</th>
                        <th class="px-4 py-3 text-center">Categoria</th>
                        <th class="px-4 py-3 text-center">Prioridade</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Abertura do chamado</th>
                        <th class="px-4 py-3 text-center">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($chamados as $chamado)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 text-center align-middle font-semibold">
                                {{ $chamado->assunto }}
                            </td>

                            <td class="px-4 py-3 text-center align-middle">
                                {{ $chamado->descricao }}
                            </td>

                            <td class="px-4 py-3 text-center align-middle">
                                {{ $chamado->categoria }}
                            </td>

                            <td class="px-4 py-3 text-center align-middle">
                                @if($chamado->prioridade == 'alta')
                                    <span class="badge badge-red">Alta</span>
                                @elseif($chamado->prioridade == 'media')
                                    <span class="badge badge-yellow">Média</span>
                                @else
                                    <span class="badge badge-green">Baixa</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-center align-middle">
                                @if($chamado->status == 'aberto')
                                    <span class="badge badge-blue">Aberto</span>
                                @elseif($chamado->status == 'em_andamento')
                                    <span class="badge badge-yellow">Em andamento</span>
                                @else
                                    <span class="badge badge-green">Finalizado</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-center align-middle">
                                {{ \Carbon\Carbon::parse($chamado->data_abertura)->format('d/m/Y H:i') }}
                            </td>

                            <td class="px-4 py-3 text-center align-middle">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('chamados.edit', $chamado) }}" class="text-blue-600 hover:underline">
                                        Editar
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('chamados.destroy', $chamado) }}"
                                        onsubmit="confirmarExclusao(event, this)"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-red-600 hover:underline">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $chamados->links() }}
            </div>
        </div>
    </div>

    <style>
        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .badge-red {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-yellow {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-green {
            background: #dcfce7;
            color: #166534;
        }

        .badge-blue {
            background: #dbeafe;
            color: #1e40af;
        }
    </style>

    <script>
        function confirmarExclusao(event, form) {
            event.preventDefault();

            Swal.fire({
                title: 'Tem certeza que deseja excluir?',
                text: 'Ao excluir não será possível recuperar!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#dc2626',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
</x-app-layout>
