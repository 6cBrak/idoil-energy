<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;

class CatalogueController extends Controller
{
    public function index()
    {
        $categories = Catalogue::where('actif', true)->distinct()->pluck('categorie');
        $catalogues = Catalogue::actif()->get();
        return view('catalogue', compact('catalogues', 'categories'));
    }
}
