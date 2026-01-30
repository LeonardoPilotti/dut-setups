<x-layout>
    <main class="min-h-screen bg-gradient-to-b from-gray-900 to-[#0f0f1a]">
        <div class="max-w-5xl mx-auto px-4 py-8">
            <!-- Cabeçalho -->
            <div
                class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-2xl border border-gray-700 p-6 mb-8 shadow-xl">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Criado por: {{ $setup->owner_name }}</span>
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $setup->title }}</h1>
                        <div class="flex items-center gap-2 text-blue-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium">{{ $track->name }}</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('dashboard.track', $track->slug) }}"
                                class="flex items-center gap-1.5 p-3 text-sm bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-md transition duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Voltar para Pista
                            </a>

                            @if (auth()->user()->isAdmin() || auth()->user()->role === 'team')
                                <a href="{{ route('setups.edit', $setup->id) }}"
                                    class="flex items-center gap-2 p-3 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d=" M11 5H6a2 2 0
                                00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828
                                15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Editar Setup
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid de Configurações -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Aerodinâmica -->
                <div
                    class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5 hover:border-gray-600 transition duration-300">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-blue-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Aerodinâmica</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400">Asa Dianteira</span>
                            <span class="text-white font-semibold">{{ $setup->front_wing }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400">Asa Traseira</span>
                            <span class="text-white font-semibold">{{ $setup->rear_wing }}</span>
                        </div>
                    </div>
                </div>

                <!-- Diferencial -->
                <div
                    class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5 hover:border-gray-600 transition duration-300">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-purple-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Diferencial</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400">Ativo</span>
                            <span class="text-white font-semibold">{{ $setup->diff_on }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400">Inativo</span>
                            <span class="text-white font-semibold">{{ $setup->diff_off }}</span>
                        </div>
                    </div>
                </div>

                <!-- Geometria da Suspensão -->
                <div
                    class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5 hover:border-gray-600 transition duration-300">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-green-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Geometria</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-400 text-sm">Cambagem Dianteira</span>
                                <div class="text-white font-semibold mt-1">{{ $setup->front_camber }}</div>
                            </div>
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-400 text-sm">Cambagem Traseira</span>
                                <div class="text-white font-semibold mt-1">{{ $setup->rear_camber }}</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-400 text-sm">Toe Dianteiro</span>
                                <div class="text-white font-semibold mt-1">{{ $setup->front_toe }}</div>
                            </div>
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-400 text-sm">Toe Traseiro</span>
                                <div class="text-white font-semibold mt-1">{{ $setup->rear_toe }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Suspensão -->
                <div
                    class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5 hover:border-gray-600 transition duration-300">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-yellow-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Suspensão</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-400 text-sm">Suspensão Dianteira</span>
                                <div class="text-white font-semibold mt-1">
                                    {{ $setup->front_suspension ?? $setup->front_wing }}</div>
                            </div>
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-400 text-sm">Suspensão Traseira</span>
                                <div class="text-white font-semibold mt-1">
                                    {{ $setup->rear_suspension ?? $setup->rear_wing }}</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-400 text-sm">Barra Dianteira</span>
                                <div class="text-white font-semibold mt-1">{{ $setup->front_anti_roll }}</div>
                            </div>
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-400 text-sm">Barra Traseira</span>
                                <div class="text-white font-semibold mt-1">{{ $setup->rear_anti_roll }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Freios -->
                <div
                    class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5 hover:border-gray-600 transition duration-300">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-red-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Freios</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400">Pressão de freio</span>
                            <span class="text-white font-semibold">{{ $setup->brake_pressure }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400">BIAS de freio</span>
                            <span class="text-white font-semibold">{{ $setup->brake_bias }}</span>
                        </div>
                    </div>
                </div>

                <!-- Pressão dos Pneus -->
                <div
                    class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5 hover:border-gray-600 transition duration-300">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-indigo-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Pressão dos Pneus (PSI)</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400 text-sm">Dianteira Esquerda</span>
                            <div class="text-white font-semibold text-lg mt-1">{{ $setup->front_left_pressure }}</div>
                        </div>
                        <div class="p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400 text-sm">Dianteira Direita</span>
                            <div class="text-white font-semibold text-lg mt-1">{{ $setup->front_right_pressure }}
                            </div>
                        </div>
                        <div class="p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400 text-sm">Traseira Esquerda</span>
                            <div class="text-white font-semibold text-lg mt-1">{{ $setup->rear_left_pressure }}</div>
                        </div>
                        <div class="p-3 bg-gray-900/50 rounded-lg">
                            <span class="text-gray-400 text-sm">Traseira Direita</span>
                            <div class="text-white font-semibold text-lg mt-1">{{ $setup->rear_right_pressure }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção de Metadados/Informações Adicionais -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-5">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Criado em: {{ $setup->created_at->format('d/m/Y') }}</span>
                        </div>
                        @if ($setup->updated_at != $setup->created_at)
                            <div class="flex items-center gap-2 text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Atualizado em: {{ $setup->updated_at->format('d/m/Y') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
