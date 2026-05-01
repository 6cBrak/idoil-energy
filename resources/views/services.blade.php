@extends('layouts.app')

@section('title', 'Nos Services')
@section('meta_description', 'Découvrez la gamme complète de services d\'Idoil Energy : exploration, transport, raffinage, maintenance industrielle, conseil et HSE.')

@section('content')

<!-- Hero -->
<section class="hero-gradient pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-primary-400 font-semibold text-sm uppercase tracking-widest">Ce que nous proposons</span>
        <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">Nos Services</h1>
        <p class="text-gray-300 text-xl max-w-2xl mx-auto">
            IDOIL ENERGY intervient sur l'ensemble de la chaîne de valeur énergétique avec des solutions adaptées aux réalités africaines.
        </p>
    </div>
</section>

<!-- Services -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $defaultServices = [
            ['bolt','Exploration & Forage','Identification et exploitation des gisements','Nous utilisons les technologies sismiques et de forage les plus avancées pour identifier et exploiter efficacement les gisements pétroliers et gaziers. Notre équipe de géologues et ingénieurs de forage travaille avec précision pour maximiser le potentiel de chaque site d\'exploration.','Sismique 3D, Forage directionnel, Logging géologique, Tests de puits, Évaluation des réservoirs'],
            ['truck-fast','Transport & Logistique','Acheminement sécurisé des hydrocarbures','Solutions de transport intégrées pour vos hydrocarbures : pipeline, transport routier en citerne et maritime. Nous assurons la traçabilité et la sécurité de chaque chargement grâce à des systèmes de monitoring en temps réel.','Transport par pipeline, Camions-citernes, Transport maritime, Tracking GPS, Gestion de flotte'],
            ['flask','Raffinage & Traitement','Transformation des matières premières','Notre expertise en raffinage permet de transformer vos bruts et condensats en produits à haute valeur ajoutée. Nous gérons des unités de distillation atmosphérique et sous vide, d\'hydrotraitement et de reforming catalytique.','Distillation, Hydrotraitement, Reforming catalytique, Cracking, Contrôle qualité'],
            ['wrench','Maintenance Industrielle','Maintenance préventive et corrective','Programmes de maintenance sur mesure pour vos installations pétrolières et gazières : maintenance préventive planifiée, corrective d\'urgence et prédictive basée sur l\'analyse vibratoire et thermographique.','Maintenance préventive, Corrective, Prédictive, Inspection, Réhabilitation'],
            ['lightbulb','Conseil & Ingénierie','Expertise technique et stratégique','Notre bureau d\'ingénierie accompagne vos projets de A à Z : études de faisabilité, conception, FEED, ingénierie de détail et suivi de construction. Nous optimisons vos investissements avec des solutions innovantes.','Études FEED, Ingénierie de détail, Gestion de projet, Optimisation, Formation'],
            ['shield-halved','Sécurité & HSE','Conformité aux normes internationales','Mise en place et audits de systèmes de management HSE (Santé, Sécurité, Environnement) conformes aux normes ISO 45001 et ISO 14001. Formation du personnel, analyse des risques et plans d\'urgence.','Audit HSE, Formation sécurité, HAZOP, Analyse de risque, Plans d\'urgence'],
            ['solar-panel','Énergie Renouvelable','Solutions durables et innovantes','Accompagnement dans la transition énergétique : études et réalisation de projets solaires, éoliens et hybrides pour les sites industriels pétroliers et gaziers. Réduction de l\'empreinte carbone et des coûts opérationnels.','Énergie solaire, Éolien, Stockage énergie, Hybridation, Audit énergétique'],
            ['chart-line','Optimisation de Production','Maximisation des rendements','Analyse et optimisation de vos processus de production pour améliorer les taux de récupération, réduire les coûts opérationnels et augmenter la durée de vie de vos actifs. Utilisation des outils de simulation réservoir avancés.','Simulation réservoir, IOR/EOR, Production chimique, Analyse de données, Reporting'],
        ];
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @forelse($services as $service)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 animate-on-scroll group">
                <div class="flex">
                    <div class="w-2 bg-primary-500 flex-shrink-0"></div>
                    <div class="p-8 flex-1">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 bg-primary-50 group-hover:bg-primary-500 rounded-xl flex items-center justify-center flex-shrink-0 transition-colors duration-300">
                                <i class="fas fa-{{ $service->icone }} text-primary-500 group-hover:text-white text-xl transition-colors duration-300"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-navy-800 mb-2">{{ $service->titre }}</h3>
                                <p class="text-primary-500 text-sm font-medium mb-4">{{ $service->description }}</p>
                                <p class="text-gray-500 text-sm leading-relaxed">{{ $service->description_longue }}</p>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <a href="{{ route('contact') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-700">
                                Demander un devis <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @foreach($defaultServices as [$icon, $titre, $sous, $desc, $skills])
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 animate-on-scroll group">
                <div class="flex">
                    <div class="w-2 bg-primary-500 flex-shrink-0"></div>
                    <div class="p-8 flex-1">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 bg-primary-50 group-hover:bg-primary-500 rounded-xl flex items-center justify-center flex-shrink-0 transition-colors duration-300">
                                <i class="fas fa-{{ $icon }} text-primary-500 group-hover:text-white text-xl transition-colors duration-300"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-navy-800 mb-1">{{ $titre }}</h3>
                                <p class="text-primary-500 text-sm font-semibold mb-3">{{ $sous }}</p>
                                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $desc }}</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach(explode(', ', $skills) as $skill)
                                    <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <a href="{{ route('contact') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-700">
                                Demander un devis <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- Processus de travail -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <span class="text-primary-500 font-semibold text-sm uppercase tracking-widest">Comment nous travaillons</span>
            <h2 class="text-4xl font-extrabold text-navy-800 mt-2 mb-4">Notre Processus</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach([
                ['01','Analyse','Analyse approfondie de vos besoins et de votre contexte opérationnel.','comments'],
                ['02','Proposition','Élaboration d\'une solution technique et commerciale sur mesure.','file-alt'],
                ['03','Réalisation','Mise en œuvre avec des équipes expertes et un suivi qualité rigoureux.','cogs'],
                ['04','Suivi','Accompagnement post-livraison et support technique continu.','chart-line'],
            ] as [$num, $titre, $desc, $icon])
            <div class="text-center animate-on-scroll relative">
                <div class="w-20 h-20 bg-primary-50 border-2 border-primary-200 rounded-2xl flex items-center justify-center mx-auto mb-5 relative">
                    <span class="text-2xl font-black text-primary-500">{{ $num }}</span>
                    <div class="absolute -top-2 -right-2 w-7 h-7 bg-primary-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-{{ $icon }} text-white text-xs"></i>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-navy-800 mb-2">{{ $titre }}</h3>
                <p class="text-gray-500 text-sm">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 hero-gradient">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-extrabold text-white mb-4">Besoin d'un Service Spécifique ?</h2>
        <p class="text-gray-300 text-xl mb-8">Parlez-nous de votre projet. Nos experts vous proposeront la solution la plus adaptée.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center bg-primary-500 hover:bg-primary-600 text-white px-10 py-4 rounded-xl font-bold text-lg transition-all hover:shadow-xl hover:shadow-primary-500/30">
            <i class="fas fa-envelope mr-2"></i> Demander un Devis Gratuit
        </a>
    </div>
</section>

@endsection
