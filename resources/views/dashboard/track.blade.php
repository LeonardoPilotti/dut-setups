<x-layout>
    <main class="min-h-screen bg-gradient-to-b from-gray-900 to-[#0f0f1a]">
        <!-- HERO -->
        <section class="relative h-[60vh] flex items-center justify-center text-white text-center max-h-[350px]">
            <img src="https://simracingsetup.com/wp-content/uploads/2024/04/F1-24-Bahrain-Car-Setups-Full.webp"
                class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/60"></div>

            <div class="relative px-6 max-w-3xl">
                <h1 class="text-4xl font-bold mb-4">
                    F1 25 - Setups {{ $track->name }}
                </h1>

                <p class="mb-3 font-bold">
                    Descubra o melhor setup para seu estilo de pilotagem agora mesmo.
                    <br>
                    Filtre por condições climáticas e maximize seu desempenho na pista.
                </p>

                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('setup.create', $track->slug) }}"
                            class="inline-flex items-center bg-[#5B21B6] hover:bg-[#4C1D95]
                              text-white font-bold py-3 px-6 mt-4 rounded-lg transition-all">
                            Adicionar Setup
                        </a>
                    @endif
                @endauth
            </div>
        </section>

        <!-- CONTEÚDO -->
        <section class="py-8">
            @php
                $filter = request('filter', 'dry');
            @endphp

            <div class="max-w-6xl mx-auto px-4">

                <!-- FILTROS -->
                <div class="flex gap-4 mb-8">
                    <a href="?filter=dry"
                        class="px-6 py-3 rounded-lg font-semibold transition text-white
                   {{ $filter === 'dry' ? 'bg-amber-600 hover:bg-amber-700' : 'bg-gray-700 hover:bg-gray-600' }}">
                        Pista Seca
                    </a>

                    <a href="?filter=wet"
                        class="px-6 py-3 rounded-lg font-semibold transition text-white
                   {{ $filter === 'wet' ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-700 hover:bg-gray-600' }}">
                        Pista Molhada
                    </a>
                </div>

                <!-- SETUPS SECO -->
                @if ($filter === 'dry' && $drySetups->isNotEmpty())
                    <div class="mb-12">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                            <span class="w-3 h-6 bg-amber-500 rounded"></span>
                            Setups para Pista Seca
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($drySetups as $setup)
                                <div
                                    class="relative bg-[#171825] rounded-xl p-6
                            hover:bg-[#21242f] transition-all shadow-lg
                            border border-gray-800 hover:border-gray-700">

                                    <!-- CARD CLICÁVEL -->
                                    <a href="{{ route('dashboard.setup.show', [$track->slug, $setup->id]) }}"
                                        class="block">

                                        <div class="flex justify-between items-start mb-4">
                                            <h4 class="text-xl font-bold text-white">
                                                {{ $setup->title }}
                                            </h4>

                                            <span
                                                class="bg-amber-900 text-amber-200 text-xs font-bold px-3 py-1 rounded-full">
                                                SECO
                                            </span>
                                        </div>

                                        <div class="mb-4">
                                            <p class="font-bold text-amber-400">{{ $setup->owner_name }}</p>
                                            <p class="text-sm text-gray-400">{{ $setup->created_at->diffForHumans() }}
                                            </p>
                                        </div>

                                        <div class="border-t border-gray-800 pt-4">
                                            <p class="text-xs text-gray-500">Adicionado por:</p>
                                            <p class="text-sm text-gray-300">{{ $setup->user->name ?? 'Sistema' }}</p>
                                        </div>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('setups.destroy', $setup->id) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir este setup?')"
                                        class="absolute bottom-4 right-4 z-10">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="event.stopPropagation()"
                                            class="text-red-400 hover:text-red-300 transition" title="Excluir setup">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                a2 2 0 01-1.995-1.858L5 7
                m5 4v6
                m4-6v6
                M9 7h6
                m2 0H7
                m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- SETUPS CHUVA -->
                @if ($filter === 'wet' && $wetSetups->isNotEmpty())
                    <div class="mb-12">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                            <span class="w-3 h-6 bg-blue-500 rounded"></span>
                            Setups para Chuva
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($wetSetups as $setup)
                                <div
                                    class="relative bg-[#171825] rounded-xl p-6
                                        hover:bg-[#21242f] transition-all shadow-lg
                                        border border-gray-800 hover:border-gray-700">

                                    <!-- CARD CLICÁVEL -->
                                    <a href="{{ route('dashboard.setup.show', [$track->slug, $setup->id]) }}"
                                        class="block">

                                        <div class="flex justify-between items-start mb-4">
                                            <h4 class="text-xl font-bold text-white">
                                                {{ $setup->title }}
                                            </h4>

                                            <span
                                                class="bg-blue-900 text-blue-200 text-xs font-bold px-3 py-1 rounded-full">
                                                CHUVA
                                            </span>
                                        </div>

                                        <div class="mb-4">
                                            <p class="font-bold text-blue-400">{{ $setup->owner_name }}</p>
                                            <p class="text-sm text-gray-400">{{ $setup->created_at->diffForHumans() }}
                                            </p>
                                        </div>

                                        <div class="border-t border-gray-800 pt-4">
                                            <p class="text-xs text-gray-500">Adicionado por:</p>
                                            <p class="text-sm text-gray-300">{{ $setup->user->name ?? 'Sistema' }}</p>
                                        </div>
                                    </a>

                                    <!-- DELETE -->
                                    @auth
                                        @if (auth()->user()->isAdmin())
                                            <form action="{{ route('setups.destroy', $setup->id) }}" method="POST"
                                                onsubmit="return confirm('Tem certeza que deseja excluir este setup?')"
                                                class="absolute top-4 right-4 z-10">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="event.stopPropagation()"
                                                    class="text-red-400 hover:text-red-300 transition"
                                                    title="Excluir setup">

                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                                                     a2 2 0 01-1.995-1.858L5 7
                                                                     m5 4v6
                                                                     m4-6v6
                                                                     M9 7h6
                                                                     m2 0H7
                                                                     m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>
</x-layout>
