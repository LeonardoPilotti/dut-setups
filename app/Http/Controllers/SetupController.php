<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;

class SetupController extends Controller
{
    // Exibir o formulário
    public function create(Track $track)
    {
        return view('dashboard.setup.create', compact('track'));
    }

    // Salvar o setup no banco
    public function store(Request $request, Track $track)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'owner' => 'required|string|max:255',
            'is_wet' => 'required|boolean',
            'front_wing' => 'nullable|numeric|min:0|max:50',
            'rear_wing' => 'nullable|numeric|min:0|max:50',
            'diff_on' => 'nullable|numeric|min:10|max:100',
            'diff_off' => 'nullable|numeric|min:10|max:100',
            'front_camber' => 'nullable|numeric',
            'rear_camber' => 'nullable|numeric',
            'front_toe' => 'nullable|numeric',
            'rear_toe' => 'nullable|numeric',
            'front_suspension' => 'nullable|numeric|min:1|max:41',
            'rear_suspension' => 'nullable|numeric|min:1|max:41',
            'front_anti_roll' => 'nullable|numeric|min:1|max:21',
            'rear_anti_roll' => 'nullable|numeric|min:1|max:21',
            'front_height' => 'nullable|numeric|min:15|max:70',
            'rear_height' => 'nullable|numeric|min:15|max:70',
            'brake_pressure' => 'nullable|numeric|min:80|max:100',
            'brake_bias' => 'nullable|numeric|min:50|max:70',
            'front_left_pressure' => 'nullable|numeric|min:22.5|max:29.5',
            'front_right_pressure' => 'nullable|numeric|min:22.5|max:29.5',
            'rear_left_pressure' => 'nullable|numeric|min:20.5|max:26.5',
            'rear_right_pressure' => 'nullable|numeric|min:20.5|max:26.5',
        ]);

        $data['user_id'] = auth()->id();
        $data['track_id'] = $track->id;

        $setup = \App\Models\Setup::create($data);

        return redirect()->route('dashboard.track', $track->slug)
                         ->with('success', 'Setup criado com sucesso!');
    }
}
