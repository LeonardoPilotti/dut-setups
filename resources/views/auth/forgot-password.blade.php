<x-layout>
    <div class="bg-fixed bg-center bg-cover" style="background-image: var(--bg-image)">
        <main class="min-h-screen flex items-center justify-center p-4">
            <div class="w-full max-w-md">
                <section class="bg-[var(--bg-card)] p-8 rounded-2xl shadow-2xl">
                    
                    <h1 class="text-center text-3xl font-extrabold mb-3 text-[var(--text-muted)]">
                        Redefinir senha
                    </h1>

                    <p class="text-center mb-8 text-[var(--text-subtle)] text-sm">
                        Informe seu email e enviaremos um link para redefinir sua senha.
                    </p>

                    @if (session('status'))
                        <p class="mb-4 text-sm text-green-500 text-center">
                            {{ session('status') }}
                        </p>
                    @endif

                    <form action="{{ route('password.email') }}" method="POST" class="flex flex-col gap-5">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-[var(--text-main)] mb-1">
                                Email
                            </label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="your@email.com"
                                required
                                class="w-full bg-[var(--bg-input)] text-[var(--text-main)]
                                       placeholder-[var(--text-placeholder)]
                                       border border-transparent rounded-lg p-3
                                       focus:outline-none focus:border-[var(--primary)]
                                       focus:ring-2 focus:ring-[var(--primary)]/40
                                       transition @error('email') border-red-500 @enderror">

                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botão -->
                        <button
                            type="submit"
                            class="mt-2 bg-[var(--primary)] hover:bg-[var(--primary-hover)]
                                   text-white p-3 rounded-lg font-bold
                                   transition-all duration-200
                                   shadow-lg shadow-[var(--primary)]/30 cursor-pointer">
                            Enviar link de redefinição
                        </button>

                        <!-- Voltar -->
                        <p class="text-center text-sm text-[var(--text-muted)] mt-4">
                            Lembrou da senha?
                            <a href="{{ route('login') }}"
                               class="font-bold text-[var(--primary)] hover:text-[var(--primary-hover)] transition">
                                Voltar para o login
                            </a>
                        </p>
                    </form>

                </section>
            </div>
        </main>
    </div>

    <x-footer />
</x-layout>
