<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Adicionar ou remover favorito (toggle)
     */
    public function toggle($trackSlug, $setupId)
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->back()->with('error', 'Você precisa estar logado para favoritar setups.');
        }

        $setup = Setup::findOrFail($setupId);
        
        // Toggle favorito
        $isFavorited = $user->toggleFavoriteSetup($setupId);
        
        $message = $isFavorited 
            ? 'Setup adicionado aos favoritos!' 
            : 'Setup removido dos favoritos!';
        
        return redirect()->back()->with('success', $message);
    }
}