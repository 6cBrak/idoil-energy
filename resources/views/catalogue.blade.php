@extends('layouts.app')

@section('title', 'Catalogue')
@section('meta_description', 'Catalogue des produits, équipements et solutions techniques Idoil Energy. Téléchargez nos fiches produits et documentations techniques.')

@section('content')

<!-- Hero -->
<section class="hero-gradient pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-primary-400 font-semibold text-sm uppercase tracking-widest">Nos Produits & Équipements</span>
        <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">Catalogue 2026</h1>
        <p class="text-gray-300 text-xl max-w-2xl mx-auto">
            Explorez notre gamme complète de produits énergétiques, équipements de station et solutions solaires. Téléchargez le catalogue PDF.
        </p>
        <div class="mt-8">
            <a href="/catalogue-idoil-2026.pdf" target="_blank" download class="inline-flex items-center bg-primary-500 hover:bg-primary-600 text-white px-8 py-3.5 rounded-xl font-bold transition-all hover:shadow-xl hover:shadow-primary-500/30">
                <i class="fas fa-file-pdf mr-2"></i> Télécharger le Catalogue 2026 (PDF)
            </a>
        </div>
    </div>
</section>

<!-- Filtres -->
<section class="py-12 bg-white border-b border-gray-100 sticky top-20 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-3" id="cat-filters">
            <button data-cat="all" class="cat-btn active px-5 py-2.5 rounded-full font-semibold text-sm bg-primary-500 text-white transition-all shadow-md shadow-primary-500/30">
                <i class="fas fa-th mr-2"></i> Tout voir
            </button>
            @php
            $defaultCats = ['Carburants & Hydrocarbures','Gaz & Lubrifiants','Énergie Solaire','Bornes de Recharge','Équipements de Station','Équipements HSE'];
            $catList = $categories->isNotEmpty() ? $categories->toArray() : $defaultCats;
            $catIcons = ['fas fa-gas-pump','fas fa-fire-flame-curved','fas fa-sun','fas fa-bolt','fas fa-building','fas fa-hard-hat'];
            @endphp
            @foreach($catList as $i => $cat)
            <button data-cat="{{ $cat }}" class="cat-btn px-5 py-2.5 rounded-full font-semibold text-sm bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600 transition-all">
                <i class="{{ $catIcons[$i] ?? 'fas fa-box' }} mr-2"></i> {{ $cat }}
            </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Catalogue grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $defaultItems = [
            // [titre, ref, cat, desc, icon, telecharge]
            ['Tête de puits API 6A','IDO-FD-001','Équipements de Forage','Tête de puits conforme API 6A pour forage haute pression. Pression nominale 10 000 psi. Matériaux : Acier carbone ou inox.','drill', true],
            ['Tige de forage S135','IDO-FD-002','Équipements de Forage','Tiges de forage grade S135 avec connexions NC50. Diamètre 5". Résistance à la traction 560 000 lbs.','circle-dot', true],
            ['BOP Annulaire','IDO-FD-003','Équipements de Forage','Bloc obturateur annulaire 13"5/8 - 5 000 psi. Certification API 16A. Pour contrôle de puits.','compress', true],
            ['Pipeline API 5L X70','IDO-PP-001','Pipelines & Raccords','Tubes de pipeline API 5L grade X70. Diamètres 4" à 36". Soudage bout à bout. Disponible avec revêtement époxy.','pipe-section', true],
            ['Coude à Souder 45°/90°','IDO-PP-002','Pipelines & Raccords','Coudes en acier carbone A234 WPB. Angles 45° et 90°. Toutes dimensions de 1/2" à 36". ASME B16.9.','rotate-right', true],
            ['Vanne à Bille Full Bore','IDO-VR-001','Vannes & Robinetterie','Vanne à bille full bore PN40 - DN 50 à DN 500. Corps acier inox 316L. API 6D. Double étanchéité.','circle-dot', true],
            ['Vanne à Guillotine','IDO-VR-002','Vannes & Robinetterie','Vanne à guillotine flanquée ANSI 150 à 600. Acier forgé A105. DN 2" à 48". API 600.','sliders', true],
            ['Transmetteur de Pression','IDO-IN-001','Instrumentation','Transmetteur de pression 4-20mA HART. Plage 0-700 bar. Précision ±0.05%. Certification ATEX.','gauge', true],
            ['Débitmètre Coriolis','IDO-IN-002','Instrumentation','Débitmètre massique Coriolis. Plage de mesure ±0.1%. Fluides liquides et gaz. Connexion HART/Foundation Fieldbus.','wave-square', true],
            ['Pompe Centrifuge API 610','IDO-PC-001','Pompes & Compresseurs','Pompe centrifuge horizontale conforme API 610 11ème édition. Débit jusqu\'à 3000 m³/h. Tête max 450 m.','droplet', true],
            ['Compresseur à Vis','IDO-PC-002','Pompes & Compresseurs','Compresseur à vis rotatif. Pression max 13 bar. Débit 5 à 100 m³/min. Avec refroidisseur intermédiaire intégré.','wind', true],
            ['Kit EPI Pétrolier','IDO-HSE-001','Équipements HSE','Kit complet d\'équipements de protection individuelle pour industrie pétrolière. Casque, lunettes, gants, chaussures, combinaison antistatique.','hard-hat', true],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="catalogue-grid">
            @forelse($catalogues as $item)
            <div class="catalogue-item bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 card-hover animate-on-scroll" data-category="{{ $item->categorie }}">
                <div class="aspect-video bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center relative">
                    <i class="fas fa-box text-primary-400 text-5xl opacity-50"></i>
                    <div class="absolute top-3 right-3">
                        <span class="bg-primary-500 text-white text-xs font-bold px-2 py-1 rounded-lg">{{ $item->reference }}</span>
                    </div>
                </div>
                <div class="p-5">
                    <span class="text-xs font-semibold text-primary-500 bg-primary-50 px-2 py-1 rounded-full">{{ $item->categorie }}</span>
                    <h3 class="text-base font-bold text-navy-800 mt-3 mb-2">{{ $item->titre }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed mb-4">{{ Str::limit($item->description, 80) }}</p>
                    <div class="flex gap-2">
                        <a href="{{ route('contact') }}" class="flex-1 text-center bg-primary-500 hover:bg-primary-600 text-white text-xs font-semibold py-2.5 rounded-lg transition-colors">
                            <i class="fas fa-envelope mr-1"></i> Demander
                        </a>
                        @if($item->telecharger)
                        <button class="w-10 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-lg flex items-center justify-center transition-colors" title="Télécharger la fiche">
                            <i class="fas fa-download text-xs"></i>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            @foreach($defaultItems as [$titre, $ref, $cat, $desc, $icon, $dl])
            <div class="catalogue-item bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 card-hover animate-on-scroll" data-category="{{ $cat }}">
                <div class="aspect-video bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center relative">
                    <i class="fas fa-{{ $icon }} text-primary-400 text-5xl opacity-50"></i>
                    <div class="absolute top-3 right-3">
                        <span class="bg-black/40 backdrop-blur text-white text-xs font-mono px-2 py-1 rounded-lg">{{ $ref }}</span>
                    </div>
                </div>
                <div class="p-5">
                    <span class="text-xs font-semibold text-primary-500 bg-primary-50 px-2 py-1 rounded-full">{{ $cat }}</span>
                    <h3 class="text-base font-bold text-navy-800 mt-3 mb-2">{{ $titre }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed mb-4">{{ Str::limit($desc, 80) }}</p>
                    <div class="flex gap-2">
                        <a href="{{ route('contact') }}" class="flex-1 text-center bg-primary-500 hover:bg-primary-600 text-white text-xs font-semibold py-2.5 rounded-lg transition-colors">
                            <i class="fas fa-envelope mr-1"></i> Demander
                        </a>
                        @if($dl)
                        <button onclick="alert('Fonctionnalité de téléchargement à configurer.')" class="w-10 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-lg flex items-center justify-center transition-colors" title="Télécharger la fiche technique">
                            <i class="fas fa-download text-xs"></i>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- Télécharger le catalogue complet -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-navy-800 to-navy-900 rounded-3xl p-12 text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 30px 30px;"></div>
            <div class="relative">
                <div class="w-20 h-20 bg-primary-500/20 border border-primary-500/30 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-file-pdf text-primary-400 text-3xl"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-white mb-4">Catalogue Complet 2026</h2>
                <p class="text-gray-300 text-lg max-w-xl mx-auto mb-8">
                    Téléchargez notre catalogue PDF complet avec tous nos produits, équipements et solutions énergétiques pour l'Afrique.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/catalogue-idoil-2026.pdf" target="_blank" download class="inline-flex items-center justify-center bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-xl font-bold transition-all hover:shadow-xl hover:shadow-primary-500/30">
                        <i class="fas fa-file-pdf mr-2"></i> Télécharger le Catalogue PDF 2026
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center border border-white/30 hover:border-primary-400 text-white hover:text-primary-400 px-8 py-4 rounded-xl font-bold transition-all">
                        <i class="fas fa-envelope mr-2"></i> Demander une Offre
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    const catBtns = document.querySelectorAll('.cat-btn');
    const catItems = document.querySelectorAll('.catalogue-item');

    catBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const cat = btn.dataset.cat;

            catBtns.forEach(b => {
                b.classList.remove('bg-primary-500', 'text-white', 'shadow-md', 'shadow-primary-500/30', 'active');
                b.classList.add('bg-gray-100', 'text-gray-600');
            });
            btn.classList.add('bg-primary-500', 'text-white', 'shadow-md', 'shadow-primary-500/30');
            btn.classList.remove('bg-gray-100', 'text-gray-600');

            catItems.forEach(item => {
                if (cat === 'all' || item.dataset.category === cat) {
                    item.style.display = '';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                        item.style.transition = 'opacity 0.3s, transform 0.3s';
                    }, 30);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                    setTimeout(() => { item.style.display = 'none'; }, 300);
                }
            });
        });
    });
</script>
@endpush
