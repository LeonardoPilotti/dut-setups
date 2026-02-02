<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setup;
use App\Models\Track;
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

    public function users()
    {
        $users = User::withCount('setups')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.users.index', compact('users'));
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