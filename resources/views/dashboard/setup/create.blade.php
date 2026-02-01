<x-layout>
    <main class="min-h-screen bg-[#0f0f1a]">
        <div class="max-w-4xl mx-auto">
            <!-- CABEÇALHO -->
            <div class="mb-8 text-center pt-8">
                <h1 class="text-3xl font-bold text-white mb-2">Configurar Setup para {{ $track->name }}</h1>
                <p class="text-gray-400">Ajuste os parâmetros para obter o melhor desempenho na pista</p>
            </div>
            <form action="{{ route('setup.store', $track->slug) }}" method="POST"
                class="bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-3xl space-y-10 shadow-2xl border border-gray-700">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <!-- INFORMAÇÕES DO SETUP -->
                <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                    <div class="flex items-center gap-3 mb-4">
                        <h3 class="text-xl font-bold text-white">Informações do Setup</h3>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Nome do setup:</label>
                            <input name="title" type="text" required
                                class="w-full px-3 py-2 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                placeholder="ex: Setup seco">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Criador do setup:</label>
                            <input name="owner_name" type="text" required
                                class="w-full px-3 py-2 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                placeholder="ex: Jarno Opmeer">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1 mt-2">Tipo de Setup:</label>
                        <select name="is_generic"
                            class="w-full px-3 py-2 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none">
                            <option value="0">Setup da Equipe (Privado)</option>
                            <option value="1">Setup Genérico (Público)</option>
                        </select>
                    </div>
                </div>

                <!-- CLIMA -->
                <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                    <div class="flex items-center gap-3 mb-4">
                        <h3 class="text-xl font-bold text-white">Condição da Pista</h3>
                    </div>
                    <select name="is_wet"
                        class="w-full px-4 py-3.5 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none">
                        <option value="0" class="bg-gray-800">Pista Seca</option>
                        <option value="1" class="bg-gray-800">Pista Molhada</option>
                    </select>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- AERODINÂMICA -->
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                        <div class="flex items-center gap-3 mb-6">
                            <h3 class="text-xl font-bold text-white">Aerodinâmica</h3>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Asa Dianteira</label>
                                <input name="front_wing" type="number" min="0" max="50" step="1"
                                    required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                    placeholder="0-50">

                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Asa Traseira</label>
                                <input name="rear_wing" type="number" min="0" max="50" step="1"
                                    required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                    placeholder="0-50">
                            </div>
                        </div>
                    </div>

                    <!-- DIFERENCIAL -->
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                        <div class="flex items-center gap-3 mb-6">
                            <h3 class="text-xl font-bold text-white">Diferencial</h3>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Diferencial Ativo</label>
                                <input name="diff_on" type="number" min="10" max="100" required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                    placeholder="10-100%">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Diferencial Inativo</label>
                                <input name="diff_off" type="number" min="10" max="100" required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                    placeholder="10-100%">
                            </div>
                        </div>
                    </div>

                    <!-- GEOMETRIA DA SUSPENSÃO -->
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 md:col-span-2">
                        <div class="flex items-center gap-3 mb-6">
                            <h3 class="text-xl font-bold text-white">Geometria da Suspensão</h3>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Cambagem Dianteira
                                        (°)</label>
                                    <input name="front_camber" type="number" step="0.1" required
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="-3.5° a 2.5°">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Toe Dianteiro
                                        (°)</label>
                                    <input name="front_toe" type="number" step="0.01" required
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="0.00° a 0.20°">
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Cambagem Traseira
                                        (°)</label>
                                    <input name="rear_camber" type="number" step="0.1" type="number"
                                        min="-2.00" max="-1.00" required
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="-2.00° a -1.00°">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Toe Traseiro
                                        (°)</label>
                                    <input name="rear_toe" type="number" step="0.01" type="number"
                                        min="0.10" required max="0.25"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="0.10° a 0.25°">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SUSPENSÃO -->
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 md:col-span-2">
                        <div class="flex items-center gap-3 mb-6">
                            <h3 class="text-xl font-bold text-white">Suspensão</h3>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Suspensão
                                        Dianteira</label>
                                    <input name="front_suspension" type="number" min="1" max="41"
                                        required
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="1-41">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Suspensão
                                        Traseira</label>
                                    <input name="rear_suspension" type="number" min="1" max="41"
                                        required
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="1-41">
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Barra Dianteira</label>
                                    <input name="front_anti_roll" type="number" min="1" max="21"
                                        required
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="1-21">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Barra Traseira</label>
                                    <input name="rear_anti_roll" type="number" min="1" max="21"
                                        required
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="1-21">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ALTURA DO CARRO -->
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                        <div class="flex items-center gap-3 mb-6">
                            <h3 class="text-xl font-bold text-white">Altura do Carro</h3>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Dianteira</label>
                                <input name="front_height" type="number" min="15" max="35" required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                    placeholder="15-35">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Traseira</label>
                                <input name="rear_height" type="number" min="40" max="60" required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                    placeholder="40-60">
                            </div>
                        </div>
                    </div>

                    <!-- FREIOS -->
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                        <div class="flex items-center gap-3 mb-6">
                            <h3 class="text-xl font-bold text-white">Freios</h3>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Pressão de Freio
                                    (%)</label>
                                <input name="brake_pressure" type="number" min="80" max="100" required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                    placeholder="80-100%">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Bias de Freio (%)</label>
                                <input name="brake_bias" type="number" step="1" min="50"
                                    max="70" required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                    placeholder="50-70%">
                            </div>
                        </div>
                    </div>

                    <!-- PRESSÃO DOS PNEUS -->
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 md:col-span-2">
                        <div class="flex items-center gap-3 mb-6">
                            <h3 class="text-xl font-bold text-white">Pressão dos Pneus (PSI)</h3>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Dianteiro
                                        Esquerdo</label>
                                    <input name="front_left_pressure" type="number" step="0.1" min="22.5"
                                        required max="29.5"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="22.5-29.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Traseiro
                                        Esquerdo</label>
                                    <input name="rear_left_pressure" type="number" step="0.1" min="20.5"
                                        required max="26.5"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="20.5-26.5">
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Dianteiro
                                        Direito</label>
                                    <input name="front_right_pressure" type="number" step="0.1" min="22.5"
                                        required max="29.5"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="22.5-29.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Traseiro
                                        Direito</label>
                                    <input name="rear_right_pressure" type="number" step="0.1" min="20.5"
                                        required max="26.5"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border border-gray-600 focus:outline-none"
                                        placeholder="20.5-26.5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-6">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition-all">
                        Salvar Setup
                    </button>
                    <p class="text-center text-gray-400 text-sm mt-3">
                        Todos os campos poderão ser editados.
                    </p>
                </div>
            </form>
        </div>
    </main>
</x-layout>
