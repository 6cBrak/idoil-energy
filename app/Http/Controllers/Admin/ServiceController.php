<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('ordre')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'             => 'required|string|max:255',
            'description'       => 'required|string',
            'description_longue'=> 'nullable|string',
            'icone'             => 'required|string|max:100',
            'ordre'             => 'nullable|integer',
            'actif'             => 'nullable',
        ]);

        $data['actif'] = $request->boolean('actif');
        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service créé avec succès.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'titre'             => 'required|string|max:255',
            'description'       => 'required|string',
            'description_longue'=> 'nullable|string',
            'icone'             => 'required|string|max:100',
            'ordre'             => 'nullable|integer',
            'actif'             => 'nullable',
        ]);

        $data['actif'] = $request->boolean('actif');
        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service supprimé.');
    }
}
