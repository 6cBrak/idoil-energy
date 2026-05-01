<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::orderBy('ordre')->get();
        return view('admin.catalogue.index', compact('catalogues'));
    }

    public function create()
    {
        return view('admin.catalogue.form', ['catalogue' => new Catalogue]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'      => 'required|string|max:255',
            'description'=> 'nullable|string',
            'categorie'  => 'required|string|max:100',
            'reference'  => 'nullable|string|max:100',
            'telecharger'=> 'nullable',
            'actif'      => 'nullable',
            'ordre'      => 'nullable|integer',
        ]);

        $data['telecharger'] = $request->boolean('telecharger');
        $data['actif']       = $request->boolean('actif', true);
        Catalogue::create($data);

        return redirect()->route('admin.catalogue.index')->with('success', 'Article catalogue créé.');
    }

    public function edit(Catalogue $catalogue)
    {
        return view('admin.catalogue.form', compact('catalogue'));
    }

    public function update(Request $request, Catalogue $catalogue)
    {
        $data = $request->validate([
            'titre'      => 'required|string|max:255',
            'description'=> 'nullable|string',
            'categorie'  => 'required|string|max:100',
            'reference'  => 'nullable|string|max:100',
            'telecharger'=> 'nullable',
            'actif'      => 'nullable',
            'ordre'      => 'nullable|integer',
        ]);

        $data['telecharger'] = $request->boolean('telecharger');
        $data['actif']       = $request->boolean('actif');
        $catalogue->update($data);

        return redirect()->route('admin.catalogue.index')->with('success', 'Article catalogue mis à jour.');
    }

    public function destroy(Catalogue $catalogue)
    {
        $catalogue->delete();
        return redirect()->route('admin.catalogue.index')->with('success', 'Article supprimé.');
    }
}
