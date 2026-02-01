<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetupRequest;
use App\Models\Setup;
use App\Models\Track;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function create(Track $track)
    {
        $this->authorize('create', Setup::class);

        return view('dashboard.setup.create', compact('track'));
    }

    public function show(Track $track, Setup $setup)
    {
        $this->authorize('view', $setup);

        return view('dashboard.setup.show', compact('track', 'setup'));
    }

    public function store(SetupRequest $request, Track $track)
    {
        $this->authorize('create', Setup::class);

        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['track_id'] = $track->id;

        Setup::create($data);

        return redirect()->route('dashboard.track', $track->slug)
                         ->with('success', 'Setup criado com sucesso!');
    }

    public function edit(Setup $setup)
    {
        $this->authorize('update', $setup);
        $track = $setup->track;

        return view('dashboard.setup.edit', compact('setup', 'track'));
    }

    public function update(SetupRequest $request, Setup $setup)
    {
        $this->authorize('update', $setup);

        $setup->update($request->validated());

        return redirect()->route('dashboard.track', $setup->track->slug)
                         ->with('success', 'Setup atualizado com sucesso!');
    }

    public function destroy(Setup $setup)
    {
        $this->authorize('delete', $setup);

        $setup->delete();

        return redirect()->route('dashboard.track', $setup->track->slug)
                         ->with('success', 'Setup deletado com sucesso!');
    }
}
