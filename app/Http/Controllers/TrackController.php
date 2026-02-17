<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Track;

class TrackController extends Controller
{
    /**
     * Exibir setups de uma pista específica
     */
    public function show($slug)
    {
        $track = Track::where('slug', $slug)->firstOrFail();
        $user = auth()->user();

      $baseQuery = Setup::where('track_id', $track->id)
    ->when(!$user?->isAdmin() && !$user?->isTeamMember(), function ($query) {
        // Apenas user normal vê só genéricos
        $query->where('is_generic', true);
    })
    ->when($user?->isTeamMember(), function ($query) {
        // Team vê apenas privados
        $query->where('is_generic', false);
    });

        $drySetups = (clone $baseQuery)
            ->where('is_wet', false)
            ->with(['user', 'favorites'])
            ->latest()
            ->get()
            ->sortByDesc(fn ($setup) => $setup->isFavoritedBy($user))
            ->values();

        $wetSetups = (clone $baseQuery)
            ->where('is_wet', true)
            ->with(['user', 'favorites'])
            ->latest()
            ->get()
            ->sortByDesc(fn ($setup) => $setup->isFavoritedBy($user))
            ->values();

        return view('dashboard.track', compact('track', 'drySetups', 'wetSetups'));
    }
}
