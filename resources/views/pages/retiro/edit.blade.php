<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Editar Usuário - Retiro 2025') }}
</h2>
</x-slot>

<div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{ route('pages.retiro.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <h2><span class="font-bold">Editando o usuário:</span> {{ $user->name  }}, {{ $user->email  }}</h2>
                </div>

                <div class="mb-4">
                    <label for="pagamento_realizado" class="block text-sm font-medium text-gray-700">Pagamento Realizado</label>
                    <select name="pagamento_realizado" id="pagamento_realizado" class="form-select">
                        <option value="1" {{ isset($user->retiro2025) && $user->retiro2025->pagamento_realizado == 1 ? 'selected' : '' }}>Sim</option>
                        <option value="0" {{ isset($user->retiro2025) && ($user->retiro2025->pagamento_realizado == 0 || !isset($user->retiro2025->pagamento_realizado)) ? 'selected' : '' }}>Não</option>
                    </select>
                </div>


                <div class="mb-4">
                    <label for="forma_pagamento" class="block text-sm font-medium text-gray-700">Forma de Pagamento</label>
                    <select name="forma_pagamento" id="forma_pagamento" class="form-select">
                        <option value="a_vista" {{ isset($user->retiro2025) && $user->retiro2025->forma_pagamento === 'a_vista' ? 'selected' : '' }}>À vista</option>
                        <option value="dividido" {{ isset($user->retiro2025) && $user->retiro2025->forma_pagamento === 'dividido' ? 'selected' : '' }}>Dividido</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
