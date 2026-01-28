<?php
namespace App\Http\Controllers;

use App\Models\Track;

class TrackController extends Controller
{
    public function show(Track $track)
    {
        $drySetups = $track->setups()
            ->where('is_wet', false)
            ->with(['user', 'owner']) 
            ->orderBy('id')
            ->get();

        $wetSetups = $track->setups()
            ->where('is_wet', true)
            ->with(['user', 'owner'])
            ->orderBy('id')
            ->get();

        return view('dashboard.track', compact('track', 'drySetups', 'wetSetups'));
        
    }
}