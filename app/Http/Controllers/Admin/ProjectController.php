<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projets = Project::orderBy('ordre')->get();
        return view('admin.projets.index', compact('projets'));
    }

    public function create()
    {
        return view('admin.projets.form', ['projet' => new Project]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'       => 'required|string|max:255',
            'client'      => 'nullable|string|max:255',
            'localisation'=> 'nullable|string|max:255',
            'annee'       => 'nullable|integer|min:1990|max:2030',
            'description' => 'required|string',
            'categorie'   => 'required|string|max:100',
            'statut'      => 'required|string|max:100',
            'en_vedette'  => 'nullable',
            'ordre'       => 'nullable|integer',
        ]);

        $data['en_vedette'] = $request->boolean('en_vedette');
        Project::create($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $projet)
    {
        return view('admin.projets.form', compact('projet'));
    }

    public function update(Request $request, Project $projet)
    {
        $data = $request->validate([
            'titre'       => 'required|string|max:255',
            'client'      => 'nullable|string|max:255',
            'localisation'=> 'nullable|string|max:255',
            'annee'       => 'nullable|integer|min:1990|max:2030',
            'description' => 'required|string',
            'categorie'   => 'required|string|max:100',
            'statut'      => 'required|string|max:100',
            'en_vedette'  => 'nullable',
            'ordre'       => 'nullable|integer',
        ]);

        $data['en_vedette'] = $request->boolean('en_vedette');
        $projet->update($data);

        return redirect()->route('admin.projets.index')->with('success', 'Projet mis à jour.');
    }

    public function destroy(Project $projet)
    {
        $projet->delete();
        return redirect()->route('admin.projets.index')->with('success', 'Projet supprimé.');
    }
}
