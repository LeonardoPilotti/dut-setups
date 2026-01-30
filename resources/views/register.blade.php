<x-layout>
    <div class="bg-fixed bg-center bg-cover" style="background-image: var(--bg-image)">
        <main class="min-h-screen flex items-center justify-center p-4">
            <div class="w-full max-w-md">
                <section class="bg-[var(--bg-card)] p-8 rounded-2xl shadow-2xl">
                    <h1 class="text-center text-3xl font-extrabold mb-3 text-[var(--text-muted)]">
                        Crie sua conta
                    </h1>

                    <p class="text-center mb-8 text-[var(--text-subtle)] text-sm">
                        Crie sua conta e garanta sua melhor versão
                    </p>

                    <form action="{{ route('auth.register') }}" method="POST" class="flex flex-col gap-5">
                        @csrf   

                        <!-- Nome -->
                        <div>
                            <label class="block text-sm font-medium text-[var(--text-main)] mb-1">
                                Nome
                            </label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Seu nome"
                                class="w-full bg-[var(--bg-input)] text-[var(--text-main)]
                                       placeholder-[var(--text-placeholder)]
                                       border border-transparent rounded-lg p-3
                                       focus:outline-none focus:border-[var(--primary)]
                                       focus:ring-2 focus:ring-[var(--primary)]/40
                                       transition @error('name') border-red-500 @enderror">

                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

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

                        <!-- Senha -->
                        <div>
                            <label class="block text-sm font-medium text-[var(--text-main)] mb-1">
                                Senha
                            </label>
                            <input
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                class="w-full bg-[var(--bg-input)] text-[var(--text-main)]
                                       placeholder-[var(--text-placeholder)]
                                       border border-transparent rounded-lg p-3
                                       focus:outline-none focus:border-[var(--primary)]
                                       focus:ring-2 focus:ring-[var(--primary)]/40
                                       transition @error('password') border-red-500 @enderror">

                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirmar senha -->
                        <div>
                            <label class="block text-sm font-medium text-[var(--text-main)] mb-1">
                                Confirmar senha
                            </label>
                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="••••••••"
                                class="w-full bg-[var(--bg-input)] text-[var(--text-main)]
                                       placeholder-[var(--text-placeholder)]
                                       border border-transparent rounded-lg p-3
                                       focus:outline-none focus:border-[var(--primary)]
                                       transition">
                        </div>

                        <!-- Botão -->
                        <button
                            type="submit"
                            class="mt-2 bg-[var(--primary)] hover:bg-[var(--primary-hover)]
                                   text-white p-3 rounded-lg font-bold
                                   transition-all duration-200
                                   shadow-lg shadow-[var(--primary)]/30">
                            Registrar
                        </button>

                        <p class="text-center text-sm text-[var(--text-muted)] mt-4">
                            Já possui uma conta?
                            <a href="{{ route('login') }}"
                               class="font-bold text-[var(--primary)] hover:text-[var(--primary-hover)] transition">
                                Faça login
                            </a>
                        </p>
                    </form>
                </section>
            </div>
        </main>
    </div>
</x-layout>
