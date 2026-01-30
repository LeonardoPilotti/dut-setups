<x-layout>
    <main>

        <!-- Hero -->
        <section class="relative h-[60vh] flex items-center justify-center text-white text-center max-h-[350px]">
            <img src="https://simracingsetup.com/wp-content/uploads/2025/06/F1-25-ferrari-canada-gameplay.webp"
                 class="absolute inset-0 w-full h-full object-cover" alt="F1 25">
            <div class="absolute inset-0 bg-black/60"></div>
            <div class="relative px-6 max-w-3xl">
                <h1 class="text-4xl font-bold mb-4">
                    Bem-vindo à DUT
                </h1>
                <p class="mb-3 font-medium">
                    Dispute corridas com os melhores setups do F1 25 para todas as pistas.
                    <br>
                    Selecione uma pista abaixo e encontre o setup ideal.
                </p>
                
            </div>
        </section>

        <!-- Lista de Pistas -->
        <section class="bg-[#1F2233] text-white py-10">
            <div class="max-w-6xl mx-auto grid lg:grid-cols-4 gap-4">

                @forelse ($tracks as $track)
                    <a href="{{ route('dashboard.track', $track->slug) }}"
                       class="flex items-center gap-3 bg-[#171825] p-4 rounded-lg hover:bg-[#21242f] transition shadow-md">

                        <img src="https://flagcdn.com/{{ $track->country }}.svg"
                             class="w-10 h-6 object-cover rounded-sm shadow-sm border border-white/20"
                             alt="{{ $track->name }} flag">

                        <span class="font-semibold text-white">
                            {{ $track->name }}
                        </span>
                    </a>
                @empty
                    <p class="text-white col-span-4 text-center">
                        Nenhuma pista encontrada.
                    </p>
                @endforelse

            </div>
        </section>

    </main>
</x-layout>
