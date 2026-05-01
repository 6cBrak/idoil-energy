@extends('admin.layouts.app')
@section('title', 'Paramètres')
@section('subtitle', 'Informations entreprise, coordonnées et réseaux sociaux')

@php use App\Models\Setting; @endphp

@section('content')
<form action="{{ route('admin.parametres.update') }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="space-y-6">

        {{-- ══ INFORMATIONS ENTREPRISE ══ --}}
        <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-white/5 flex items-center gap-3">
                <div class="w-8 h-8 bg-orange-500/10 border border-orange-500/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-building text-orange-400 text-sm"></i>
                </div>
                <h2 class="text-white font-semibold">Informations Entreprise</h2>
            </div>
            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Nom de l'entreprise</label>
                    <input type="text" name="entreprise_nom" value="{{ Setting::get('entreprise_nom', 'IDOIL ENERGY') }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Slogan (sous le logo)</label>
                    <input type="text" name="entreprise_slogan" value="{{ Setting::get('entreprise_slogan', 'Solutions Énergétiques') }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Description courte (footer)</label>
                    <textarea name="entreprise_description" rows="3"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none">{{ Setting::get('entreprise_description', 'Entreprise africaine spécialisée dans les solutions énergétiques innovantes et durables. Votre partenaire de confiance pour un avenir énergétique accessible.') }}</textarea>
                </div>
            </div>
        </div>

        {{-- ══ BLOC VISUEL À PROPOS ══ --}}
        <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-white/5 flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-500/10 border border-blue-500/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-chart-bar text-blue-400 text-sm"></i>
                </div>
                <h2 class="text-white font-semibold">Bloc Visuel — Page d'Accueil</h2>
                <span class="text-slate-500 text-xs ml-auto">Section "Qui sommes-nous"</span>
            </div>
            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Titre principal de la carte</label>
                        <input type="text" name="apropos_titre" value="{{ Setting::get('apropos_titre', 'IDOIL ENERGY') }}"
                            class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Sous-titre de la carte</label>
                        <input type="text" name="apropos_sous_titre" value="{{ Setting::get('apropos_sous_titre', 'Fournisseur de solutions énergétiques innovantes en Afrique') }}"
                            class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                    </div>
                </div>

                <div>
                    <p class="text-slate-400 text-xs font-semibold uppercase tracking-wider mb-3">3 Statistiques affichées</p>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach([
                            ['stat_1_valeur','stat_1_label','3+','Stations'],
                            ['stat_2_valeur','stat_2_label','6','Services'],
                            ['stat_3_valeur','stat_3_label','BF','Burkina'],
                        ] as [$kv,$kl,$dv,$dl])
                        <div class="bg-slate-800/50 rounded-xl p-4 border border-white/5">
                            <input type="text" name="{{ $kv }}" value="{{ Setting::get($kv, $dv) }}"
                                placeholder="Valeur"
                                class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-lg px-3 py-2 text-white text-sm font-bold outline-none transition-all mb-2">
                            <input type="text" name="{{ $kl }}" value="{{ Setting::get($kl, $dl) }}"
                                placeholder="Libellé"
                                class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-lg px-3 py-2 text-slate-400 text-xs outline-none transition-all">
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Badge — Ligne 1</label>
                        <input type="text" name="badge_ligne_1" value="{{ Setting::get('badge_ligne_1', 'Vision') }}"
                            class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Badge — Ligne 2</label>
                        <input type="text" name="badge_ligne_2" value="{{ Setting::get('badge_ligne_2', 'Panafricaine') }}"
                            class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                    </div>
                </div>
            </div>
        </div>

        {{-- ══ COORDONNÉES ══ --}}
        <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-white/5 flex items-center gap-3">
                <div class="w-8 h-8 bg-green-500/10 border border-green-500/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-map-marker-alt text-green-400 text-sm"></i>
                </div>
                <h2 class="text-white font-semibold">Coordonnées & Contact</h2>
            </div>
            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2"><i class="fas fa-map-marker-alt text-slate-500 mr-1"></i> Adresse</label>
                    <input type="text" name="contact_adresse" value="{{ Setting::get('contact_adresse', 'Ouagadougou, Burkina Faso') }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2"><i class="fas fa-phone text-slate-500 mr-1"></i> Téléphone principal</label>
                    <input type="text" name="contact_telephone" value="{{ Setting::get('contact_telephone', '+226 70 23 81 44') }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2"><i class="fas fa-phone text-slate-500 mr-1"></i> Téléphone secondaire</label>
                    <input type="text" name="contact_telephone_2" value="{{ Setting::get('contact_telephone_2', '+226 44 23 81 44') }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2"><i class="fas fa-envelope text-slate-500 mr-1"></i> Email principal</label>
                    <input type="email" name="contact_email" value="{{ Setting::get('contact_email', 'contact@idoil-energy.com') }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2"><i class="fas fa-envelope text-slate-500 mr-1"></i> Email secondaire</label>
                    <input type="email" name="contact_email_2" value="{{ Setting::get('contact_email_2', '') }}"
                        placeholder="optionnel"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2"><i class="fas fa-clock text-slate-500 mr-1"></i> Horaires — Semaine</label>
                    <input type="text" name="contact_horaires_semaine" value="{{ Setting::get('contact_horaires_semaine', 'Lundi – Vendredi : 7h30 – 17h30') }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2"><i class="fas fa-clock text-slate-500 mr-1"></i> Horaires — Samedi</label>
                    <input type="text" name="contact_horaires_samedi" value="{{ Setting::get('contact_horaires_samedi', 'Samedi : 8h00 – 13h00') }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
            </div>
        </div>

        {{-- ══ RÉSEAUX SOCIAUX ══ --}}
        <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-white/5 flex items-center gap-3">
                <div class="w-8 h-8 bg-purple-500/10 border border-purple-500/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-share-alt text-purple-400 text-sm"></i>
                </div>
                <h2 class="text-white font-semibold">Réseaux Sociaux</h2>
            </div>
            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">
                @foreach([
                    ['social_linkedin','fab fa-linkedin text-blue-400','LinkedIn','https://linkedin.com/company/...'],
                    ['social_facebook','fab fa-facebook text-blue-600','Facebook','https://facebook.com/...'],
                    ['social_twitter','fab fa-twitter text-sky-400','Twitter / X','https://twitter.com/...'],
                    ['social_youtube','fab fa-youtube text-red-500','YouTube','https://youtube.com/...'],
                ] as [$key,$icon,$label,$placeholder])
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2"><i class="{{ $icon }} mr-1"></i> {{ $label }}</label>
                    <input type="url" name="{{ $key }}" value="{{ Setting::get($key, '') }}"
                        placeholder="{{ $placeholder }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all font-mono text-xs">
                </div>
                @endforeach
            </div>
        </div>

        {{-- ══ IMAGES DU SITE ══ --}}
        <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-white/5 flex items-center gap-3">
                <div class="w-8 h-8 bg-pink-500/10 border border-pink-500/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-images text-pink-400 text-sm"></i>
                </div>
                <h2 class="text-white font-semibold">Images du Site</h2>
                <span class="text-slate-500 text-xs ml-auto">JPG, PNG, WebP — max 5 Mo</span>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Logo --}}
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-slate-300 mb-1">Logo de l'entreprise</p>
                    <p class="text-slate-500 text-xs mb-3">Affiché dans la barre de navigation. PNG avec fond transparent recommandé.</p>
                    <div class="relative rounded-xl overflow-hidden bg-slate-800 border border-white/10 mb-3 flex items-center justify-center" style="height:100px">
                        @php $logoFile = Setting::get('logo_fichier'); @endphp
                        @if($logoFile && file_exists(public_path($logoFile)))
                        <img id="preview-logo" src="/{{ $logoFile }}?{{ time() }}" alt="Logo" class="h-16 object-contain">
                        <div class="absolute top-2 right-2">
                            <span class="text-white text-xs font-medium bg-green-500/80 px-2 py-1 rounded-lg"><i class="fas fa-check-circle mr-1"></i>Logo en ligne</span>
                        </div>
                        @else
                        <div id="preview-logo" class="flex flex-col items-center justify-center text-slate-600">
                            <i class="fas fa-image text-3xl mb-1"></i>
                            <span class="text-xs">Aucun logo uploadé</span>
                        </div>
                        @endif
                    </div>
                    <label class="flex items-center justify-center gap-2 w-full cursor-pointer border-2 border-dashed border-white/10 hover:border-orange-500/50 rounded-xl p-4 transition-all group">
                        <i class="fas fa-upload text-slate-500 group-hover:text-orange-400 transition-colors"></i>
                        <span class="text-slate-400 group-hover:text-orange-400 text-sm transition-colors">Choisir / remplacer le logo</span>
                        <input type="file" name="image_logo" accept="image/*" class="hidden" onchange="previewImage(this,'preview-logo','label-logo')">
                    </label>
                    <p id="label-logo" class="text-slate-600 text-xs mt-2 text-center"></p>
                </div>

                {{-- Image Station (Hero) --}}
                <div>
                    <p class="text-sm font-medium text-slate-300 mb-1">Image Hero — Station</p>
                    <p class="text-slate-500 text-xs mb-3">Affichée dans la section principale de l'accueil et sur les projets.</p>

                    {{-- Aperçu actuel --}}
                    <div class="relative rounded-xl overflow-hidden bg-slate-800 border border-white/10 mb-3" style="height:160px">
                        @if(file_exists(public_path('images/station-idoil.jpg')))
                        <img id="preview-station" src="/images/station-idoil.jpg?{{ time() }}" alt="Station" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-3">
                            <span class="text-white text-xs font-medium"><i class="fas fa-check-circle text-green-400 mr-1"></i>Image en ligne</span>
                        </div>
                        @else
                        <div id="preview-station" class="w-full h-full flex flex-col items-center justify-center text-slate-600">
                            <i class="fas fa-image text-4xl mb-2"></i>
                            <span class="text-xs">Aucune image</span>
                        </div>
                        @endif
                    </div>

                    <label class="flex items-center justify-center gap-2 w-full cursor-pointer border-2 border-dashed border-white/10 hover:border-orange-500/50 rounded-xl p-4 transition-all group">
                        <i class="fas fa-upload text-slate-500 group-hover:text-orange-400 transition-colors"></i>
                        <span class="text-slate-400 group-hover:text-orange-400 text-sm transition-colors">Choisir / remplacer l'image</span>
                        <input type="file" name="image_station" accept="image/*" class="hidden" onchange="previewImage(this,'preview-station','label-station')">
                    </label>
                    <p id="label-station" class="text-slate-600 text-xs mt-2 text-center"></p>
                </div>

                {{-- Image Camions (À propos) --}}
                <div>
                    <p class="text-sm font-medium text-slate-300 mb-1">Image À propos — Camions</p>
                    <p class="text-slate-500 text-xs mb-3">Affichée dans la carte "Qui sommes-nous" de l'accueil.</p>

                    {{-- Aperçu actuel --}}
                    <div class="relative rounded-xl overflow-hidden bg-slate-800 border border-white/10 mb-3" style="height:160px">
                        @if(file_exists(public_path('images/camions-idoil.jpg')))
                        <img id="preview-camions" src="/images/camions-idoil.jpg?{{ time() }}" alt="Camions" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-3">
                            <span class="text-white text-xs font-medium"><i class="fas fa-check-circle text-green-400 mr-1"></i>Image en ligne</span>
                        </div>
                        @else
                        <div id="preview-camions" class="w-full h-full flex flex-col items-center justify-center text-slate-600">
                            <i class="fas fa-image text-4xl mb-2"></i>
                            <span class="text-xs">Aucune image</span>
                        </div>
                        @endif
                    </div>

                    <label class="flex items-center justify-center gap-2 w-full cursor-pointer border-2 border-dashed border-white/10 hover:border-orange-500/50 rounded-xl p-4 transition-all group">
                        <i class="fas fa-upload text-slate-500 group-hover:text-orange-400 transition-colors"></i>
                        <span class="text-slate-400 group-hover:text-orange-400 text-sm transition-colors">Choisir / remplacer l'image</span>
                        <input type="file" name="image_camions" accept="image/*" class="hidden" onchange="previewImage(this,'preview-camions','label-camions')">
                    </label>
                    <p id="label-camions" class="text-slate-600 text-xs mt-2 text-center"></p>
                </div>

            </div>
        </div>

        {{-- Bouton sauvegarder --}}
        <div class="flex justify-end">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3.5 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2 shadow-lg shadow-orange-500/20">
                <i class="fas fa-save"></i> Enregistrer les paramètres
            </button>
        </div>

    </div>
</form>
@endsection

@push('scripts')
<script>
function previewImage(input, previewId, labelId) {
    const file = input.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const container = document.getElementById(previewId);
        container.innerHTML = '<img src="' + e.target.result + '" class="w-full h-full object-cover">';
        const label = document.getElementById(labelId);
        if (label) label.textContent = file.name + ' (' + (file.size / 1024).toFixed(0) + ' Ko) — prêt à enregistrer';
    };
    reader.readAsDataURL(file);
}
</script>
@endpush
