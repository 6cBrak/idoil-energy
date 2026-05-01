<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::ordre()->get();
        return view('admin.equipe.index', compact('members'));
    }

    public function create()
    {
        $member = new TeamMember();
        return view('admin.equipe.form', compact('member'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'      => 'required|string|max:255',
            'poste'    => 'required|string|max:255',
            'bio'      => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'ordre'    => 'nullable|integer|min:0',
        ]);

        TeamMember::create($request->only('nom', 'poste', 'bio', 'linkedin', 'ordre'));

        return redirect()->route('admin.equipe.index')->with('success', 'Membre ajouté avec succès.');
    }

    public function edit(TeamMember $equipe)
    {
        return view('admin.equipe.form', ['member' => $equipe]);
    }

    public function update(Request $request, TeamMember $equipe)
    {
        $request->validate([
            'nom'      => 'required|string|max:255',
            'poste'    => 'required|string|max:255',
            'bio'      => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'ordre'    => 'nullable|integer|min:0',
        ]);

        $equipe->update($request->only('nom', 'poste', 'bio', 'linkedin', 'ordre'));

        return redirect()->route('admin.equipe.index')->with('success', 'Membre mis à jour.');
    }

    public function destroy(TeamMember $equipe)
    {
        $equipe->delete();
        return redirect()->route('admin.equipe.index')->with('success', 'Membre supprimé.');
    }
}
