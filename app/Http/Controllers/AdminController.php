<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_setups' => Setup::count(),
            'total_tracks' => Track::count(),
            'users_by_role' => [
                'admin' => User::where('role', 'admin')->count(),
                'team' => User::where('role', 'team')->count(),
                'user' => User::where('role', 'user')->count(),
            ],
            'setups_by_track' => Track::withCount('setups')
                ->orderBy('setups_count', 'desc')
                ->limit(5)
                ->get(),
            'recent_users' => User::latest()->limit(5)->get(),
            'recent_setups' => Setup::with(['user', 'track'])
                ->latest()
                ->limit(5)
                ->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function users(Request $request)
    {
        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'asc');
        $search = trim((string) $request->get('search', ''));

        // Colunas que podem ordenar
        $allowedSorts = ['id', 'name', 'email', 'role'];
        if (! in_array($sort, $allowedSorts)) {
            $sort = 'id';
        }

        // Pega todos os usuários e faz uma tabela
        $users = User::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->orderBy($sort, $direction)
            ->paginate(20)
            ->appends(request()->only('search', 'sort', 'direction'));

        $sortDirections = [
            'id' => $sort === 'id' && $direction === 'asc' ? 'desc' : 'asc',
            'name' => $sort === 'name' && $direction === 'asc' ? 'desc' : 'asc',
            'email' => $sort === 'email' && $direction === 'asc' ? 'desc' : 'asc',
            'role' => $sort === 'role' && $direction === 'asc' ? 'desc' : 'asc',
        ];

        return view('admin.users.index', compact('users', 'sort', 'direction', 'sortDirections', 'search'));

    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,team,user',
        ]);

        // Impede que o próprio admin remova seu próprio role
        if ($user->id === auth()->id() && $request->role !== 'admin') {
            return back()->withErrors(['role' => 'Você não pode remover seu próprio acesso de administrador.']);
        }

        $user->update(['role' => $request->role]);

        return back()->with('success', 'Role atualizada com sucesso!');
    }

    public function destroyUser(User $user)
    {
        // Impede que o admin delete a si mesmo
        if ($user->id === auth()->id()) {
            return back()->withErrors(['error' => 'Você não pode deletar sua própria conta.']);
        }

        $user->delete();

        return back()->with('success', 'Usuário deletado com sucesso!');
    }
}
