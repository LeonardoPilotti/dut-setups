<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Exibir setups de uma pista específica
     */
    public function show($slug)
    {
        $track = Track::where('slug', $slug)->firstOrFail();
        
        // Pegar o usuário autenticado
        $user = auth()->user();
        
        // SETUPS SECOS
        $drySetups = Setup::where('track_id', $track->id)
            ->where('is_wet', false)
            ->with(['user', 'favorites'])
            ->latest()
            ->get();
        
        // SETUPS MOLHADOS
        $wetSetups = Setup::where('track_id', $track->id)
            ->where('is_wet', true)
            ->with(['user', 'favorites'])
            ->latest()
            ->get();
        
            $drySetups = $drySetups->sortByDesc(function($setup) use ($user) {
                return $setup->isFavoritedBy($user);
            })->values();
            
            $wetSetups = $wetSetups->sortByDesc(function($setup) use ($user) {
                return $setup->isFavoritedBy($user);
            })->values();
        
        return view('dashboard.track', compact('track', 'drySetups', 'wetSetups'));
    }
}