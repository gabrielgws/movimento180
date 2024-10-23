<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.4/lottie.min.js"></script>


<x-app-layout>
    <div class="bg-gray-100 px-5 flex items-center justify-center h-screen">
        <div class="text-center bg-white shadow-md rounded-lg pb-12 px-5 sm:pb-12 sm:px-10 sm:pt-0">
            <div class="flex justify-center w-full">
                <div id="lottie-animation" style="width: 150px; height: fit-content;"></div>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mt-[-30px]">Obrigado pela sua inscrição!</h1>
            <p class="mt-2 text-gray-600 text-base">Agora para concluir a comprar do seu ingresso, acesse o link e faça
                o pagamento.</p>
            <div class="mt-7">
                <a href="https://loja.infinitepay.io/movimento180/dtb9677-1-lote-retiro-2025" target="_blank"
                   class="bg-yellowMovimento py-3 px-6 rounded-full shadow-base font-bold text-xs sm:text-base hover:brightness-90"
                >Link de pagamento</a>
            </div>
        </div>
    </div>

    <!-- Script para a biblioteca de confetes -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

    <!-- Script para efeito de confete -->
    <script>
        window.onload = function () {
            // Função para gerar confetes
            function shootConfetti() {
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: {y: 0.6} // Muda a origem para onde o confete vai sair
                });
            }

            shootConfetti();
        };

        var animation = lottie.loadAnimation({
            container: document.getElementById('lottie-animation'), // Container onde a animação será renderizada
            renderer: 'svg', // Renderização em SVG
            loop: true, // A animação ficará em loop
            autoplay: true, // Iniciar automaticamente
            path: '{{ asset('animations/time.json') }}' // Caminho para o arquivo JSON da animação
        });
    </script>
    <canvas id="my-canvas"
            style="position:fixed; top:0; left:0; width:100%; height:100%; pointer-events:none;"></canvas>
</x-app-layout>
