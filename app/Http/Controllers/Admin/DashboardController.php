<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\Catalogue;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services'  => Service::count(),
            'projets'   => Project::count(),
            'catalogues' => Catalogue::count(),
            'messages'  => ContactMessage::count(),
            'messages_non_lus' => ContactMessage::where('lu', false)->count(),
        ];

        $derniers_messages = ContactMessage::latest()->take(5)->get();
        $derniers_projets  = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'derniers_messages', 'derniers_projets'));
    }
}
