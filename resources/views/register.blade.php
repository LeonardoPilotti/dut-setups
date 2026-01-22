<x-layout>
    <main class="flex justify-center">
        <section class="bg-white w-full max-w-md p-8 shadow-lg rounded-xl mt-50 ">
            <h1 class="text-center text-3xl font-extrabold mb-6 text-[#612a52]">Registre-se</h1>
            <p>Crie sua conta e garanta os melhores setups para o F1 25!</p>
            <div>
            <form action="{{ route('auth.register') }}" method="POST" class="flex flex-col">
                @csrf
                    <label for="email" class="mt-4">
                        Email:
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="your@email.com"
                        class="border rounded-lg p-2 mt-3 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror

                <label
                    for="password" class="mt-4">
                    Senha:
                    </label>

                <input
                    type="password"
                    name="password"
                    placeholder="******"
                    class="border rounded-lg p-2 mt-3 mb-3 @error('password') border-red-500 @enderror">
                     @error('password')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                
                <label
                    for="password_confirmation" class="mt-4">
                    Confirme sua Senha:
                    </label>

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="******"
                    class="border rounded-lg p-2 mt-3 mb-3 @error('password_confirmation') border-red-500 @enderror">
                     @error('password_confirmation')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                <button
                    type="submit"
                    class="bg-[#612a52] text-white p-2 rounded-lg font-bold cursor-pointer hover:opacity-75 mt-4">
                    Entrar
                </button>
                <p class="text-center">Já possui uma conta? <a href="{{ route('site.login') }}" class="font-bold underline hover:opacity-75">Faça login</a></p>
                
            </form>
        </div>
        </section>
    </main>
</x-layout>