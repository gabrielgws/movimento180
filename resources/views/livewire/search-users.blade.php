<!-- Container principal -->
<div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
    <!-- Abas para alternar entre ativos, inativos e todos -->
    <div class="mb-4 flex justify-start gap-2">
        <button wire:click="setTab('active')"
                class="py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90 transition-all {{ $tab === 'active' ? 'bg-yellowMovimento text-black' : 'bg-gray-200' }}">
            Ativos (<span>{{ $totalAtivos }}</span>)
        </button>
        <button wire:click="setTab('inactive')"
                class="py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90 transition-all {{ $tab === 'inactive' ? 'bg-yellowMovimento text-black' : 'bg-gray-200' }}">
            Inativos (<span>{{ $totalInativos }}</span>)
        </button>
    </div>

    <!-- Campo de pesquisa -->
    <div class="mb-4">
        <input wire:model.live="search" type="text"
               class="h-14 w-full rounded-full border border-gray-200 bg-white text-gray-500 px-3 py-4 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento pl-11"
               placeholder="Pesquisar usuários"/>
    </div>

    <!-- Botões para alterar o número de usuários por página -->
    <div class="mb-4 flex gap-2">
        <button wire:click="setPerPage(5)"
                class="py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90 transition-all {{ $perPage == 5 ? 'bg-yellowMovimento text-black' : 'bg-gray-200' }}">
            5 por página
        </button>
        <button wire:click="setPerPage(10)"
                class="py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90 transition-all {{ $perPage == 10 ? 'bg-yellowMovimento text-black' : 'bg-gray-200' }}">
            10 por página
        </button>
        <button wire:click="setPerPage(15)"
                class="py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90 transition-all {{ $perPage == 15 ? 'bg-yellowMovimento text-black' : 'bg-gray-200' }}">
            15 por página
        </button>
    </div>

    <!-- Container da tabela com scroll horizontal -->
    <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 min-w-[1200px]">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nome
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Telefone
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Forma de Pagamento
                        <select wire:model.live="filtroPagamento"
                                class="mt-1 border-solid border-gray-300 rounded-full text-sm">
                            <option value="">Selecione</option>
                            <option value="a_vista">À Vista</option>
                            <option value="dividido">Parcelado</option>
                        </select>
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Pagamento Realizado
                        <select wire:model.live="filtroPagamentoRealizado"
                                class="mt-1 border-solid border-gray-300 rounded-full text-sm">
                            <option value="">Selecione</option>
                            <option value="1">Pago</option>
                            <option value="0">Pendente</option>
                        </select>
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Lote
                        <select wire:model.live="filtroLote"
                                class="mt-1 border-solid border-gray-300 rounded-full text-sm">
                            <option value="">Selecione</option>
                            <option value="lote-1">Lote 1</option>
                            <option value="lote-2">Lote 2</option>
                            <!-- Adicione mais opções de lotes conforme necessário -->
                        </select>
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Carro
                        <select wire:model.live="filtroCarro"
                                class="mt-1 border-solid border-gray-300 rounded-full text-sm">
                            <option value="">Selecione</option>
                            <option value="0">Sim e posso dar carona</option>
                            <option value="1">Sim e não tenho espaço para carona</option>
                            <option value="2">Não e preciso de carona</option>
                            <option value="3">Não, mas já tenho carona</option>
                        </select>
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Adventista
                        <select wire:model.live="filtroAdventista"
                                class="mt-1 border-solid border-gray-300 rounded-full text-sm">
                            <option value="">Selecione</option>
                            <option value="0">Sim, sou batizado</option>
                            <option value="1">Não, sou adventista</option>
                            <option value="2">Sou adventista mas afastado</option>
                            <option value="3">Não sou adventista mas pretendo ser</option>
                            <option value="4">Não sou adventista batizado mas estou sempre envolvido</option>
                            <option value="5">Sou de outra denominação</option>
                        </select>
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Outra Denominação
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Vegetariano
                        <select wire:model.live="filtroVegetariano"
                                class="mt-1 border-solid border-gray-300 rounded-full text-sm">
                            <option value="">Selecione</option>
                            <option value="0">Sim</option>
                            <option value="1">Sim, e vegano.</option>
                            <option value="2">Não</option>
                        </select>
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Data de Cadastro
                        <select wire:model.live="filtroDataCadastro"
                                class="mt-1 border-solid border-gray-300 rounded-full text-sm">
                            <option value="">Selecione</option>
                            <option value="hoje">Hoje</option>
                            <option value="ultima_semana">Última semana</option>
                            <option value="ultimo_mes">Último mês</option>
                            <option value="crescente">De mais antiga para mais nova</option>
                            <option value="decrescente">De mais recente para mais antiga</option>
                        </select>
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($usuarios as $usuario)
                    <tr>
                        <td class="px-2 py-4 whitespace-nowrap">{{ $usuario->retiro2025->nome_completo ?? 'Não informado' }}</td>
                        <td class="px-2 py-4 whitespace-nowrap">{{ $usuario->retiro2025->telefone ?? 'Não informado' }}</td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            @if($usuario->retiro2025)
                                {{ $usuario->retiro2025->forma_pagamento == 'a_vista' ? 'À Vista' : 'Parcelado' }}
                            @else
                                Não informado
                            @endif
                        </td>
                        <td class="px-2 py-4 text-center whitespace-nowrap">
                            @if($usuario->retiro2025 && $usuario->retiro2025->pagamento_realizado)
                                <span>✔</span>
                            @else
                                <span>✖</span>
                            @endif
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">{{ $usuario->retiro2025->lote ?? 'Não informado' }}</td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            @if($usuario->retiro2025)
                                @switch($usuario->retiro2025->carro)
                                    @case(0) Sim e posso dar carona @break
                                    @case(1) Sim e não tenho espaço para carona @break
                                    @case(2) Não e preciso de carona @break
                                    @case(3) Não, mas já tenho carona @break
                                    @default Não informado
                                @endswitch
                            @else
                                Não informado
                            @endif
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            @if($usuario->retiro2025)
                                @switch($usuario->retiro2025->adventista)
                                    @case(0) Sim, sou batizado. @break
                                    @case(1) Não, sou adventista. @break
                                    @case(2) Sou adventista mas afastado. @break
                                    @case(3) Não sou adventista mas pretendo ser. @break
                                    @case(4) Não sou adventista batizado mas estou sempre envolvido. @break
                                    @case(5) Sou de outra denominação. @break
                                    @default Não informado
                                @endswitch
                            @else
                                Não informado
                            @endif
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">{{ $usuario->retiro2025->outra_denominação ?? 'Não informado' }}</td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            @if($usuario->retiro2025)
                                @switch($usuario->retiro2025->vegetariano)
                                    @case(0)
                                        Sim
                                        @break
                                    @case(1)
                                        Sim, e Vegano
                                        @break
                                    @case(2)
                                        Não
                                        @break
                                    @default
                                        Não informado
                                @endswitch
                            @else
                                Não informado
                            @endif
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ optional($usuario->retiro2025->created_at)->format('d/m/Y') ?? 'Não informado' }}
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

    <!-- Paginação -->
    <div class="mt-4">
        {{ $usuarios->links() }}
    </div>

    <!-- Separador -->
    <hr class="my-6 border-t border-gray-300"/>

    <!-- Botão para Download -->
    <div class="flex justify-end mb-4">
        <a href="{{ url('export-users') }}"
           class="border border-gray-300 flex items-center justify-center text-black gap-2 py-2 px-4 rounded-full hover:bg-yellowMovimento hover:text-white hover:border-yellowMovimento transition-all">
            Baixar tabela em Excel
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <defs>
                    <linearGradient id="vscodeIconsFileTypeExcel0" x1="4.494" x2="13.832" y1="-2092.086" y2="-2075.914"
                                    gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#18884f"/>
                        <stop offset=".5" stop-color="#117e43"/>
                        <stop offset="1" stop-color="#0b6631"/>
                    </linearGradient>
                </defs>
                <path fill="#185c37"
                      d="M19.581 15.35L8.512 13.4v14.409A1.19 1.19 0 0 0 9.705 29h19.1A1.19 1.19 0 0 0 30 27.809V22.5Z"/>
                <path fill="#21a366"
                      d="M19.581 3H9.705a1.19 1.19 0 0 0-1.193 1.191V9.5L19.581 16l5.861 1.95L30 16V9.5Z"/>
                <path fill="#107c41" d="M8.512 9.5h11.069V16H8.512Z"/>
                <path d="M16.434 8.2H8.512v16.25h7.922a1.2 1.2 0 0 0 1.194-1.191V9.391A1.2 1.2 0 0 0 16.434 8.2"
                      opacity="0.1"/>
                <path d="M15.783 8.85H8.512V25.1h7.271a1.2 1.2 0 0 0 1.194-1.191V10.041a1.2 1.2 0 0 0-1.194-1.191"
                      opacity="0.2"/>
                <path d="M15.783 8.85H8.512V23.8h7.271a1.2 1.2 0 0 0 1.194-1.191V10.041a1.2 1.2 0 0 0-1.194-1.191"
                      opacity="0.2"/>
                <path d="M15.132 8.85h-6.62V23.8h6.62a1.2 1.2 0 0 0 1.194-1.191V10.041a1.2 1.2 0 0 0-1.194-1.191"
                      opacity="0.2"/>
                <path fill="url(#vscodeIconsFileTypeExcel0)"
                      d="M3.194 8.85h11.938a1.193 1.193 0 0 1 1.194 1.191v11.918a1.193 1.193 0 0 1-1.194 1.191H3.194A1.19 1.19 0 0 1 2 21.959V10.041A1.19 1.19 0 0 1 3.194 8.85"/>
                <path fill="#fff"
                      d="m5.7 19.873l2.511-3.884l-2.3-3.862h1.847L9.013 14.6c.116.234.2.408.238.524h.017q.123-.281.26-.546l1.342-2.447h1.7l-2.359 3.84l2.419 3.905h-1.809l-1.45-2.711A2.4 2.4 0 0 1 9.2 16.8h-.024a1.7 1.7 0 0 1-.168.351l-1.493 2.722Z"/>
                <path fill="#33c481" d="M28.806 3h-9.225v6.5H30V4.191A1.19 1.19 0 0 0 28.806 3"/>
                <path fill="#107c41" d="M19.581 16H30v6.5H19.581Z"/>
            </svg>
        </a>
    </div>

</div>
