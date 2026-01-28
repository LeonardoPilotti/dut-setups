<?php
namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Setup;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function create(Track $track)
    {
        return view('dashboard.setup.create', compact('track'));
    }

    public function store(Request $request, Track $track)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_wet' => 'required|boolean',
            'details' => 'nullable|string',
        ]);

        $track->setups()->create([
            'name' => $request->name,
            'is_wet' => $request->is_wet,
            'details' => $request->details,
        ]);

        return redirect()->route('dashboard.track', $track->slug)
                         ->with('success', 'Setup adicionado com sucesso!');
    }
}
