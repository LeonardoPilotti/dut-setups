<x-layout>
<main>
    <form action="{{ route('auth.login') }}"
        method="POST">
        @csrf
            
        <label for="email">Email:</label>
        <input
            type="email"
            name="email"
            placeholder="your@email.com">

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password">

        <button type="submit">Entrar</button>
    </form>
</main>
</x-layout>
