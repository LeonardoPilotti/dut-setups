<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Track;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    // Exibir o formulário
    public function create(Track $track)
    {
        $this->authorizeAdmin();

        return view('dashboard.setup.create', compact('track'));
    }

    private function authorizeAdmin()
    {
        if (! auth()->check() || ! auth()->user()->isAdmin()) {
            abort(403, 'Acesso negado!');
        }
    }

    public function show(Track $track, Setup $setup)
    {
        $user = auth()->user();

        if (! $setup->is_generic) {
            if (! $user || (! $user->isAdmin() && ! $user->isTeamMember())) {
                abort(403);
            }
        }

        return view('dashboard.setup.show', compact('track', 'setup'));
    }
    //Criar setup
    public function store(Request $request, Track $track)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'is_generic' => 'required|boolean',
            'is_wet' => 'required|boolean',

            // Aerodinâmica
            'front_wing' => 'required|integer|min:0|max:50',
            'rear_wing' => 'required|integer|min:0|max:50',

            // Diferencial
            'diff_on' => 'required|integer|min:10|max:100',
            'diff_off' => 'required|integer|min:10|max:100',

            // Geometria da Suspensão
            'front_camber' => 'required|numeric|min:-3.5|max:2.5',
            'rear_camber' => 'required|numeric|min:-2.0|max:-1.0',
            'front_toe' => 'required|numeric|min:0.00|max:0.20',
            'rear_toe' => 'required|numeric|min:0.10|max:0.25',

            // Suspensão
            'front_suspension' => 'required|integer|min:1|max:41',
            'rear_suspension' => 'required|integer|min:1|max:41',
            'front_anti_roll' => 'required|integer|min:1|max:21',
            'rear_anti_roll' => 'required|integer|min:1|max:21',

            // Altura do Carro
            'front_height' => 'required|integer|min:15|max:35',
            'rear_height' => 'required|integer|min:40|max:60',

            // Freios
            'brake_pressure' => 'required|integer|min:80|max:100',
            'brake_bias' => 'required|integer|min:50|max:70',

            // Pressão dos Pneus
            'front_left_pressure' => 'required|numeric|min:22.5|max:29.5',
            'front_right_pressure' => 'required|numeric|min:22.5|max:29.5',
            'rear_left_pressure' => 'required|numeric|min:20.5|max:26.5',
            'rear_right_pressure' => 'required|numeric|min:20.5|max:26.5',
        ]);

        $data['user_id'] = auth()->id();
        $data['track_id'] = $track->id;

        $setup = Setup::create($data);

        return redirect()->route('dashboard.track', $track->slug)
            ->with('success', 'Setup criado com sucesso!');
    }

    // Exibir formulário de edição
    public function edit(Setup $setup)
    {
        $this->authorizeAdmin();
        $track = $setup->track;

        return view('dashboard.setup.edit', compact('setup', 'track'));
    }

    // Salvar edição do setup
    public function update(Request $request, Setup $setup)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'owner_name' => 'nullable|string|max:255',
            'is_generic' => 'boolean',
            'is_wet' => 'boolean',

            // Aerodinâmica
            'front_wing' => 'required|integer|min:0|max:50',
            'rear_wing' => 'required|integer|min:0|max:50',

            // Diferencial
            'diff_on' => 'required|integer|min:10|max:100',
            'diff_off' => 'required|integer|min:10|max:100',

            // Geometria da Suspensão
            'front_camber' => 'required|numeric|min:-3.5|max:2.5',
            'rear_camber' => 'required|numeric|min:-2.0|max:-1.0',
            'front_toe' => 'required|numeric|min:0.00|max:0.20',
            'rear_toe' => 'required|numeric|min:0.10|max:0.25',

            // Suspensão
            'front_suspension' => 'required|integer|min:1|max:41',
            'rear_suspension' => 'required|integer|min:1|max:41',
            'front_anti_roll' => 'required|integer|min:1|max:21',
            'rear_anti_roll' => 'required|integer|min:1|max:21',

            // Altura do Carro
            'front_height' => 'required|integer|min:15|max:35',
            'rear_height' => 'required|integer|min:40|max:60',

            // Freios
            'brake_pressure' => 'required|integer|min:80|max:100',
            'brake_bias' => 'required|integer|min:50|max:70',

            // Pressão dos Pneus
            'front_left_pressure' => 'required|numeric|min:22.5|max:29.5',
            'front_right_pressure' => 'required|numeric|min:22.5|max:29.5',
            'rear_left_pressure' => 'required|numeric|min:20.5|max:26.5',
            'rear_right_pressure' => 'required|numeric|min:20.5|max:26.5',
        ]);

        $setup->update($data);

        return redirect()
            ->route('dashboard.track', $setup->track->slug)
            ->with('success', 'Setup atualizado com sucesso!');
    }

    public function destroy(Setup $setup)
    {
        $this->authorizeAdmin();

        $setup->delete();

        return redirect()
            ->route('dashboard.track', $setup->track->slug)
            ->with('success', 'Setup deletado com sucesso!');
    }
}
