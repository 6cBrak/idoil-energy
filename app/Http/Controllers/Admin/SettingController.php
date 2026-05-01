<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.parametres.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'contact_email'   => 'nullable|email|max:255',
            'contact_email_2' => 'nullable|email|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_facebook' => 'nullable|url|max:255',
            'social_twitter'  => 'nullable|url|max:255',
            'social_youtube'  => 'nullable|url|max:255',
            'image_station'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image_camions'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image_logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        // Sauvegarde des images uploadées
        if ($request->hasFile('image_station')) {
            $request->file('image_station')->move(public_path('images'), 'station-idoil.jpg');
        }
        if ($request->hasFile('image_camions')) {
            $request->file('image_camions')->move(public_path('images'), 'camions-idoil.jpg');
        }
        if ($request->hasFile('image_logo')) {
            $ext = $request->file('image_logo')->extension();
            $request->file('image_logo')->move(public_path('images'), 'logo-idoil.' . $ext);
            Setting::set('logo_fichier', 'images/logo-idoil.' . $ext);
        }

        // Sauvegarde des champs texte
        $fields = [
            'entreprise_nom', 'entreprise_slogan', 'entreprise_description',
            'apropos_titre', 'apropos_sous_titre',
            'stat_1_valeur', 'stat_1_label',
            'stat_2_valeur', 'stat_2_label',
            'stat_3_valeur', 'stat_3_label',
            'badge_ligne_1', 'badge_ligne_2',
            'contact_adresse', 'contact_telephone', 'contact_telephone_2',
            'contact_email', 'contact_email_2',
            'contact_horaires_semaine', 'contact_horaires_samedi',
            'social_linkedin', 'social_facebook', 'social_twitter', 'social_youtube',
        ];

        foreach ($fields as $key) {
            Setting::set($key, $request->input($key));
        }

        return back()->with('success', 'Paramètres enregistrés avec succès.');
    }
}
