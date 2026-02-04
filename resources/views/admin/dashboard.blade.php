<x-layout>
    <main class="min-h-screen bg-gradient-to-b from-gray-900 to-[#0f0f1a] py-8">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Painel Administrativo</h1>
                <p class="text-gray-400">Gerencie usuários e visualize estatísticas do sistema</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid lg:grid-cols-2 gap-6 mb-8">
                <!-- Total Users -->
                <div class="bg-blue-500/20 border border-blue-500/30 rounded-xl p-6">
                    <h2 class="text-blue-300 font-bold text-xl">Total de Usuários</h2>
                    <p class="text-3xl font-semibold text-white mb-1">{{ $stats['total_users'] }}</p>
                </div>

                <!-- Gerenciar Usuários -->
                <a href="{{ route('admin.users') }}"
                    class="bg-gradient-to-br from-amber-500/20 to-amber-600/10 border border-amber-500/30 rounded-xl p-6 hover:from-amber-500/30 hover:to-amber-600/20 transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl text-amber-300 font-bold">Gerenciar usuários</h2>
                        <p class="font-semibold text-white mb-1">Ver todos →</p>
                    </div>
                            <p class="text-amber-100 font-medium">Adicionar, editar ou remover usuários do sistema</p>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Users by Role -->
                <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-6">Usuários por Função</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                            <p class="text-gray-300">Administradores</p>
                            <p class="text-xl font-bold text-white">{{ $stats['users_by_role']['admin'] }}</p>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                            <p class="text-gray-300">Equipe</p>
                            <p class="text-xl font-bold text-white">{{ $stats['users_by_role']['team'] }}</p>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                            <p class="text-gray-300">Usuários</p>
                            <p class="text-xl font-bold text-white">{{ $stats['users_by_role']['user'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Pistas com mais setups -->
                <div class="bg-gray-800/50 border border-gray-700 rounded-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-6">Pistas com mais Setups</h2>
                    <div class="space-y-3">
                        @foreach ($stats['setups_by_track'] as $track)
                            <div class="flex items-center justify-between p-3 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-300">{{ $track->name }}</span>
                                <span class="text-blue-300">
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