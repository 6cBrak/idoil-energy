<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'IDOIL ENERGY - Solutions énergétiques au Burkina Faso. Hydrocarbures, solaire, logistique et bornes de recharge.')">
    <title>@yield('title', 'Idoil Energy') | {{ \App\Models\Setting::get('site_titre_suffix', 'Solutions Énergétiques') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50:  '#fff0ec',
                            100: '#ffe1d8',
                            200: '#ffc2b0',
                            300: '#ff9a7a',
                            400: '#f76840',
                            500: '#e84020',
                            600: '#d43218',
                            700: '#af2614',
                            800: '#8c2016',
                            900: '#721d15',
                        },
                        navy: {
                            50:  '#eef2f8',
                            100: '#dce4f0',
                            200: '#b9c9e1',
                            300: '#8ea7cc',
                            400: '#6283b5',
                            500: '#3e609e',
                            600: '#2e4b84',
                            700: '#243a69',
                            800: '#1f3057',
                            900: '#1a2744',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        html { scroll-behavior: smooth; }
        .nav-link { @apply relative transition-colors duration-200; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: #e84020;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .hero-gradient { background: linear-gradient(135deg, #1a2744 0%, #1f3057 50%, #243a69 100%); }
        .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
        .section-gradient { background: linear-gradient(180deg, #f8fafc 0%, #fff 100%); }
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
</head>
<body class="font-sans text-gray-800 bg-white">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    @php $logoFile = \App\Models\Setting::get('logo_fichier'); @endphp
                    @if($logoFile && file_exists(public_path($logoFile)))
                    <img src="/{{ $logoFile }}" alt="IDOIL ENERGY" class="h-12 w-auto object-contain">
                    @else
                    <div class="w-10 h-10 bg-navy-900 border border-primary-500/40 rounded-xl flex items-center justify-center group-hover:border-primary-400 transition-colors">
                        <i class="fas fa-fire text-primary-500 text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-black text-white tracking-widest">IDOIL<span class="text-primary-500"> ENERGY</span></span>
                        <p class="text-xs text-gray-400 leading-none">Solutions Ã‰nergÃ©tiques</p>
                    </div>
                    @endif
                </a>

                <!-- Desktop Navigation -->
                @php
                $nav = [
                    'accueil'  => \App\Models\Setting::get('nav_accueil',  'Accueil'),
                    'apropos'  => \App\Models\Setting::get('nav_apropos',  'À propos'),
                    'services' => \App\Models\Setting::get('nav_services', 'Services'),
                    'projets'  => \App\Models\Setting::get('nav_projets',  'Nos Projets'),
                    'catalogue'=> \App\Models\Setting::get('nav_catalogue','Catalogue'),
                    'contact'  => \App\Models\Setting::get('nav_contact',  'Contact'),
                ];
                @endphp
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link text-gray-200 hover:text-primary-400 font-medium text-sm {{ request()->routeIs('home') ? 'text-primary-400 active' : '' }}">
                        {{ $nav['accueil'] }}
                    </a>
                    <a href="{{ route('apropos') }}" class="nav-link text-gray-200 hover:text-primary-400 font-medium text-sm {{ request()->routeIs('apropos') ? 'text-primary-400 active' : '' }}">
                        {{ $nav['apropos'] }}
                    </a>
                    <a href="{{ route('services') }}" class="nav-link text-gray-200 hover:text-primary-400 font-medium text-sm {{ request()->routeIs('services') ? 'text-primary-400 active' : '' }}">
                        {{ $nav['services'] }}
                    </a>
                    <a href="{{ route('projets') }}" class="nav-link text-gray-200 hover:text-primary-400 font-medium text-sm {{ request()->routeIs('projets') ? 'text-primary-400 active' : '' }}">
                        {{ $nav['projets'] }}
                    </a>
                    <a href="{{ route('catalogue') }}" class="nav-link text-gray-200 hover:text-primary-400 font-medium text-sm {{ request()->routeIs('catalogue') ? 'text-primary-400 active' : '' }}">
                        {{ $nav['catalogue'] }}
                    </a>
                    <a href="{{ route('contact') }}" class="bg-primary-500 hover:bg-primary-600 text-white px-5 py-2.5 rounded-lg font-semibold text-sm transition-all duration-200 hover:shadow-lg hover:shadow-primary-500/30">
                        {{ $nav['contact'] }}
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-btn" class="md:hidden text-white p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <i class="fas fa-bars text-xl" id="menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden bg-navy-800/95 backdrop-blur border-t border-white/10">
            <div class="px-4 py-4 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 text-gray-200 hover:text-primary-400 hover:bg-white/5 rounded-lg font-medium transition-colors {{ request()->routeIs('home') ? 'text-primary-400 bg-white/5' : '' }}">
                    <i class="fas fa-home mr-3 w-4"></i> {{ $nav['accueil'] }}
                </a>
                <a href="{{ route('apropos') }}" class="block px-4 py-3 text-gray-200 hover:text-primary-400 hover:bg-white/5 rounded-lg font-medium transition-colors {{ request()->routeIs('apropos') ? 'text-primary-400 bg-white/5' : '' }}">
                    <i class="fas fa-building mr-3 w-4"></i> {{ $nav['apropos'] }}
                </a>
                <a href="{{ route('services') }}" class="block px-4 py-3 text-gray-200 hover:text-primary-400 hover:bg-white/5 rounded-lg font-medium transition-colors {{ request()->routeIs('services') ? 'text-primary-400 bg-white/5' : '' }}">
                    <i class="fas fa-cogs mr-3 w-4"></i> {{ $nav['services'] }}
                </a>
                <a href="{{ route('projets') }}" class="block px-4 py-3 text-gray-200 hover:text-primary-400 hover:bg-white/5 rounded-lg font-medium transition-colors {{ request()->routeIs('projets') ? 'text-primary-400 bg-white/5' : '' }}">
                    <i class="fas fa-project-diagram mr-3 w-4"></i> {{ $nav['projets'] }}
                </a>
                <a href="{{ route('catalogue') }}" class="block px-4 py-3 text-gray-200 hover:text-primary-400 hover:bg-white/5 rounded-lg font-medium transition-colors {{ request()->routeIs('catalogue') ? 'text-primary-400 bg-white/5' : '' }}">
                    <i class="fas fa-book mr-3 w-4"></i> {{ $nav['catalogue'] }}
                </a>
                <a href="{{ route('contact') }}" class="block mx-4 mt-3 bg-primary-500 text-white px-4 py-3 rounded-lg font-semibold text-center transition-colors hover:bg-primary-600">
                    <i class="fas fa-envelope mr-2"></i> {{ $nav['contact'] }}
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-navy-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

                @php $Setting = \App\Models\Setting::class; @endphp
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 mb-5">
                        <div class="w-10 h-10 bg-navy-900 border border-primary-500/40 rounded-xl flex items-center justify-center">
                            <i class="fas fa-fire text-primary-500"></i>
                        </div>
                        <div>
                            <span class="text-xl font-black text-white tracking-widest">{{ \App\Models\Setting::get('entreprise_nom','IDOIL ENERGY') }}</span>
                            <p class="text-xs text-gray-500 leading-none">{{ \App\Models\Setting::get('entreprise_slogan','Solutions Ã‰nergÃ©tiques') }}</p>
                        </div>
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed mb-5">
                        {{ \App\Models\Setting::get('entreprise_description','Entreprise africaine spÃ©cialisÃ©e dans les solutions Ã©nergÃ©tiques innovantes et durables. Votre partenaire de confiance pour un avenir Ã©nergÃ©tique accessible.') }}
                    </p>
                    <div class="flex space-x-3">
                        @if(\App\Models\Setting::get('social_linkedin'))
                        <a href="{{ \App\Models\Setting::get('social_linkedin') }}" target="_blank" class="w-9 h-9 bg-white/10 hover:bg-primary-500 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fab fa-linkedin-in text-sm"></i>
                        </a>
                        @endif
                        @if(\App\Models\Setting::get('social_facebook'))
                        <a href="{{ \App\Models\Setting::get('social_facebook') }}" target="_blank" class="w-9 h-9 bg-white/10 hover:bg-primary-500 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        @endif
                        @if(\App\Models\Setting::get('social_twitter'))
                        <a href="{{ \App\Models\Setting::get('social_twitter') }}" target="_blank" class="w-9 h-9 bg-white/10 hover:bg-primary-500 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        @endif
                        @if(\App\Models\Setting::get('social_youtube'))
                        <a href="{{ \App\Models\Setting::get('social_youtube') }}" target="_blank" class="w-9 h-9 bg-white/10 hover:bg-primary-500 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fab fa-youtube text-sm"></i>
                        </a>
                        @endif
                        @if(!\App\Models\Setting::get('social_linkedin') && !\App\Models\Setting::get('social_facebook') && !\App\Models\Setting::get('social_twitter') && !\App\Models\Setting::get('social_youtube'))
                        <span class="text-slate-600 text-xs italic">RÃ©seaux Ã  configurer dans les paramÃ¨tres</span>
                        @endif
                    </div>
                </div>

                <!-- Navigation rapide -->
                <div>
                    <h3 class="text-white font-semibold mb-5 text-sm uppercase tracking-wider">Navigation</h3>
                    <ul class="space-y-3">
                        @foreach([['home','Accueil'],['apropos','Ã€ propos'],['services','Services'],['projets','Nos Projets'],['catalogue','Catalogue'],['contact','Contact']] as [$route, $label])
                        <li>
                            <a href="{{ route($route) }}" class="text-gray-400 hover:text-primary-400 text-sm transition-colors flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary-500 group-hover:translate-x-1 transition-transform"></i>
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="text-white font-semibold mb-5 text-sm uppercase tracking-wider">Nos Services</h3>
                    <ul class="space-y-3">
                        @foreach(['Fourniture d\'Hydrocarbure','Gaz & Lubrifiants','Ã‰nergie Solaire','Logistique Ã‰nergÃ©tique','Borne de Recharge Ã‰lectrique','Conseils & Formation'] as $service)
                        <li>
                            <a href="{{ route('services') }}" class="text-gray-400 hover:text-primary-400 text-sm transition-colors flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary-500 group-hover:translate-x-1 transition-transform"></i>
                                {{ $service }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-white font-semibold mb-5 text-sm uppercase tracking-wider">Contact</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-primary-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-map-marker-alt text-primary-400 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">{{ \App\Models\Setting::get('contact_adresse','Ouagadougou, Burkina Faso') }}</p>
                            </div>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-primary-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-primary-400 text-xs"></i>
                            </div>
                            <a href="tel:{{ preg_replace('/\s+/','',(\App\Models\Setting::get('contact_telephone','+22670238144'))) }}" class="text-gray-400 hover:text-primary-400 text-sm transition-colors">{{ \App\Models\Setting::get('contact_telephone','+226 70 23 81 44') }}</a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-primary-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-primary-400 text-xs"></i>
                            </div>
                            <a href="mailto:{{ \App\Models\Setting::get('contact_email','contact@idoil-energy.com') }}" class="text-gray-400 hover:text-primary-400 text-sm transition-colors">{{ \App\Models\Setting::get('contact_email','contact@idoil-energy.com') }}</a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-primary-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-primary-400 text-xs"></i>
                            </div>
                            <span class="text-gray-400 text-sm">{{ \App\Models\Setting::get('contact_horaires_semaine','Lun-Ven : 7h30 â€“ 17h30') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} <span class="text-primary-400 font-medium">Idoil Energy</span>. Tous droits rÃ©servÃ©s.
                </p>
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-500 hover:text-gray-300 text-xs transition-colors">Politique de confidentialitÃ©</a>
                    <a href="#" class="text-gray-500 hover:text-gray-300 text-xs transition-colors">Mentions lÃ©gales</a>
                    <a href="#" class="text-gray-500 hover:text-gray-300 text-xs transition-colors">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <button id="back-to-top" class="fixed bottom-8 right-8 w-11 h-11 bg-primary-500 hover:bg-primary-600 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 opacity-0 translate-y-4 z-40">
        <i class="fas fa-arrow-up text-sm"></i>
    </button>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-navy-900/95', 'backdrop-blur-md', 'shadow-xl', 'shadow-black/20');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-navy-900/95', 'backdrop-blur-md', 'shadow-xl', 'shadow-black/20');
                navbar.classList.add('bg-transparent');
            }
        });

        // Set initial state
        if (window.scrollY > 50) {
            navbar.classList.add('bg-navy-900/95', 'backdrop-blur-md', 'shadow-xl');
        } else {
            navbar.classList.add('bg-transparent');
        }

        // Mobile menu
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('fa-bars');
            menuIcon.classList.toggle('fa-times');
        });

        // Back to top
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTop.classList.remove('opacity-0', 'translate-y-4');
                backToTop.classList.add('opacity-100', 'translate-y-0');
            } else {
                backToTop.classList.add('opacity-0', 'translate-y-4');
                backToTop.classList.remove('opacity-100', 'translate-y-0');
            }
        });
        backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // Animate on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
    @stack('scripts')
</body>
</html>

