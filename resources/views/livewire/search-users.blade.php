<div class="py-12 max-w-7xl mx-auto sm:px-2 lg:px-8">
    <!-- Abas para alternar entre ativos e inativos -->
    <div class="mb-4 flex justify-start gap-2">
        <button wire:click="setTab('active')"
                class="py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90 transition-all {{ $tab === 'active' ? 'bg-yellowMovimento text-black' : 'bg-gray-200' }}">
            Ativos
        </button>
        <button wire:click="setTab('inactive')"
                class="py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90 transition-all {{ $tab === 'inactive' ? 'bg-yellowMovimento text-black' : 'bg-gray-200' }}">
            Inativos
        </button>
    </div>

    <!-- Campo de pesquisa -->
    <div class="mb-4">
        <div class="relative z-0 w-full mb-4 group flex justify-end">
            <div class="relative rounded-[5px] max-w-[400px] w-full flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-search pointer-events-none absolute left-3 text-gray-500 ml-1">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.3-4.3"/>
                </svg>

                <input wire:model.live="search" type="text"
                       class="h-14 w-full rounded-full border border-gray-200 bg-white text-gray-500 px-3 py-4 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento pl-11"
                       placeholder="Search by name or email"/>
            </div>
        </div>
    </div>
    <!-- Campo de pesquisa -->

    <!-- Tabela de usuários -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nome
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descrição
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Contato
                    </th>
                    <th class="px-2 w-12 text-center py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Pagamento Realizado
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Data de <br>cadastro
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Lote
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ações
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($usuarios as $usuario)
                    <tr>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $usuario->name }}
                            {!! Str::limit(strip_tags($usuario->name ?? ''), 1) !!}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {!! Str::limit(strip_tags($usuario->retiro2025->descricao ?? ''), 30) !!}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $usuario->retiro2025 ? $usuario->retiro2025->telefone : 'N/A' }}
                        </td>
                        <td class="px-2 text-center py-4 whitespace-nowrap">
                            @if($usuario->retiro2025 && $usuario->retiro2025->pagamento_realizado)
                                <span class="text-green-500">✔</span>
                            @else
                                <span class="text-red-500">✖</span>
                            @endif
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $usuario->retiro2025 ? $usuario->retiro2025->created_at->format('d/m/Y') : '' }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            @if($usuario->retiro2025)
                                @if($usuario->retiro2025->lote === "lote-1")
                                    1º Lote
                                @elseif($usuario->retiro2025->lote === 'lote-2')
                                    2º Lote
                                @endif
                            @endif
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <a href="{{ route('pages.retiro.edit', $usuario->id) }}"
                               class="text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-pencil w-full text-center hover:text-yellowMovimento transition-all">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
