@extends('layouts.app')

@section('title', 'Nos Projets')
@section('meta_description', 'Découvrez les projets réalisés par Idoil Energy dans le secteur pétrolier et gazier à travers l\'Afrique et le Moyen-Orient.')

@section('content')

<!-- Hero -->
<section class="hero-gradient pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-primary-400 font-semibold text-sm uppercase tracking-widest">Notre Portfolio</span>
        <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">Nos Projets</h1>
        <p class="text-gray-300 text-xl max-w-2xl mx-auto">
            Plus de 200 projets réalisés en Afrique et au Moyen-Orient. Découvrez nos réalisations emblématiques.
        </p>

        <!-- Stats -->
        <div class="flex justify-center gap-12 mt-12">
            @foreach([['3+','Stations construites'],['6','Services'],['2030','Vision']] as [$n,$l])
            <div>
                <p class="text-3xl font-extrabold text-white">{{ $n }}</p>
                <p class="text-gray-400 text-sm">{{ $l }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Filtres + Projets -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Filtres -->
        <div class="flex flex-wrap justify-center gap-3 mb-12" id="filters">
            <button data-filter="all" class="filter-btn active px-5 py-2.5 rounded-full font-semibold text-sm bg-primary-500 text-white transition-all">
                Tous les projets
            </button>
            @php
            $cats = $categories->isNotEmpty() ? $categories : collect(['Pétrole & Gaz','Offshore','Raffinage','Pipeline','Maintenance','Conseil']);
            @endphp
            @foreach($cats as $cat)
            <button data-filter="{{ $cat }}" class="filter-btn px-5 py-2.5 rounded-full font-semibold text-sm bg-white text-gray-600 border border-gray-200 hover:border-primary-400 hover:text-primary-500 transition-all">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        <!-- Grid projets -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-grid">
            @php
            $defaultProjects = [
                ['Pipeline Hassi Rmel – Alger','Pétrole & Gaz','Construction d\'un pipeline de 250 km reliant les champs pétroliers aux terminaux de distribution d\'Alger. Gestion complète EPC.','Hassi Rmel, Algérie','2023','Sonatrach','Réalisé','oil-well'],
                ['Plateforme Offshore Méditerranée','Offshore','Installation et mise en service d\'une plateforme de forage offshore en mer Méditerranée. Capacité de production 10 000 bbl/jour.','Mer Méditerranée','2022','Eni Algeria','Réalisé','anchor'],
                ['Extension Raffinerie Arzew','Raffinage','Extension et modernisation de la raffinerie d\'Arzew, augmentant la capacité de traitement de 30% et réduisant les émissions CO₂.','Arzew, Algérie','2022','Naftal','Réalisé','flask'],
                ['Pipeline In Amenas','Pipeline','Pose et mise en service d\'un pipeline de transport de gaz naturel de 180 km en zone saharienne.','In Amenas, Algérie','2021','BP Algeria','Réalisé','pipe-section'],
                ['Maintenance Plateforme Ourhoud','Maintenance','Programme de maintenance préventive et corrective de la plateforme Ourhoud incluant 45 000 heures travail.','Hassi Messaoud','2023','Groupement Berkine','En cours','wrench'],
                ['Étude FEED Terminal GNL','Conseil','Réalisation de l\'ingénierie FEED pour un nouveau terminal GNL d\'une capacité de 3 millions de tonnes/an.','Skikda, Algérie','2023','GDF Suez','Réalisé','lightbulb'],
                ['Station de Compression Reggane','Pétrole & Gaz','Conception et construction d\'une station de compression de gaz haute pression pour le réseau de transport national.','Reggane, Algérie','2021','GTP','Réalisé','bolt'],
                ['Audit HSE Champ Rhourde Nouss','Conseil','Audit complet du système HSE du champ de production de Rhourde Nouss et mise en conformité ISO 45001.','Illizi, Algérie','2022','Sonatrach/Repsol','Réalisé','shield-halved'],
                ['Projet Énergie Solaire Tamanrasset','Maintenance','Installation de 5 MW de panneaux solaires pour alimenter les installations de production en zone isolée.','Tamanrasset','2024','Sonatrach','En cours','solar-panel'],
            ];
            @endphp

            @forelse($projets as $projet)
            <div class="project-card bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 card-hover animate-on-scroll" data-category="{{ $projet->categorie }}">
                <div class="aspect-video relative overflow-hidden">
                    @if(file_exists(public_path('images/station-idoil.jpg')))
                    <img src="/images/station-idoil.jpg" alt="{{ $projet->titre }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-navy-900/40"></div>
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center">
                        <i class="fas fa-gas-pump text-primary-400 text-5xl opacity-50"></i>
                    </div>
                    @endif
                    <div class="absolute inset-0 flex items-end p-4">
                        <div class="flex gap-2">
                            <span class="bg-primary-500 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $projet->categorie }}</span>
                            <span class="bg-{{ $projet->statut === 'En cours' ? 'green' : 'blue' }}-500 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $projet->statut }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-navy-800 mb-2">{{ $projet->titre }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($projet->description, 120) }}</p>
                    <div class="grid grid-cols-2 gap-2 text-xs text-gray-400">
                        <span class="flex items-center"><i class="fas fa-map-marker-alt mr-1.5 text-primary-400"></i>{{ $projet->localisation }}</span>
                        <span class="flex items-center"><i class="fas fa-calendar mr-1.5 text-primary-400"></i>{{ $projet->annee }}</span>
                        @if($projet->client)
                        <span class="flex items-center col-span-2"><i class="fas fa-building mr-1.5 text-primary-400"></i>{{ $projet->client }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            @foreach($defaultProjects as [$titre, $cat, $desc, $loc, $annee, $client, $statut, $icon])
            <div class="project-card bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 card-hover animate-on-scroll" data-category="{{ $cat }}">
                <div class="aspect-video bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center relative">
                    <i class="fas fa-{{ $icon }} text-primary-400 text-5xl opacity-50"></i>
                    <div class="absolute inset-0 flex items-end p-4">
                        <div class="flex gap-2">
                            <span class="bg-primary-500 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $cat }}</span>
                            <span class="bg-{{ $statut === 'En cours' ? 'green' : 'blue' }}-500/80 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full">{{ $statut }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-navy-800 mb-2">{{ $titre }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $desc }}</p>
                    <div class="grid grid-cols-2 gap-2 text-xs text-gray-400">
                        <span class="flex items-center"><i class="fas fa-map-marker-alt mr-1.5 text-primary-400"></i>{{ $loc }}</span>
                        <span class="flex items-center"><i class="fas fa-calendar mr-1.5 text-primary-400"></i>{{ $annee }}</span>
                        <span class="flex items-center col-span-2"><i class="fas fa-building mr-1.5 text-primary-400"></i>{{ $client }}</span>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-primary-500">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-extrabold text-white mb-4">Votre Projet, Notre Expertise</h2>
        <p class="text-orange-100 text-xl mb-8">Discutons de votre prochain projet et voyons comment Idoil Energy peut vous accompagner.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center bg-white text-primary-600 hover:bg-orange-50 px-10 py-4 rounded-xl font-bold text-lg transition-all hover:shadow-2xl">
            <i class="fas fa-handshake mr-2"></i> Démarrer un Projet
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;

            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('bg-primary-500', 'text-white');
                b.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-200');
            });
            btn.classList.add('bg-primary-500', 'text-white');
            btn.classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-200');

            // Filter cards
            projectCards.forEach(card => {
                if (filter === 'all' || card.dataset.category === filter) {
                    card.style.display = '';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                        card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                    }, 50);
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
