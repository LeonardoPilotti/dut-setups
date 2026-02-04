<x-layout>
    <main class="min-h-screen bg-gradient-to-b from-gray-900 to-[#0a0a0f] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-10 gap-4">
                <div class="flex items-center gap-3">
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold text-white mb-1">Gerenciamento de Usuários</h1>
                        <p class="text-gray-400 text-sm sm:text-base">Gerencie permissões e contas do sistema</p>
                    </div>
                </div>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-2 px-5 py-3 bg-gray-800/50 hover:bg-gray-700/50 text-white rounded-xl 
                          border border-gray-700 hover:border-gray-600 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Voltar ao Dashboard
                </a>
            </div>

            <!-- Notifications -->
            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-500/10 border border-green-500/30 text-green-400 rounded-xl backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl backdrop-blur-sm">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">Ocorreram erros:</span>
                    </div>
                    <ul class="space-y-1 ml-8 list-disc text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Users Table -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700 overflow-hidden">
                <div
                    class="p-6 border-b border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h2 class="text-xl font-semibold text-white">Lista de Usuários</h2>
                    </div>
                    <div class="relative w-full sm:w-64">
                        <form method="GET" action="{{ route('admin.users') }}" class="relative w-full sm:w-64">
                            {{-- Buscar usuário --}}
                            <input type="text" name="search" value="{{ request('search') }}"
                                oninput="this.form.submit()" placeholder="Buscar usuário..."
                                class="pl-10 py-3 bg-gray-900/50 border border-gray-700 rounded-lg 
                                text-white placeholder-gray-500 focus:outline-none focus:ring-2 
                                focus:ring-[var(--primary)]/40 ">

                            <input type="hidden" name="sort" value="{{ request('sort', 'id') }}">
                            <input type="hidden" name="direction" value="{{ request('direction', 'asc') }}">

                            <svg class="absolute left-3 top-3 w-4 h-4 text-gray-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr class="bg-gray-900/50">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">
                                    <a href="{{ route('admin.users', ['sort' => 'id', 'direction' => $sortDirections['id'], 'search' => request('search')]) }}"
                                        class="flex items-center gap-2 hover:text-gray-300 transition-colors group">
                                        ID
                                        <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-300 transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $sort === 'id' && $direction === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}" />
                                        </svg>
                                    </a>
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">
                                    <a href="{{ route('admin.users', ['sort' => 'name', 'direction' => $sortDirections['name'], 'search' => request('search')]) }}"
                                        class="flex items-center gap-2 hover:text-gray-300 transition-colors group">
                                        Usuário
                                        <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-300 transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $sort === 'name' && $direction === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}" />
                                        </svg>
                                    </a>
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">
                                    <a href="{{ route('admin.users', ['sort' => 'email', 'direction' => $sortDirections['email'], 'search' =>request('search')]) }}"
                                        class="flex items-center gap-2 hover:text-gray-300 transition-colors group">
                                        E-mail
                                        <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-300 transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $sort === 'email' && $direction === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}" />
                                        </svg>
                                    </a>
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">
                                    <a href="{{ route('admin.users', ['sort' => 'role', 'direction' => $sortDirections['role']]) }}"
                                        class="flex items-center gap-2 hover:text-gray-300 transition-colors group">
                                        Role
                                        <svg class="w-4 h-4 text-gray-500 group-hover:text-gray-300 transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $sort === 'role' && $direction === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}" />
                                        </svg>
                                    </a>
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">
                                    Ações
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-700/50">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-700/30 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-gray-300 font-mono text-sm">#{{ $user->id }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-medium text-sm">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">{{ $user->name }}</div>
                                                <div class="text-gray-400 text-xs">
                                                    Registrado {{ $user->created_at->format('d/m/Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-300">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.users.role', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="role" onchange="this.form.submit()"
                                                class="text-white px-3 py-1.5 rounded-lg border border-gray-700 
                                                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent 
                                                       transition-all duration-200 text-sm cursor-pointer appearance-none">
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}
                                                    class="bg-gray-800 py-2">Usuário</option>
                                                <option value="team" {{ $user->role === 'team' ? 'selected' : '' }}
                                                    class="bg-gray-800 py-2">Equipe</option>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}
                                                    class="bg-gray-800 py-2">Admin</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja remover este usuário? Esta ação não pode ser desfeita.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-600/20 hover:bg-red-600/30 text-red-400 
                                                                          rounded-lg border border-red-600/30 hover:border-red-600/50 
                                                                          transition-all duration-200 flex items-center gap-2 text-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Remover
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
