<div class="px-5">
    <div class="flex justify-center w-full mb-10">
        <img
            src="{{ asset('images/capa-formulario.svg') }}"
            alt=""
            srcset=""
            class=""
            width="450"
        >
    </div>


    <form wire:submit.prevent="submit" class="max-w-[500px] w-full">
        <!-- Nome Completo -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-user pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>

                <input wire:model="nome_completo" type="text" id="nome_completo"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="Seu nome completo" required/>
            </div>

            @error('nome_completo') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- Telefone -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-phone pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>

                <input wire:model="telefone" type="text" id="telefone"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="Seu telefone ( com DDD )" required/>
            </div>

            @error('telefone') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- Data de Nascimento -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-calendar pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path d="M8 2v4"/>
                    <path d="M16 2v4"/>
                    <rect width="18" height="18" x="3" y="4" rx="2"/>
                    <path d="M3 10h18"/>
                </svg>

                <input wire:model="birthday" type="text" id="birthday"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="Data de nascimento (abaixo de 16 anos apenas com responsável legal)" required/>
            </div>

            @error('birthday') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- CPF -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-fingerprint pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path d="M12 10a2 2 0 0 0-2 2c0 1.02-.1 2.51-.26 4"/>
                    <path d="M14 13.12c0 2.38 0 6.38-1 8.88"/>
                    <path d="M17.29 21.02c.12-.6.43-2.3.5-3.02"/>
                    <path d="M2 12a10 10 0 0 1 18-6"/>
                    <path d="M2 16h.01"/>
                    <path d="M21.8 16c.2-2 .131-5.354 0-6"/>
                    <path d="M5 19.5C5.5 18 6 15 6 12a6 6 0 0 1 .34-2"/>
                    <path d="M8.65 22c.21-.66.45-1.32.57-2"/>
                    <path d="M9 6.8a6 6 0 0 1 9 5.2v2"/>
                </svg>

                <input wire:model="cpf" type="text" id="cpf"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="CPF" required/>
            </div>

            @error('cpf') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- RG -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-id-card pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path d="M16 10h2"/>
                    <path d="M16 14h2"/>
                    <path d="M6.17 15a3 3 0 0 1 5.66 0"/>
                    <circle cx="9" cy="11" r="2"/>
                    <rect x="2" y="5" width="20" height="14" rx="2"/>
                </svg>

                <input wire:model="rg" type="text" id="rg"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="RG" required/>
            </div>

            @error('rg') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- Adventista -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-church pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path d="M10 9h4"/>
                    <path d="M12 7v5"/>
                    <path d="M14 22v-4a2 2 0 0 0-4 0v4"/>
                    <path
                        d="M18 22V5.618a1 1 0 0 0-.553-.894l-4.553-2.277a2 2 0 0 0-1.788 0L6.553 4.724A1 1 0 0 0 6 5.618V22"/>
                    <path
                        d="m18 7 3.447 1.724a1 1 0 0 1 .553.894V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.618a1 1 0 0 1 .553-.894L6 7"/>
                </svg>

                <select wire:model="adventista" id="adventista"
                        class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                        required >
                    <option value="">Você é adventista?</option>
                    <option value="0">Sim, sou batizado.</option>
                    <option value="1">Não sou adventista.</option>
                    <option value="2">Sou adventista mas afastado.</option>
                    <option value="3">Não sou adventista mas pretendo ser.</option>
                    <option value="4">Não sou
                        adventista batizado mas estou sempre envolvido em programas e eventos.
                    </option>
                    <option value="5">Sou de outra denominação.</option>
                </select>
            </div>


            @error('adventista') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- Bairro/Igreja -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-church pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path d="M10 9h4"/>
                    <path d="M12 7v5"/>
                    <path d="M14 22v-4a2 2 0 0 0-4 0v4"/>
                    <path
                        d="M18 22V5.618a1 1 0 0 0-.553-.894l-4.553-2.277a2 2 0 0 0-1.788 0L6.553 4.724A1 1 0 0 0 6 5.618V22"/>
                    <path
                        d="m18 7 3.447 1.724a1 1 0 0 1 .553.894V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.618a1 1 0 0 1 .553-.894L6 7"/>
                </svg>

                <input wire:model="bairro_igreja" type="text" id="bairro_igreja"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="Se adventista, qual o bairro e cidade da sua igreja?"/>
            </div>

            @error('bairro_igreja') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- Outra denominacao -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"
                     class="lucide lucide-cross pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <rect width="256" height="256" fill="none"/>
                    <path fill="currentColor"
                          d="M200 76h-44V32a12 12 0 0 0-12-12h-32a12 12 0 0 0-12 12v44H56a12 12 0 0 0-12 12v32a12 12 0 0 0 12 12h44v92a12 12 0 0 0 12 12h32a12 12 0 0 0 12-12v-92h44a12 12 0 0 0 12-12V88a12 12 0 0 0-12-12m4 44a4 4 0 0 1-4 4h-48a4 4 0 0 0-4 4v96a4 4 0 0 1-4 4h-32a4 4 0 0 1-4-4v-96a4 4 0 0 0-4-4H56a4 4 0 0 1-4-4V88a4 4 0 0 1 4-4h48a4 4 0 0 0 4-4V32a4 4 0 0 1 4-4h32a4 4 0 0 1 4 4v48a4 4 0 0 0 4 4h48a4 4 0 0 1 4 4Z"/>
                </svg>

                <input wire:model="outra_denominação" type="text" id="outra_denominação"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="Se de outra denominação, qual seria? ( Batista, Presbiteriano, Metodista, Católico, etc...)"/>
            </div>

            @error('bairro_igreja') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- Vegetariano -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-salad pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path d="M7 21h10"/>
                    <path d="M12 21a9 9 0 0 0 9-9H3a9 9 0 0 0 9 9Z"/>
                    <path
                        d="M11.38 12a2.4 2.4 0 0 1-.4-4.77 2.4 2.4 0 0 1 3.2-2.77 2.4 2.4 0 0 1 3.47-.63 2.4 2.4 0 0 1 3.37 3.37 2.4 2.4 0 0 1-1.1 3.7 2.51 2.51 0 0 1 .03 1.1"/>
                    <path d="m13 12 4-4"/>
                    <path d="M10.9 7.25A3.99 3.99 0 0 0 4 10c0 .73.2 1.41.54 2"/>
                </svg>

                <select wire:model="vegetariano" id="vegetariano"
                        class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11" required>
                    <option value="">Você é Vegetariano?</option>
                    <option value="0">Sim</option>
                    <option value="1">Sim e Vegano</option>
                    <option value="2">Não</option>
                </select>
            </div>

            @error('vegetariano') <span class="text-redCustom text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Forma de Pagamento -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-landmark pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <line x1="3" x2="21" y1="22" y2="22"/>
                    <line x1="6" x2="6" y1="18" y2="11"/>
                    <line x1="10" x2="10" y1="18" y2="11"/>
                    <line x1="14" x2="14" y1="18" y2="11"/>
                    <line x1="18" x2="18" y1="18" y2="11"/>
                    <polygon points="12 2 20 7 4 7"/>
                </svg>

                <select wire:model="forma_pagamento" id="forma_pagamento"
                        class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                        required >
                    <option value="">Forma de Pagamento</option>
                    <option value="a_vista">À vista</option>
                    <option value="dividido">Dividido</option>
                </select>
            </div>

            @error('forma_pagamento') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- Expectativa para o Retiro 180º -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-mic pointer-events-none absolute left-3 h-5 w-5 text-white ml-1 top-[18px]">
                    <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"/>
                    <path d="M19 10v2a7 7 0 0 1-14 0v-2"/>
                    <line x1="12" x2="12" y1="19" y2="22"/>
                </svg>

                <textarea wire:model="expectativa_retiro" id="expectativa_retiro"
                          class="w-full rounded-3xl border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                          placeholder="O que você espera encontrar no Retiro 180º?!"
                          rows="4"></textarea>
            </div>

            @error('expectativa_retiro') <span class="text-redCustom text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- E-mail -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-mail pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <rect width="20" height="16" x="2" y="4" rx="2"/>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>

                <input wire:model="email" type="email" id="email"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="E-mail" required/>
            </div>

            @error('email') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div class="relative z-0 w-full mb-4 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-key-round pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path
                        d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/>
                    <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/>
                </svg>

                <input wire:model="password" type="password" id="password" name="floating_password"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="Senha" required/>
            </div>


            @error('password') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>

        <!-- confirm Password -->
        <div class="relative z-0 w-full mb-8 group">
            <div class="relative rounded-[5px] flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-key-round pointer-events-none absolute left-3 h-5 w-5 text-white ml-1">
                    <path
                        d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/>
                    <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/>
                </svg>

                <input wire:model="password_confirmation" type="password" id="password_confirmation"
                       name="floating_confirm_password"
                       class="h-14 w-full rounded-full border border-black bg-black px-3 py-4 text-sm leading-[22.4px] text-white placeholder-gray-100 outline-none hover:border hover:border-white focus:border-white pl-11"
                       placeholder="Confirmar senha" required/>
            </div>

            @error('password_confirmation') <span class="text-redCustom text-sm pl-4">{{ $message }}</span> @enderror
        </div>


        <!-- Botão de Envio -->
        <div class="flex justify-stretch">
            <button type="submit"
                    class="w-full bg-[#29e0a9] shadow-md text-white font-bold uppercase py-3 px-4 rounded-full hover:bg-[#002f27cc] focus:outline-none">
                Enviar
            </button>
        </div>
    </form>

    <script>
        function mascara(o, f) {
            v_obj = o;
            v_fun = f;
            setTimeout("execmascara()", 1);
        }

        function execmascara() {
            v_obj.value = v_fun(v_obj.value);
        }

        function mascaraCpf(valor) {
            valor = valor.replace(/\D/g, "");
            valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
            valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
            valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
            return valor;
        }

        function mascaraTelefone(valor) {
            valor = valor.replace(/\D/g, "");
            valor = valor.replace(/^(\d{2})(\d)/, "($1) $2");
            valor = valor.replace(/(\d{5})(\d)/, "$1-$2");
            return valor;
        }

        function mascaraData(valor) {
            valor = valor.replace(/\D/g, "");
            valor = valor.replace(/(\d{2})(\d)/, "$1/$2");
            valor = valor.replace(/(\d{2})(\d)/, "$1/$2");
            return valor;
        }

        window.onload = function () {
            configurarMascara('cpf', '#cpf', mascaraCpf, 14);
            configurarMascara('telefone', '#telefone', mascaraTelefone, 15);
            configurarMascara('data', '#birthday', mascaraData, 10);
        };

        function configurarMascara(tipo, seletor, funcaoMascara, tamanhoMax) {
            let campos = document.querySelectorAll(seletor);
            campos.forEach(function (campo) {
                campo.setAttribute('maxlength', tamanhoMax);
                campo.onkeyup = function () {
                    mascara(this, funcaoMascara);
                };
            });
        }
    </script>
</div>
