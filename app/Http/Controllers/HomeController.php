<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Catalogue;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::actif()->take(6)->get();
        $projets = Project::vedette()->take(3)->get();
        $catalogues = Catalogue::actif()->take(4)->get();

        return view('home', compact('services', 'projets', 'catalogues'));
    }

    public function apropos()
    {
        $teamMembers = TeamMember::ordre()->get();
        return view('apropos', compact('teamMembers'));
    }
}
