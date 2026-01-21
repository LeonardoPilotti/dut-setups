<x-layout>
    <main class="min-h-screen flex items-center justify-center">
        <section class="bg-white w-full max-w-md p-8 shadow-lg rounded-xl">
            <h1 class="text-center text-2xl font-bold mb-6">Login</h1>
            <p>Faça login e garanta os melhores setups para o F1 25!</p>
            <div>
            <form action="{{ route('auth.login') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                    <label for="email">
                        Email:
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="your@email.com"
                        class="border rounded-lg p-2">
                

                <label
                    for="password">
                    Senha:
                    </label>

                <input
                    type="password"
                    name="password"
                    class="border rounded-lg p-2">

                <button
                    type="submit"
                    class="bg-[#612a52] text-white p-2 rounded-lg font-bold cursor-pointer hover:bg-[#7b3b6a] mt-4">
                    Entrar
                </button>
                </div>
            </form>
        </section>
    </main>
</x-layout>
