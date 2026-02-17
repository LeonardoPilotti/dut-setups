<x-layout>
    @php
        $isEdit = isset($setup);
    @endphp

    <main class="min-h-screen bg-[#0f0f1a] p-12">
        <div class="max-w-4xl mx-auto">

            <!-- CABEÇALHO -->
            <div class="mb-8 text-center pt-8">
                <h1 class="text-3xl font-bold text-white mb-2">
                    {{ $isEdit ? 'Editar Setup para ' . $track->name : 'Configurar Setup para ' . $track->name }}
                </h1>

                <p class="text-gray-400">
                    {{ $isEdit
                        ? 'Atualize os parâmetros para melhorar o desempenho'
                        : 'Ajuste os parâmetros para obter o melhor desempenho na pista' }}
                </p>
            </div>
            <form novalidate
                action="{{ $isEdit
                    ? route('setups.update', ['track' => $track->slug, 'setup' => $setup->id])
                    : route('setup.store', $track->slug) }}"
                method="POST"
                class="bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-3xl space-y-10 shadow-2xl border border-gray-700">
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                @if (!$isEdit)
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @endif

                {{-- Informações do Setup --}}
                <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 space-y-4">
                    <h3 class="text-xl font-bold text-white">Informações do Setup</h3>

                    <div>
                        <label class="block text-sm text-gray-300 mb-1">
                            Nome do setup <span class="text-red-400">*</span>
                        </label>
                        <input name="title" type="text" required value="{{ old('title', $setup->title ?? '') }}"
                            class="w-full px-3 py-2 rounded-xl bg-gray-900 text-white border {{ $errors->has('title') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                            placeholder="Setup Seco">
                        @error('title')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-300 mb-1">
                            Criador do setup <span class="text-gray-400">(Opcional)</span>
                        </label>
                        <input name="owner_name" type="text"   
                            value="{{ old('owner_name', $setup->owner_name ?? '') }}"
                            class="w-full px-3 py-2 rounded-xl bg-gray-900 text-white border {{ $errors->has('owner_name') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                            placeholder = "Jarno Opmeer">
                        @error('owner_name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-300 mb-1">
                            Tipo de Setup <span class="text-red-400">*</span>
                        </label>
                        <select name="is_generic"
                            class="w-full px-3 py-2 rounded-xl bg-gray-900 text-white border {{ $errors->has('is_generic') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition">
                            <option value="0"
                                {{ old('is_generic', $setup->is_generic ?? 0) == 0 ? 'selected' : '' }}>
                                Setup da Equipe (Privado)
                            </option>
                            <option value="1"
                                {{ old('is_generic', $setup->is_generic ?? 0) == 1 ? 'selected' : '' }}>
                                Setup Genérico (Público)
                            </option>
                        </select>
                        @error('is_generic')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- CLIMA --}}
                <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                    <h3 class="text-xl font-bold text-white mb-4">
                        Condição da Pista <span class="text-red-400">*</span>
                    </h3>

                    <select name="is_wet"
                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('is_wet') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition">
                        <option value="0" {{ old('is_wet', $setup->is_wet ?? 0) == 0 ? 'selected' : '' }}>
                             Pista Seca
                        </option>
                        <option value="1" {{ old('is_wet', $setup->is_wet ?? 0) == 1 ? 'selected' : '' }}>
                             Pista Molhada
                        </option>
                    </select>

                    @error('is_wet')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    {{-- AERODINÂMICA --}}
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                        <h3 class="text-xl font-bold text-white mb-6">Aerodinâmica</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-300 mb-2">
                                    Asa Dianteira <span class="text-red-400">*</span>
                                </label>
                                <input name="front_wing" type="number" min="0" max="50" step="1" required
                                    value="{{ old('front_wing', $setup->front_wing ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('front_wing') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                    placeholder="0-50">
                                @error('front_wing')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-300 mb-2">
                                    Asa Traseira <span class="text-red-400">*</span>
                                </label>
                                <input name="rear_wing" type="number" min="0" max="50" step="1" required
                                    value="{{ old('rear_wing', $setup->rear_wing ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('rear_wing') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                    placeholder="0-50">
                                @error('rear_wing')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- DIFERENCIAL --}}
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                        <h3 class="text-xl font-bold text-white mb-6">Diferencial</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-300 mb-2">
                                    Diferencial Ativo <span class="text-red-400">*</span>
                                </label>
                                <input name="diff_on" type="number" min="10" max="100" required
                                    value="{{ old('diff_on', $setup->diff_on ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('diff_on') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                    placeholder="10-100%">
                                @error('diff_on')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-300 mb-2">
                                    Diferencial Inativo <span class="text-red-400">*</span>
                                </label>
                                <input name="diff_off" type="number" min="10" max="100" required
                                    value="{{ old('diff_off', $setup->diff_off ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('diff_off') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                    placeholder="10-100%">
                                @error('diff_off')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- GEOMETRIA DA SUSPENSÃO --}}
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 md:col-span-2">
                        <h3 class="text-xl font-bold text-white mb-6">Geometria da Suspensão</h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Cambagem Dianteira (°) <span class="text-red-400">*</span>
                                    </label>
                                    <input name="front_camber" type="number" step="0.1" required
                                        value="{{ old('front_camber', $setup->front_camber ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('front_camber') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="-3.5° a 2.5°">
                                    @error('front_camber')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Toe Dianteiro (°) <span class="text-red-400">*</span>
                                    </label>
                                    <input name="front_toe" type="number" step="0.01" required
                                        value="{{ old('front_toe', $setup->front_toe ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('front_toe') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="0.00° a 0.20°">
                                    @error('front_toe')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Cambagem Traseira (°) <span class="text-red-400">*</span>
                                    </label>
                                    <input name="rear_camber" type="number" step="0.1" required
                                        value="{{ old('rear_camber', $setup->rear_camber ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('rear_camber') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="-2.00° a -1.00°">
                                    @error('rear_camber')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Toe Traseiro (°) <span class="text-red-400">*</span>
                                    </label>
                                    <input name="rear_toe" type="number" step="0.01" required
                                        value="{{ old('rear_toe', $setup->rear_toe ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('rear_toe') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="0.10° a 0.25°">
                                    @error('rear_toe')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SUSPENSÃO --}}
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 md:col-span-2">
                        <h3 class="text-xl font-bold text-white mb-6">Suspensão</h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Suspensão Dianteira <span class="text-red-400">*</span>
                                    </label>
                                    <input name="front_suspension" type="number" min="1" max="41" required
                                        value="{{ old('front_suspension', $setup->front_suspension ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('front_suspension') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="1-41">
                                    @error('front_suspension')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Suspensão Traseira <span class="text-red-400">*</span>
                                    </label>
                                    <input name="rear_suspension" type="number" min="1" max="41" required
                                        value="{{ old('rear_suspension', $setup->rear_suspension ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('rear_suspension') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="1-41">
                                    @error('rear_suspension')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Barra Dianteira <span class="text-red-400">*</span>
                                    </label>
                                    <input name="front_anti_roll" type="number" min="1" max="21" required
                                        value="{{ old('front_anti_roll', $setup->front_anti_roll ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('front_anti_roll') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="1-21">
                                    @error('front_anti_roll')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Barra Traseira <span class="text-red-400">*</span>
                                    </label>
                                    <input name="rear_anti_roll" type="number" min="1" max="21" required
                                        value="{{ old('rear_anti_roll', $setup->rear_anti_roll ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('rear_anti_roll') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="1-21">
                                    @error('rear_anti_roll')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ALTURA DO CARRO --}}
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                        <h3 class="text-xl font-bold text-white mb-6">Altura do Carro</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-300 mb-2">
                                    Dianteira <span class="text-red-400">*</span>
                                </label>
                                <input name="front_height" type="number" 
                                    value="{{ old('front_height', $setup->front_height ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('front_height') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                    placeholder="15-35">
                                @error('front_height')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-300 mb-2">
                                    Traseira <span class="text-red-400">*</span>
                                </label>
                                <input name="rear_height" type="number"
                                    value="{{ old('rear_height', $setup->rear_height ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('rear_height') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                    placeholder="40-60">
                                @error('rear_height')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- FREIOS --}}
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700">
                        <h3 class="text-xl font-bold text-white mb-6">Freios</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-300 mb-2">
                                    Pressão de Freio (%) <span class="text-red-400">*</span>
                                </label>
                                <input name="brake_pressure" type="number" min="80" max="100" required
                                    value="{{ old('brake_pressure', $setup->brake_pressure ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('brake_pressure') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                    placeholder="80-100%">
                                @error('brake_pressure')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-300 mb-2">
                                    Bias de Freio (%) <span class="text-red-400">*</span>
                                </label>
                                <input name="brake_bias" type="number" step="1" min="50" max="70" required
                                    value="{{ old('brake_bias', $setup->brake_bias ?? '') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('brake_bias') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                    placeholder="50-70%">
                                @error('brake_bias')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- PRESSÃO DOS PNEUS --}}
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 md:col-span-2">
                        <h3 class="text-xl font-bold text-white mb-6">Pressão dos Pneus (PSI)</h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Dianteiro Esquerdo <span class="text-red-400">*</span>
                                    </label>
                                    <input name="front_left_pressure" type="number" step="0.1" required
                                        value="{{ old('front_left_pressure', $setup->front_left_pressure ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('front_left_pressure') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="22.5-29.5">
                                    @error('front_left_pressure')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Traseiro Esquerdo <span class="text-red-400">*</span>
                                    </label>
                                    <input name="rear_left_pressure" type="number" step="0.1" required
                                        value="{{ old('rear_left_pressure', $setup->rear_left_pressure ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('rear_left_pressure') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="20.5-26.5">
                                    @error('rear_left_pressure')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Dianteiro Direito <span class="text-red-400">*</span>
                                    </label>
                                    <input name="front_right_pressure" type="number" step="0.1" required
                                        value="{{ old('front_right_pressure', $setup->front_right_pressure ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('front_right_pressure') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="22.5-29.5">
                                    @error('front_right_pressure')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-300 mb-2">
                                        Traseiro Direito <span class="text-red-400">*</span>
                                    </label>
                                    <input name="rear_right_pressure" type="number" step="0.1" required
                                        value="{{ old('rear_right_pressure', $setup->rear_right_pressure ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-900 text-white border {{ $errors->has('rear_right_pressure') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition"
                                        placeholder="20.5-26.5">
                                    @error('rear_right_pressure')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BOTÕES --}}
                <div class="pt-6 flex gap-4 mb-6">
                    <button type="submit"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition duration-200 cursor-pointer shadow-lg hover:shadow-blue-500/50">
                        {{ $isEdit ? ' Atualizar Setup' : ' Salvar Setup' }}
                    </button>

                    @if ($isEdit)
                        <a href="{{ route('dashboard.setup.show', ['track' => $track->slug, 'setup' => $setup->id]) }}"
                            class="flex-1 bg-gray-700 hover:bg-gray-600 text-white font-bold py-4 rounded-xl text-center transition duration-200 cursor-pointer shadow-lg">
                             Cancelar
                        </a>
                    @endif
                </div>

            </form>
        </div>
    </main>
</x-layout>