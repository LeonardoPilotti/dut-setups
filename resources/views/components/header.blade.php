<header class="bg-[#171825] h-28 flex items-center">
    <div class="w-full flex items-center justify-between px-12">

        <!-- Logo -->
        <a href="{{ auth()->check() ? route('site.dashboard') : route('site.home') }}" class="flex items-center">
            <img src="{{ asset('images/dutLogo.png') }}" alt="DUT Racing" class="h-22 w-22 rounded-lg" />
        </a>

        <div class="flex items-center gap-4 text-white">

            <a href="https://www.instagram.com/teamdutracing/" target="_blank" rel="noopener nofollow">
                <img src="https://simracingsetup.com/wp-content/themes/neve-child/assets/icons-fa/instagram.svg"
                    class="h-5 w-5 invert transition hover:opacity-70 hover:scale-110" alt="Instagram" />
            </a>

            <a href="https://discord.gg/BGd6PCZYDu" target="_blank" rel="noopener nofollow">
                <img src="https://simracingsetup.com/wp-content/themes/neve-child/assets/icons-fa/discord.svg"
                    class="h-5 w-5 invert transition hover:opacity-70 hover:scale-110" alt="Discord" />
            </a>

            @guest
                <a href="{{ route('login') }}" class="font-bold transition hover:text-[var(--primary-hover)]">
                    Login
                </a>
            @endguest

            @auth
                <form method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit" class="font-bold transition hover:text-[var(--primary-hover)]">
                        Logout
                    </button>
                </form>

                @if (auth()->user()->isAdmin() && !request()->routeIs('admin.*'))
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 transition">
                        Painel Admin
                    </a>
                @endif  

            @endauth

        </div>

    </div>
</header>
