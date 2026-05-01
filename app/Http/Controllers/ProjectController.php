<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $categories = Project::distinct()->pluck('categorie');
        $projets = Project::orderBy('ordre')->get();
        return view('projets', compact('projets', 'categories'));
    }
}
