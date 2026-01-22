<x-layout>
    <div class="bg-fixed bg-center bg-cover" style="background-image: url('/images/fundo.png')">
        <main class="min-h-screen flex items-center justify-center p-4">
            <div class="w-full max-w-md">
                <section class="bg-[#1F2233] p-8 rounded-xl">
                    <h1 class="text-center text-3xl font-extrabold mb-6 text-[#CECECF]">Login</h1>
                    <p class="text-center mb-6 text-[#F3F4F4]">Faça login e garanta os melhores setups para o F1 25!</p>

                    <form action="{{ route('auth.login') }}" method="POST" class="flex flex-col">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="block font-medium text-[#F3F4F4] mb-1">
                                Email:
                            </label>
                            <input type="email" name="email" placeholder="your@email.com"
                                class="placeholder-[#A5A5A7] text-[#F3F4F4] w-full border border-gray-300 rounded-lg p-3 @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block font-medium text-[#F3F4F4] mb-1">
                                Senha:
                            </label>
                            <input type="password" name="password" placeholder="******"
                                class="placeholder-[#A5A5A7] text-[#F3F4F4] w-full border border-gray-300 rounded-lg p-3 @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-[#E1212E] text-white p-3 rounded-lg font-bold hover:bg-[#760B0F] transition duration-200 w-full cursor-pointer">
                            Entrar
                        </button>

                        <p class="text-center mt-6 text-white">
                            Ainda não tem uma conta?
                            <a href="{{ route('site.register') }}"
                                class="font-bold text-[#E1212E] hover:underline hover:text-[#760B0F] transition duration-200">
                                Registre-se
                            </a>
                        </p>
                    </form>
                </section>
            </div>
        </main>
    </div>
</x-layout>
