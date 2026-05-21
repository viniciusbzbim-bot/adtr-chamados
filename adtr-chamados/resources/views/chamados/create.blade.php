<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800">
            Novo Chamado
        </h2>
    </x-slot>


    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow rounded p-6">

            <form method="POST" action="{{ route('chamados.store') }}">
                @csrf

                    <div class="mb-4">

                        <label class="block md-1">Assunto</label>

                        <input
                            type="text"
                            name="assunto"
                            class="w-full border rounded p-2"
                            required

                        >

                    </div>

                    <div class="mb-4">

                        <label class="block md-1">Descrição</label>

                        <textarea
                            name="descricao"
                            rows="5"
                            class="w-full border rounded p-2"
                            required

                        ></textarea>

                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Categoria</label>

                        <select
                        name="categoria"
                        class="w-full border rounded p-2"
                        required
                        >
                            <option value="">Selecione</option>

                            <option value="Suporte Externo">
                                Suporte Externo
                            </option>

                            <option value="Correção de Sistema">
                                Correção de Sistema
                            </option>

                            <option value="Implementação">
                                Implementação
                            </option>

                            <option value="Melhorias de Sistemas">
                                Melhorias de Sistemas
                            </option>
                        </select>
                    </div>




                    <div class="mb-4">

                        <label class="block md-1">Prioridade</label>

                        <select
                            name="prioridade"
                            class="w-full border rounded p-2"
                            required

                        >
                            <option value="">Selecione</option>
                            <option value="baixa">Baixa</option>
                            <option value="media">Média</option>
                            <option value="alta">Alta</option>
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
                        style="background:#16a34a; color:white; padding:10px 16px; border-radius:6px; font-weight:bold; border:none; cursor:pointer;"
                        >
                            💾 Salvar
                        </button>

                    </div>

            </form>


        </div>
    </div>
</x-app-layout>
