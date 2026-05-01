<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;

class CatalogueController extends Controller
{
    public function index()
    {
        $categories = Catalogue::actif()->distinct()->pluck('categorie');
        $catalogues = Catalogue::actif()->get();
        return view('catalogue', compact('catalogues', 'categories'));
    }
}
