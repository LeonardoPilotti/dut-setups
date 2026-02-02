<x-layout>
    <main class="min-h-screen bg-gradient-to-b from-gray-900 to-[#0f0f1a] py-8">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Painel Administrativo</h1>
                <p class="text-gray-400">Gerencie usuários e visualize estatísticas do sistema</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Users -->
                <div class="bg-blue-500/20 border border-blue-500/30 rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ $stats['total_users'] }}</h3>
                    <p class="text-blue-300 text-sm">Total de Usuários</p>
                </div>

                <!-- Total Setups -->
                <div
                    class="bg-gradient-to-br from-purple-500/20 to-purple-600/10 border border-purple-500/30 rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-500/20 rounded-lg">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">{{ $stats['total_setups'] }}</h3>
                    <p class="text-purple-300 text-sm">Total de Setups</p>
                </div>

                <!-- Link para Gerenciar Usuários -->
                <a href="{{ route('admin.users') }}"
                    class="bg-gradient-to-br from-amber-500/20 to-amber-600/10 border border-amber-500/30 rounded-xl p-6 hover:from-amber-500/30 hover:to-amber-600/20 transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-amber-500/20 rounded-lg group-hover:bg-amber-500/30 transition">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-1">Gerenciar</h3>
                    <p class="text-amber-300 text-sm">Ver todos os usuários →</p>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Users by Role -->
                <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-6">Usuários por Função</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                <span class="text-gray-300">Administradores</span>
                            </div>
                            <span class="text-xl font-bold text-white">{{ $stats['users_by_role']['admin'] }}</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="text-gray-300">Equipe</span>
                            </div>
                            <span class="text-xl font-bold text-white">{{ $stats['users_by_role']['team'] }}</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-gray-300">Usuários</span>
                            </div>
                            <span class="text-xl font-bold text-white">{{ $stats['users_by_role']['user'] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Top 5 Tracks by Setups -->
                <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-6">Top 5 Pistas (Setups)</h2>
                    <div class="space-y-3">
                        @foreach ($stats['setups_by_track'] as $track)
                            <div class="flex items-center justify-between p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-300">{{ $track->name }}</span>
                                <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $track->setups_count }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Users -->
                <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-6">Usuários Recentes</h2>
                    <div class="space-y-3">
                        @foreach ($stats['recent_users'] as $user)
                            <div class="flex items-center justify-between p-3 bg-gray-900/50 rounded-lg">
                                <div>
                                    <p class="text-white font-medium">{{ $user->name }}</p>
                                    <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                                </div>
                                <span class="text-xs text-gray-500">
                                    {{ $user->created_at->diffForHumans() }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Setups -->
                <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-6">Setups Recentes</h2>
                    <div class="space-y-3">
                        @foreach ($stats['recent_setups'] as $setup)
                            <div class="p-3 bg-gray-900/50 rounded-lg">
                                <div class="flex items-start justify-between mb-1">
                                    <p class="text-white font-medium">{{ $setup->title }}</p>
                                    <span class="text-xs text-gray-500">
                                        {{ $setup->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-400">
                                    <span>{{ $setup->track->name }}</span>
                                    <span>•</span>
                                    <span>{{ $setup->user->name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </main>
</x-layout>
