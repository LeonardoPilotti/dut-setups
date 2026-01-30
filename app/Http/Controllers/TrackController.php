<?php

namespace App\Http\Controllers;

use App\Models\Track;

class TrackController extends Controller
{
    public function show(Track $track)
    {
        $user = auth()->user();
        $setupsQuery = $track->setups()->with('user');

        if ($user->isAdmin()) {
            // Não filtra nada (Vê tudo)
        } elseif ($user->role === 'team') {
            // Vê apenas setups da equipe (não genéricos)
            $setupsQuery->where('is_generic', false);

        } else {
            // Usuário normal (Só genéricos)
            $setupsQuery->where('is_generic', true);
        }

        $drySetups = (clone $setupsQuery)
            ->where('is_wet', false)
            ->orderBy('id')
            ->get();

        $wetSetups = (clone $setupsQuery)
            ->where('is_wet', true)
            ->orderBy('id')
            ->get();

        return view('dashboard.track', compact('track', 'drySetups', 'wetSetups'));
    }
}
