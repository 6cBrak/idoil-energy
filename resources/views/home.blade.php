@extends('layouts.app')

@section('title', 'Accueil')
@section('meta_description', 'Idoil Energy - Expert en solutions énergétiques, pétrolières et gazières. Exploration, transport, raffinage et maintenance industrielle.')

@section('content')

<!-- ========== HERO ========== -->
<section class="hero-gradient min-h-screen flex items-center relative overflow-hidden">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <!-- Animated circles -->
    <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 left-1/4 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-16 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Text -->
            <div>
                <div class="inline-flex items-center bg-primary-500/20 border border-primary-500/30 rounded-full px-4 py-2 mb-6">
                    <span class="w-2 h-2 bg-primary-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-primary-400 text-sm font-medium">Solutions Énergétiques Innovantes en Afrique</span>
                </div>

                <h1 class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    L'Énergie<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 to-orange-300">Pour Tous, Partout</span>
                </h1>

                <p class="text-gray-300 text-xl leading-relaxed mb-10 max-w-xl">
                    IDOIL ENERGY est une entreprise africaine spécialisée dans les solutions énergétiques innovantes et durables, répondant aux besoins croissants du continent.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('services') }}" class="inline-flex items-center justify-center bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-xl font-semibold text-base transition-all duration-200 hover:shadow-xl hover:shadow-primary-500/30 group">
                        Nos Services
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center border border-white/30 hover:border-primary-400 text-white hover:text-primary-400 px-8 py-4 rounded-xl font-semibold text-base transition-all duration-200 backdrop-blur-sm hover:bg-white/5">
                        <i class="fas fa-envelope mr-2"></i>
                        Nous Contacter
                    </a>
                </div>

                <!-- Stats rapides -->
                <div class="flex flex-wrap gap-8 mt-12 pt-12 border-t border-white/10">
                    <div>
                        <p class="text-3xl font-bold text-white">6</p>
                        <p class="text-gray-400 text-sm mt-1">Domaines de service</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-white">3<span class="text-primary-400">+</span></p>
                        <p class="text-gray-400 text-sm mt-1">Stations réalisées</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-white">100<span class="text-primary-400">%</span></p>
                        <p class="text-gray-400 text-sm mt-1">Qualité garantie</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-white">BF</p>
                        <p class="text-gray-400 text-sm mt-1">Burkina Faso</p>
                    </div>
                </div>
            </div>

            <!-- Visual Hero — Station IDOIL -->
            <div class="hidden lg:block relative">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-black/50 border border-white/10">
                    @if(file_exists(public_path('images/station-idoil.jpg')))
                    <img src="/images/station-idoil.jpg" alt="Station IDOIL ENERGY" class="w-full h-auto object-cover">
                    @else
                    <div class="aspect-[4/3] bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center">
                        <div class="text-center text-white opacity-40">
                            <i class="fas fa-image text-6xl mb-3 block"></i>
                            <p class="text-sm">Déposer : public/images/station-idoil.jpg</p>
                        </div>
                    </div>
                    @endif
                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-900/80 via-transparent to-transparent pointer-events-none"></div>
                    <!-- Service badges -->
                    <div class="absolute bottom-5 left-5 right-5 grid grid-cols-2 gap-2">
                        @foreach([
                            ['fas fa-gas-pump','Hydrocarbures'],
                            ['fas fa-sun','Énergie Solaire'],
                            ['fas fa-truck','Logistique'],
                            ['fas fa-bolt','Recharge Élec.'],
                        ] as [$icon, $label])
                        <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl px-3 py-2 flex items-center gap-2">
                            <i class="{{ $icon }} text-primary-400 text-xs"></i>
                            <span class="text-white text-xs font-medium">{{ $label }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center animate-bounce">
        <span class="text-gray-400 text-xs mb-2">Défiler</span>
        <i class="fas fa-chevron-down text-primary-400"></i>
    </div>
</section>

<!-- ========== SERVICES APERÇU ========== -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <span class="text-primary-500 font-semibold text-sm uppercase tracking-widest">Ce que nous faisons</span>
            <h2 class="text-4xl font-extrabold text-navy-800 mt-2 mb-4">Nos Domaines d'Expertise</h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                De l'exploration à la distribution, nous couvrons l'ensemble de la chaîne de valeur énergétique avec des équipes hautement qualifiées.
            </p>
        </div>

        <!-- Services grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-gray-100 card-hover group animate-on-scroll">
                <div class="w-14 h-14 bg-primary-50 group-hover:bg-primary-500 rounded-xl flex items-center justify-center mb-6 transition-colors duration-300">
                    <i class="fas fa-{{ $service->icone }} text-primary-500 group-hover:text-white text-xl transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-navy-800 mb-3">{{ $service->titre }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $service->description }}</p>
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <a href="{{ route('services') }}" class="text-primary-500 font-semibold text-sm hover:text-primary-700 flex items-center group-inner">
                        En savoir plus <i class="fas fa-arrow-right ml-2 text-xs group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
            @empty
            @foreach([
                ['bolt','Exploration & Forage','Identification et exploitation des gisements pétroliers et gaziers avec des technologies de pointe.'],
                ['truck-fast','Transport & Logistique','Acheminement sécurisé de vos hydrocarbures par pipeline, route et voie maritime.'],
                ['flask','Raffinage & Traitement','Transformation des matières premières en produits raffinés selon les plus hauts standards.'],
                ['wrench','Maintenance Industrielle','Maintenance préventive et corrective de vos installations pour une disponibilité maximale.'],
                ['lightbulb','Conseil & Ingénierie','Expertise technique et conseil stratégique pour optimiser vos opérations énergétiques.'],
                ['shield-halved','Sécurité & HSE','Mise en conformité et gestion des risques selon les normes internationales HSE.'],
            ] as [$icon, $titre, $desc])
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-gray-100 card-hover group animate-on-scroll">
                <div class="w-14 h-14 bg-primary-50 group-hover:bg-primary-500 rounded-xl flex items-center justify-center mb-6 transition-colors duration-300">
                    <i class="fas fa-{{ $icon }} text-primary-500 group-hover:text-white text-xl transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-navy-800 mb-3">{{ $titre }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <a href="{{ route('services') }}" class="text-primary-500 font-semibold text-sm hover:text-primary-700 flex items-center">
                        En savoir plus <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="inline-flex items-center bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-200 hover:shadow-xl hover:shadow-primary-500/30">
                Voir tous les services <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- ========== À PROPOS APERÇU ========== -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left: Visual -->
            <div class="relative animate-on-scroll">
                @php
                use App\Models\Setting;
                $s1v = Setting::get('stat_1_valeur','3+'); $s1l = Setting::get('stat_1_label','Stations');
                $s2v = Setting::get('stat_2_valeur','6');  $s2l = Setting::get('stat_2_label','Services');
                $s3v = Setting::get('stat_3_valeur','BF'); $s3l = Setting::get('stat_3_label','Burkina');
                @endphp
                <div class="aspect-[4/3] rounded-3xl overflow-hidden relative shadow-xl">
                    @if(file_exists(public_path('images/camions-idoil.jpg')))
                    <img src="/images/camions-idoil.jpg" alt="Flotte IDOIL ENERGY" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-navy-800 to-navy-900 flex items-center justify-center">
                        <div class="text-center text-white p-8 opacity-40">
                            <i class="fas fa-image text-6xl mb-3 block"></i>
                            <p class="text-xs">Déposer : public/images/camions-idoil.jpg</p>
                        </div>
                    </div>
                    @endif
                    <!-- Gradient overlay bas -->
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-900/90 via-navy-900/20 to-transparent pointer-events-none"></div>
                    <!-- Overlay cards stats -->
                    <div class="absolute bottom-6 left-6 right-6 grid grid-cols-3 gap-3">
                        @foreach([[$s1v,$s1l],[$s2v,$s2l],[$s3v,$s3l]] as [$n, $l])
                        <div class="bg-white/10 backdrop-blur rounded-xl p-3 text-center border border-white/20">
                            <p class="text-white font-bold text-lg">{{ $n }}</p>
                            <p class="text-gray-300 text-xs">{{ $l }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Badge -->
                <div class="absolute -top-6 -right-6 w-28 h-28 bg-primary-500 rounded-2xl flex flex-col items-center justify-center shadow-2xl shadow-primary-500/40">
                    <i class="fas fa-globe-africa text-white text-2xl mb-1"></i>
                    <p class="text-white text-xs font-bold text-center leading-tight">{{ Setting::get('badge_ligne_1','Vision') }}<br>{{ Setting::get('badge_ligne_2','Panafricaine') }}</p>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="animate-on-scroll">
                <span class="text-primary-500 font-semibold text-sm uppercase tracking-widest">Qui sommes-nous</span>
                <h2 class="text-4xl font-extrabold text-navy-800 mt-2 mb-6">
                    IDOIL ENERGY, Votre Partenaire Énergétique en Afrique
                </h2>
                <p class="text-gray-500 text-lg leading-relaxed mb-6">
                    IDOIL ENERGY est une entreprise africaine spécialisée dans les solutions énergétiques innovantes et durables, avec une ambition claire : répondre efficacement aux besoins énergétiques croissants du continent.
                </p>
                <p class="text-gray-500 leading-relaxed mb-8">
                    Positionnée comme un acteur dynamique du secteur, IDOIL ENERGY intervient sur l'ensemble de la chaîne de valeur énergétique, en proposant des solutions adaptées aux réalités africaines, notamment dans les zones urbaines en expansion et les régions sous-électrifiées.
                </p>

                <!-- Values -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    @foreach([
                        ['check-circle','Efficacité'],
                        ['lightbulb','Innovation'],
                        ['shield-halved','Fiabilité'],
                        ['star','Excellence'],
                    ] as [$icon, $val])
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-{{ $icon }} text-primary-500 flex-shrink-0"></i>
                        <span class="text-gray-600 text-sm font-medium">{{ $val }}</span>
                    </div>
                    @endforeach
                </div>

                <a href="{{ route('apropos') }}" class="inline-flex items-center bg-navy-800 hover:bg-navy-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-200 hover:shadow-lg group">
                    En savoir plus sur nous
                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ========== CHIFFRES CLÉS ========== -->
<section class="hero-gradient py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach([
                ['3+','Stations Construites','fas fa-gas-pump'],
                ['6','Domaines de Service','fas fa-layer-group'],
                ['100%','Satisfaction Client','fas fa-handshake'],
                ['2030','Vision Panafricaine','fas fa-globe-africa'],
            ] as [$num, $label, $icon])
            <div class="animate-on-scroll">
                <div class="w-16 h-16 bg-primary-500/20 border border-primary-500/30 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="{{ $icon }} text-primary-400 text-2xl"></i>
                </div>
                <p class="text-5xl font-extrabold text-white mb-2">{{ $num }}</p>
                <p class="text-gray-400 font-medium">{{ $label }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== PROJETS EN VEDETTE ========== -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
            <div class="animate-on-scroll">
                <span class="text-primary-500 font-semibold text-sm uppercase tracking-widest">Nos réalisations</span>
                <h2 class="text-4xl font-extrabold text-navy-800 mt-2">Projets en Vedette</h2>
            </div>
            <a href="{{ route('projets') }}" class="text-primary-500 font-semibold hover:text-primary-700 flex items-center group animate-on-scroll">
                Voir tous les projets <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projets as $projet)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 card-hover animate-on-scroll">
                <div class="aspect-video relative overflow-hidden">
                    @if(file_exists(public_path('images/station-idoil.jpg')))
                    <img src="/images/station-idoil.jpg" alt="{{ $projet->titre }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-navy-900/50"></div>
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center">
                        <i class="fas fa-gas-pump text-primary-400 text-5xl opacity-60"></i>
                    </div>
                    @endif
                    <div class="absolute top-4 left-4">
                        <span class="bg-primary-500 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $projet->categorie }}</span>
                    </div>
                    <div class="absolute bottom-4 right-4">
                        <span class="bg-black/40 backdrop-blur text-white text-xs px-2 py-1 rounded-lg">{{ $projet->annee }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-navy-800 mb-2">{{ $projet->titre }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($projet->description, 100) }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        <span><i class="fas fa-map-marker-alt mr-1 text-primary-400"></i>{{ $projet->localisation }}</span>
                        <span><i class="fas fa-calendar mr-1 text-primary-400"></i>{{ $projet->annee }}</span>
                    </div>
                </div>
            </div>
            @empty
            @foreach([
                ['Pipeline Hassi Rmel','Pétrole & Gaz','Construction d\'un pipeline de 250 km reliant les champs pétroliers aux terminaux de distribution.','Hassi Rmel, Algérie','2023'],
                ['Plateforme Offshore Nord','Offshore','Installation et mise en service d\'une plateforme de forage offshore en mer Méditerranée.','Méditerranée','2022'],
                ['Raffinerie Arzew','Raffinage','Extension et modernisation de la raffinerie d\'Arzew pour augmenter la capacité de traitement.','Arzew, Algérie','2022'],
            ] as [$titre, $cat, $desc, $loc, $annee])
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 card-hover animate-on-scroll">
                <div class="aspect-video bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center relative">
                    <i class="fas fa-oil-well text-primary-400 text-5xl opacity-60"></i>
                    <div class="absolute top-4 left-4">
                        <span class="bg-primary-500 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $cat }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-navy-800 mb-2">{{ $titre }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $desc }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        <span><i class="fas fa-map-marker-alt mr-1 text-primary-400"></i>{{ $loc }}</span>
                        <span><i class="fas fa-calendar mr-1 text-primary-400"></i>{{ $annee }}</span>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- ========== CATALOGUE CTA ========== -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-navy-800 to-navy-900 rounded-3xl p-12 lg:p-16 relative overflow-hidden">
            <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 30px 30px;"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="w-16 h-16 bg-primary-500/20 border border-primary-500/30 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-book-open text-primary-400 text-2xl"></i>
                    </div>
                    <h2 class="text-4xl font-extrabold text-white mb-4">Notre Catalogue<br><span class="text-primary-400">Produits & Équipements</span></h2>
                    <p class="text-gray-300 text-lg leading-relaxed mb-8">
                        Explorez notre gamme complète de produits énergétiques, équipements de station et solutions solaires. Téléchargez notre catalogue 2026.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('catalogue') }}" class="inline-flex items-center justify-center bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-200 hover:shadow-xl hover:shadow-primary-500/30">
                            <i class="fas fa-eye mr-2"></i> Voir le Catalogue
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center border border-white/30 hover:border-primary-400 text-white hover:text-primary-400 px-8 py-4 rounded-xl font-semibold transition-all duration-200 hover:bg-white/5">
                            <i class="fas fa-file-pdf mr-2"></i> Demander un Devis
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @foreach([
                        ['gas-pump','Carburants & Hydrocarbures'],
                        ['fire-flame-curved','Gaz & Lubrifiants'],
                        ['sun','Énergie Solaire'],
                        ['bolt','Bornes de Recharge'],
                        ['building','Équipements de Station'],
                        ['hard-hat','Équipements HSE'],
                    ] as [$icon, $cat])
                    <div class="bg-white/5 border border-white/10 hover:border-primary-500/40 hover:bg-primary-500/10 rounded-xl p-4 text-center transition-all duration-200 cursor-pointer">
                        <i class="fas fa-{{ $icon }} text-primary-400 text-2xl mb-2"></i>
                        <p class="text-white text-sm font-medium">{{ $cat }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CONTACT CTA ========== -->
<section class="py-20 bg-primary-500 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 25px 25px;"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-4xl font-extrabold text-white mb-4">Prêt à Démarrer Votre Projet ?</h2>
        <p class="text-orange-100 text-xl mb-10">
            Contactez nos experts dès aujourd'hui pour discuter de vos besoins et obtenir une solution personnalisée.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center bg-white text-primary-600 hover:text-primary-700 hover:bg-orange-50 px-10 py-4 rounded-xl font-bold text-lg transition-all duration-200 hover:shadow-2xl">
                <i class="fas fa-envelope mr-2"></i> Nous Contacter
            </a>
            <a href="tel:+22670238144" class="inline-flex items-center justify-center border-2 border-white text-white hover:bg-white hover:text-primary-600 px-10 py-4 rounded-xl font-bold text-lg transition-all duration-200">
                <i class="fas fa-phone mr-2"></i> +226 70 23 81 44
            </a>
        </div>
    </div>
</section>

@endsection
