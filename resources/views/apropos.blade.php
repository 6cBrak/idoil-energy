@extends('layouts.app')

@section('title', 'À Propos')
@section('meta_description', 'Découvrez l\'histoire, la mission et les valeurs d\'Idoil Energy, expert en solutions énergétiques depuis 2009.')

@section('content')

<!-- Hero -->
<section class="hero-gradient pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-primary-400 font-semibold text-sm uppercase tracking-widest">Notre Entreprise</span>
        <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">À Propos d'IDOIL ENERGY</h1>
        <p class="text-gray-300 text-xl max-w-3xl mx-auto">
            Entreprise africaine spécialisée dans les solutions énergétiques innovantes et durables, avec une ambition claire : répondre aux besoins énergétiques croissants du continent.
        </p>
    </div>
</section>

<!-- Mission / Vision / Valeurs -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['target','Notre Mission','bg-primary-50 border-primary-200','text-primary-500','Fournir des solutions énergétiques fiables, accessibles et durables, afin de soutenir le développement économique, l\'industrialisation et le bien-être des populations en Afrique.'],
                ['eye','Notre Vision','bg-blue-50 border-blue-200','text-blue-500','Devenir une référence panafricaine dans le secteur de l\'énergie, en offrant des solutions innovantes, fiables et durables. À l\'horizon 2030, être un acteur clé de la sécurité énergétique en Afrique, garantissant un accès stable et équitable à l\'énergie.'],
                ['heart','Nos Valeurs','bg-orange-50 border-orange-200','text-orange-500','Efficacité · Innovation · Fiabilité · Excellence'],
            ] as [$icon, $titre, $bg, $color, $text])
            <div class="border {{ $bg }} rounded-2xl p-8 text-center animate-on-scroll hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 {{ $bg }} border {{ str_replace('50', '200', $bg) }} rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <i class="fas fa-{{ $icon }} {{ $color }} text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-navy-800 mb-4">{{ $titre }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $text }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Histoire -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <span class="text-primary-500 font-semibold text-sm uppercase tracking-widest">Notre Parcours</span>
            <h2 class="text-4xl font-extrabold text-navy-800 mt-2 mb-4">Notre Histoire</h2>
        </div>

        <div class="relative">
            <!-- Timeline line -->
            <div class="absolute left-1/2 -translate-x-px top-0 bottom-0 w-0.5 bg-primary-200 hidden md:block"></div>

            <div class="space-y-12">
                @foreach([
                    ['Création','Fondation d\'IDOIL ENERGY','IDOIL ENERGY est fondée au Burkina Faso avec pour mission de répondre aux besoins énergétiques croissants du continent africain à travers des solutions innovantes, fiables et accessibles.','left'],
                    ['Premiers Projets','Déploiement initial','Réalisation des premiers projets de fourniture d\'hydrocarbures et de logistique énergétique au Burkina Faso. Constitution d\'une flotte de camions-citernes et mise en place du réseau de distribution.','right'],
                    ['Développement','Expansion des services','Lancement des activités Gaz & Lubrifiants et développement du portefeuille clients. IDOIL ENERGY s\'impose comme un acteur de référence sur le marché burkinabè de l\'énergie.','left'],
                    ['Transition Verte','Énergie Solaire & Recharge Élec.','Dans le cadre de la transition énergétique africaine, IDOIL ENERGY lance son pôle Énergie Solaire et déploie les premières bornes de recharge électrique au Burkina Faso.','right'],
                    ['Réalisations','Stations-Service','Construction et équipement de stations-service modernes à Dori, Ouagadougou et Bobo-Dioulasso. IDOIL ENERGY confirme son expertise en infrastructures énergétiques.','left'],
                    ['2026 et au-delà','Vision Panafricaine','IDOIL ENERGY se positionne comme un acteur clé de la sécurité énergétique en Afrique, avec l\'ambition de devenir une référence panafricaine à l\'horizon 2030.','right'],
                ] as [$year, $titre, $desc, $side])
                <div class="relative grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    @if($side === 'left')
                        <div class="md:text-right animate-on-scroll">
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow inline-block w-full">
                                <span class="text-primary-500 font-bold text-lg">{{ $year }}</span>
                                <h3 class="text-xl font-bold text-navy-800 mt-1 mb-3">{{ $titre }}</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                            </div>
                        </div>
                        <div class="hidden md:flex items-center justify-start">
                            <div class="w-5 h-5 bg-primary-500 rounded-full border-4 border-white shadow-md -ml-2.5"></div>
                        </div>
                    @else
                        <div class="hidden md:flex items-center justify-end">
                            <div class="w-5 h-5 bg-primary-500 rounded-full border-4 border-white shadow-md -mr-2.5"></div>
                        </div>
                        <div class="animate-on-scroll">
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                                <span class="text-primary-500 font-bold text-lg">{{ $year }}</span>
                                <h3 class="text-xl font-bold text-navy-800 mt-1 mb-3">{{ $titre }}</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Équipe -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <span class="text-primary-500 font-semibold text-sm uppercase tracking-widest">Notre Équipe</span>
            <h2 class="text-4xl font-extrabold text-navy-800 mt-2 mb-4">La Direction</h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">Une équipe engagée au service du développement énergétique de l'Afrique.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($teamMembers as $member)
            <div class="text-center animate-on-scroll group">
                <div class="w-32 h-32 bg-gradient-to-br from-navy-600 to-navy-800 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-xl group-hover:shadow-2xl transition-shadow">
                    <i class="fas fa-user text-gray-400 text-4xl"></i>
                </div>
                <h3 class="text-lg font-bold text-navy-800">{{ $member->nom }}</h3>
                <p class="text-primary-500 font-semibold text-sm mt-1 mb-3">{{ $member->poste }}</p>
                @if($member->bio)
                <p class="text-gray-500 text-xs leading-relaxed">{{ $member->bio }}</p>
                @endif
                @if($member->linkedin)
                <div class="flex justify-center space-x-3 mt-4">
                    <a href="{{ $member->linkedin }}" target="_blank" class="w-8 h-8 bg-gray-100 hover:bg-primary-500 hover:text-white text-gray-400 rounded-lg flex items-center justify-center transition-all">
                        <i class="fab fa-linkedin-in text-xs"></i>
                    </a>
                </div>
                @endif
            </div>
            @empty
            <div class="col-span-4 text-center text-gray-400 py-8">
                <i class="fas fa-users text-4xl mb-3 block opacity-30"></i>
                <p>Aucun membre dans l'équipe pour l'instant.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Certifications -->
<section class="py-20 bg-navy-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-on-scroll">
            <span class="text-primary-400 font-semibold text-sm uppercase tracking-widest">Qualité & Conformité</span>
            <h2 class="text-4xl font-extrabold text-white mt-2">Nos Certifications</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach(['Qualité & Conformité','Sécurité Industrielle','Environnement','Transport Agréé'] as $cert)
            <div class="bg-white/5 border border-white/10 hover:border-primary-500/40 rounded-2xl p-6 text-center animate-on-scroll transition-all hover:bg-white/10">
                <i class="fas fa-certificate text-primary-400 text-3xl mb-3"></i>
                <p class="text-white font-bold">{{ $cert }}</p>
                <p class="text-gray-400 text-xs mt-1">Certifié</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-primary-500">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-extrabold text-white mb-4">Travaillons Ensemble</h2>
        <p class="text-orange-100 text-xl mb-8">Contactez notre équipe pour discuter de votre projet et obtenir une proposition personnalisée.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center bg-white text-primary-600 hover:bg-orange-50 px-10 py-4 rounded-xl font-bold text-lg transition-all hover:shadow-2xl">
            <i class="fas fa-envelope mr-2"></i> Nous Contacter
        </a>
    </div>
</section>

@endsection
