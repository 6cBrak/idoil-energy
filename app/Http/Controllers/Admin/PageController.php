<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    // ── Pages personnalisées ────────────────────────────────────────

    public function index()
    {
        $pages = Page::orderByDesc('created_at')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.form', ['page' => new Page]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'           => 'required|string|max:255',
            'slug'            => 'nullable|string|max:255|unique:pages,slug',
            'meta_description'=> 'nullable|string|max:500',
            'contenu'         => 'nullable|string',
            'publie'          => 'nullable',
        ]);

        $data['slug']   = Str::slug($data['slug'] ?? $data['titre']);
        $data['publie'] = $request->boolean('publie', true);

        Page::create($data);
        return redirect()->route('admin.pages.index')->with('success', 'Page créée avec succès.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'titre'           => 'required|string|max:255',
            'slug'            => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'meta_description'=> 'nullable|string|max:500',
            'contenu'         => 'nullable|string',
            'publie'          => 'nullable',
        ]);

        $data['slug']   = Str::slug($data['slug'] ?? $data['titre']);
        $data['publie'] = $request->boolean('publie');

        $page->update($data);
        return redirect()->route('admin.pages.index')->with('success', 'Page mise à jour.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page supprimée.');
    }

    // ── Contenu pages existantes ───────────────────────────────────

    public function contenu(string $nom)
    {
        $configs = $this->pageConfigs();
        abort_unless(isset($configs[$nom]), 404);
        return view('admin.pages.contenu', ['nom' => $nom, 'config' => $configs[$nom]]);
    }

    public function contenuUpdate(Request $request, string $nom)
    {
        $configs = $this->pageConfigs();
        abort_unless(isset($configs[$nom]), 404);

        foreach ($configs[$nom]['champs'] as $champ) {
            Setting::set($champ['key'], $request->input($champ['key']));
        }

        return back()->with('success', 'Contenu mis à jour.');
    }

    private function pageConfigs(): array
    {
        return [
            'accueil' => [
                'label' => 'Accueil',
                'icon'  => 'fa-home',
                'champs' => [
                    ['key' => 'home_hero_titre',       'label' => 'Titre principal',       'type' => 'text',     'default' => 'L\'Énergie Pour Tous, Partout'],
                    ['key' => 'home_hero_description', 'label' => 'Description hero',      'type' => 'textarea', 'default' => 'IDOIL ENERGY vous accompagne dans vos besoins énergétiques.'],
                    ['key' => 'home_cta_texte',        'label' => 'Bouton CTA (texte)',    'type' => 'text',     'default' => 'Découvrir nos services'],
                ],
            ],
            'apropos' => [
                'label' => 'À propos',
                'icon'  => 'fa-building',
                'champs' => [
                    ['key' => 'apropos_hero_titre',    'label' => 'Titre hero',            'type' => 'text',     'default' => 'À Propos d\'IDOIL ENERGY'],
                    ['key' => 'apropos_mission',       'label' => 'Mission (texte)',        'type' => 'textarea', 'default' => ''],
                    ['key' => 'apropos_vision',        'label' => 'Vision (texte)',         'type' => 'textarea', 'default' => ''],
                    ['key' => 'apropos_valeurs',       'label' => 'Valeurs (texte)',        'type' => 'text',     'default' => 'Efficacité · Innovation · Fiabilité · Excellence'],
                ],
            ],
            'services' => [
                'label' => 'Services',
                'icon'  => 'fa-cogs',
                'champs' => [
                    ['key' => 'services_hero_titre',   'label' => 'Titre hero',            'type' => 'text',     'default' => 'Nos Services'],
                    ['key' => 'services_hero_desc',    'label' => 'Description hero',      'type' => 'textarea', 'default' => ''],
                ],
            ],
            'projets' => [
                'label' => 'Nos Projets',
                'icon'  => 'fa-project-diagram',
                'champs' => [
                    ['key' => 'projets_hero_titre',    'label' => 'Titre hero',            'type' => 'text',     'default' => 'Nos Projets'],
                    ['key' => 'projets_hero_desc',     'label' => 'Description hero',      'type' => 'textarea', 'default' => ''],
                ],
            ],
            'contact' => [
                'label' => 'Contact',
                'icon'  => 'fa-envelope',
                'champs' => [
                    ['key' => 'contact_hero_titre',    'label' => 'Titre hero',            'type' => 'text',     'default' => 'Contactez-Nous'],
                    ['key' => 'contact_hero_desc',     'label' => 'Description hero',      'type' => 'textarea', 'default' => ''],
                ],
            ],
        ];
    }
}
