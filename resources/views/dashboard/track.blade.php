<x-layout>
    <section class="relative h-[60vh] flex items-center justify-center text-white text-center max-h-[350px]">
        <!-- Imagem de fundo -->
        <img src="https://simracingsetup.com/wp-content/uploads/2024/04/F1-24-Bahrain-Car-Setups-Full.webp"
            class="absolute inset-0 w-full h-full object-cover">

        <!-- Overlay sobre toda a imagem -->
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
                        class="inline-flex items-center bg-[#5B21B6] hover:bg-[#4C1D95] text-white font-bold py-3 px-6 mt-4 rounded-lg transition-all">
                        Adicionar Setup
                    </a>
                @endif
            @endauth

        </div>
    </section>

    <section class="bg-[#1F2233] py-8">
        @php
            $filter = request('filter', 'dry');
        @endphp

        <div class="max-w-6xl mx-auto px-4">
            <!-- Botões -->
            <div class="flex gap-4 mb-8">
                <a href="?filter=dry"
                    class="inline-block {{ $filter == 'dry' ? 'bg-amber-600 hover:bg-amber-700' : 'bg-gray-700 hover:bg-gray-600' }} text-white px-6 py-3 rounded-lg font-semibold transition">
                    Pista Seca
                </a>
                <a href="?filter=wet"
                    class="inline-block {{ $filter == 'wet' ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-700 hover:bg-gray-600' }} text-white px-6 py-3 rounded-lg font-semibold transition">
                    Pista Molhada
                </a>
            </div>

            <!-- Setups secos-->
            @if ($drySetups->isNotEmpty() && $filter == 'dry')
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                        <span class="w-3 h-6 bg-amber-500 rounded"></span>
                        Setups para Pista Seca
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($drySetups as $setup)
                            <a href="{{ route('dashboard.setup.show', [$track->slug, $setup->id]) }}"
                                class="block bg-[#171825] rounded-xl p-6 hover:bg-[#21242f] transition-all shadow-lg hover:shadow-xl border border-gray-800 hover:border-gray-700">

                                <!-- Cabeçalho -->
                                <div class="flex justify-between items-start mb-4">
                                    <h4 class="text-xl font-bold text-white">
                                        {{ $setup->title }}
                                    </h4>
                                    <span
                                        class="bg-amber-900 text-amber-200 text-xs font-bold px-3 py-1 rounded-full whitespace-nowrap">
                                        SECO
                                    </span>
                                </div>

                                <!-- Piloto -->
                                <div class="flex items-center gap-3 mb-4">
                                    <div>
                                        <p class="font-bold text-amber-400">
                                            {{ $setup->owner_name }}
                                        </p>
                                        <p class="text-sm text-gray-400">
                                            {{ $setup->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>

                                <div class="border-t border-gray-800 pt-4">
                                    <p class="text-xs text-gray-500">Adicionado por:</p>
                                    <p class="text-sm text-gray-300">{{ $setup->user->name ?? 'Sistema' }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Setups de chuva -->
            @if ($wetSetups->isNotEmpty() && $filter == 'wet')
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                        <span class="w-3 h-6 bg-blue-500 rounded"></span>
                        Setups para Chuva
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($wetSetups as $setup)
                            <a href="{{ route('dashboard.setup.show', [$track->slug, $setup->id]) }}"
                                class="block bg-[#171825] rounded-xl p-6 hover:bg-[#21242f] transition-all shadow-lg hover:shadow-xl border border-gray-800 hover:border-gray-700">

                                <!-- Cabeçalho -->
                                <div class="flex justify-between items-start mb-4">
                                    <h4 class="text-xl font-bold text-white">
                                        {{ $setup->title }}
                                    </h4>
                                    <span
                                        class="bg-blue-900 text-blue-200 text-xs font-bold px-3 py-1 rounded-full whitespace-nowrap">
                                        CHUVA
                                    </span>
                                </div>

                                <!-- Piloto -->
                                <div class="flex items-center gap-3 mb-4">
                                    <div>
                                        <p class="font-bold text-blue-400">
                                            {{ $setup->owner_name }}
                                        </p>
                                        <p class="text-sm text-gray-400">
                                            {{ $setup->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Quem adicionou -->
                                <div class="border-t border-gray-800 pt-4">
                                    <p class="text-xs text-gray-500">Adicionado por:</p>
                                    <p class="text-sm text-gray-300">{{ $setup->user->name ?? 'Sistema' }}</p>
                                </div>
                            </a>
                        @endforeach
                        
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layout>
