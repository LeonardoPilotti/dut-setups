<x-layout>
    <main class="min-h-screen bg-gradient-to-b from-[#0a0a0f] via-[#0f0f1a] to-[#0a0a0f] overflow-hidden">
        <!-- HERO -->
        <section class="min-h-screen flex items-center justify-center px-4 text-center">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    A <span class="text-red-500">performance</span> que você<br>
                    <span class="text-blue-500">precisa</span>
                </h2>

                <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-10">
                    Sua fonte número um para setups profissionais de F1 25.
                    <span class="text-red-400 font-semibold">Melhore seus tempos</span> e domine cada pista.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/login"
                        class="px-8 py-4 bg-red-700 hover:red-800 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-105">
                        Entrar na Conta
                    </a>

                    <a href="#features"
                        class="px-8 py-4 bg-gray-800 hover:gray-700 text-white font-bold rounded-xl border border-gray-700 hover:border-gray-600 transition-all duration-300 transform hover:scale-105">
                        Ver Recursos
                    </a>
                </div>
            </div>
        </section>

        <section id="features" class="py-20 px-4 relative">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        Por que escolher a
                        <span class="bg-gradient-to-r from-red-500 to-blue-500 bg-clip-text text-transparent">
                            DUT Racing?
                        </span>
                    </h2>
                    <p class="text-gray-400 text-xl max-w-3xl mx-auto">
                        Tudo que você precisa para dominar o F1 25
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div
                        class="group bg-gradient-to-br from-gray-900/50 to-gray-800/30 backdrop-blur-sm px-8 py-12 rounded-2xl border border-gray-800 hover:border-blue-500/50 transition-all duration-500 hover:-translate-y-2">
                        <div class="w-14 h-14 bg-blue-700 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Todas as Pistas</h3>
                        <p class="text-gray-400 mb-6">
                            Cobertura completa de todos os circuitos do calendário da F1 25.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div
                        class="group bg-gradient-to-br from-gray-900/50 to-gray-800/30 backdrop-blur-sm px-8 py-12 rounded-2xl border border-gray-800 hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-purple-600 to-purple-700 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Comunidade Ativa</h3>
                        <p class="text-gray-400 mb-6">
                            Compartilhe setups e aprenda com os melhores pilotos.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div
                        class="group bg-gradient-to-br from-gray-900/50 to-gray-800/30 backdrop-blur-sm px-8 py-12 rounded-2xl border border-gray-800 hover:border-red-500/50 transition-all duration-500 hover:-translate-y-2">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-600 to-red-700 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Setup Otimizados</h3>
                        <p class="text-gray-400 mb-6">
                            Configurações testadas e aprovadas para máxima performance.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 text-center">
            <a href="/login"
                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-600 to-blue-600 hover:from-red-700 hover:to-blue-700 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                Começar Agora →
            </a>
        </section>
    </main>
</x-layout>