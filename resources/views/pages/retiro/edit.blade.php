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
                        <h2><span class="font-bold">Editando o usuário:</span> {{ $user->name }}, {{ $user->email }}
                        </h2>
                    </div>

                    <!-- Campo: Pagamento Realizado -->
                    <div class="mb-4">
                        <label for="pagamento_realizado" class="block text-sm font-medium text-gray-700 mb-2">Pagamento
                            Realizado</label>
                        <select name="pagamento_realizado" id="pagamento_realizado"
                                class="form-select max-w-fit rounded-full border border-gray-500 bg-white text-gray-500 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento">
                            <option
                                value="1" {{ isset($user->retiro2025) && $user->retiro2025->pagamento_realizado == 1 ? 'selected' : '' }}>
                                Sim
                            </option>
                            <option
                                value="0" {{ isset($user->retiro2025) && ($user->retiro2025->pagamento_realizado == 0 || !isset($user->retiro2025->pagamento_realizado)) ? 'selected' : '' }}>
                                Não
                            </option>
                        </select>
                    </div>

                    <!-- Campo: Forma de Pagamento -->
                    <div class="mb-4">
                        <label for="forma_pagamento" class="block text-sm font-medium text-gray-700 mb-2">Forma de
                            Pagamento</label>
                        <select name="forma_pagamento" id="forma_pagamento"
                                class="form-select w-full max-w-fit rounded-full border border-gray-500 bg-white text-gray-500 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento">
                            <option
                                value="a_vista" {{ isset($user->retiro2025) && $user->retiro2025->forma_pagamento === 'a_vista' ? 'selected' : '' }}>
                                À vista
                            </option>
                            <option
                                value="dividido" {{ isset($user->retiro2025) && $user->retiro2025->forma_pagamento === 'dividido' ? 'selected' : '' }}>
                                Dividido
                            </option>
                        </select>
                    </div>

                    <!-- Campo: Ativo/Inativo -->
                    <div class="mb-4">
                        <label for="ativo" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="ativo" id="ativo"
                                class="form-select w-full max-w-fit rounded-full border border-gray-500 bg-white text-gray-500 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento">
                            <option
                                value="1" {{ isset($user->retiro2025) && $user->retiro2025->ativo == 1 ? 'selected' : '' }}>
                                Ativo
                            </option>
                            <option
                                value="0" {{ isset($user->retiro2025) && $user->retiro2025->ativo == 0 ? 'selected' : '' }}>
                                Inativo
                            </option>
                        </select>
                    </div>

                    <!-- Campo: Carro -->
                    <div class="mb-4">
                        <label for="carro" class="block text-sm font-medium text-gray-700 mb-2">Carro</label>

                        @if(isset($user->retiro2025) && is_null($user->retiro2025->carro))
                            <!-- Caso o valor no banco seja NULL -->
                            <div>
                                <p class="text-sm text-red-500 mb-2">O valor atual está como <strong>Null</strong>. Por
                                    favor, selecione uma opção:</p>
                                <select name="carro" id="carro"
                                        class="form-select w-full max-w-fit rounded-full border border-gray-500 bg-white text-gray-500 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento">
                                    <option value="0">Sim e posso dar carona</option>
                                    <option value="1">Sim e não tenho espaço para carona</option>
                                    <option value="2">Não e preciso de carona</option>
                                    <option value="3">Não, mas já tenho carona</option>
                                </select>
                            </div>
                        @else
                            <!-- Caso o valor já exista -->
                            <div>
                                <select name="carro" id="carro"
                                        class="form-select w-full max-w-fit rounded-full border border-gray-500 bg-white text-gray-500 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento">
                                    <option value="0" {{ $user->retiro2025->carro == 0 ? 'selected' : '' }}>Sim e posso
                                        dar carona
                                    </option>
                                    <option value="1" {{ $user->retiro2025->carro == 1 ? 'selected' : '' }}>Sim e não
                                        tenho espaço para carona
                                    </option>
                                    <option value="2" {{ $user->retiro2025->carro == 2 ? 'selected' : '' }}>Não e
                                        preciso de carona
                                    </option>
                                    <option value="3" {{ $user->retiro2025->carro == 3 ? 'selected' : '' }}>Não, mas já
                                        tenho carona
                                    </option>
                                </select>
                            </div>
                        @endif
                    </div>

                    <!-- Campo: Lote -->
                    <div class="mb-4">
                        <label for="lote" class="block text-sm font-medium text-gray-700 mb-2">Lote</label>
                        <select name="lote" id="lote"
                                class="form-select w-full max-w-fit rounded-full border border-gray-500 bg-white text-gray-500 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento">
                            <option
                                value="lote-1" {{ isset($user->retiro2025) && $user->retiro2025->lote == 'lote-1' ? 'selected' : '' }}>
                                1º Lote
                            </option>
                            <option
                                value="lote-2" {{ isset($user->retiro2025) && $user->retiro2025->lote == 'lote-2' ? 'selected' : '' }}>
                                2º Lote
                            </option>
                        </select>
                    </div>


                    <!-- Campo: Description -->
                    <div class="mb-4">
                        <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-textarea" rows="5">
                            {{ $user->retiro2025->descricao ?? '' }}
                        </textarea>
                    </div>

                    <button type="submit"
                            class="flex gap-1 py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90
                                   bg-yellowMovimento text-black transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-save">
                            <path
                                d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/>
                            <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"/>
                            <path d="M7 3v4a1 1 0 0 0 1 1h7"/>
                        </svg>
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/wii6vpflvguv3sk4mtdzlgb57v560pfkpj63vhtmrjdkhayi/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#descricao',
            plugins: [
                // Core editing features
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                // Your account includes a free trial of TinyMCE premium features
                // Try the most popular premium features until Nov 30, 2024:
                'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
                // Early access to document converters
                'importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                {value: 'First.Name', title: 'First Name'},
                {value: 'Email', title: 'Email'},
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
            exportpdf_converter_options: {
                'format': 'Letter',
                'margin_top': '1in',
                'margin_right': '1in',
                'margin_bottom': '1in',
                'margin_left': '1in'
            },
            exportword_converter_options: {'document': {'size': 'Letter'}},
            importword_converter_options: {
                'formatting': {
                    'styles': 'inline',
                    'resets': 'inline',
                    'defaults': 'inline',
                }
            },
        });
    </script>
</x-app-layout>
