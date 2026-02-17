<x-layout>
    <main class="min-h-screen bg-[#0f0f1a]">

        <!-- Hero -->
        <section
            class="relative h-[60vh] flex flex-col items-center justify-center text-white text-center max-h-[350px] overflow-hidden">
            <img src="https://simracingsetup.com/wp-content/uploads/2025/06/F1-25-ferrari-canada-gameplay.webp"
                class="absolute inset-0 w-full h-full object-cover" alt="F1 25">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/60 to-black/40"></div>

            <div class="relative z-10 px-6 max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Bem-vindo à <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-blue-500">DUT</span>
                </h1>
                <p class="mb-6 font-medium text-lg text-gray-200">
                    Dispute corridas com os melhores setups do F1 25 para todas as pistas.
                    <br class="hidden sm:block">
                    Selecione uma pista abaixo e encontre o setup ideal.
                </p>
            </div>
        </section>

        <!-- Lista de Pistas -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 pt-12">
            <div class="text-center mb-12">
                <h2 class="text-white text-lg    mx-auto">
                    Encontre o setup ideal para cada circuito e maximize seu desempenho
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse ($tracks as $track)
                    <a href="{{ route('dashboard.track', $track->slug) }}"
                        class="group relative overflow-hidden bg-gray-900 rounded-2xl p-6 transition-all duration-300 border border-gray-700 hover:border-red-500">

                        <!-- Efeito hover -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-red-500/10 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000">
                        </div>

                        <!-- Bandeira com efeito -->
                        <div class="relative mb-4">
                            <div
                                class="absolute -inset-1 rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-500">
                            </div>
                            <img src="https://flagcdn.com/{{ $track->country }}.svg"
                                class="relative w-16 h-10 object-cover rounded-lg  border-gray-600 group-hover:border-white/50 transition duration-300"
                                alt="{{ $track->name }} flag" loading="lazy">
                        </div>

                        <!-- Nome da pista -->
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-red-400 duration-300">
                            {{ $track->name }}
                        </h3>


                    </a>
                @empty
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-2">Nenhuma pista encontrada</h3>
                    </div>
                @endforelse
            </div>
        </section>
    </main>
</x-layout>
