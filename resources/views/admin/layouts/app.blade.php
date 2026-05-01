<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Admin Idoil Energy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link { @apply flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-white/8 transition-all text-sm font-medium; }
        .sidebar-link.active { @apply text-white bg-orange-500/20 border border-orange-500/30; }
        .sidebar-link.active i { @apply text-orange-400; }
        [x-cloak] { display: none; }
    </style>
</head>
<body class="bg-slate-950 text-slate-200 min-h-screen flex">

    <!-- ── Sidebar ─────────────────────────────────────────────── -->
    <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-slate-900 border-r border-white/5 flex flex-col z-40 transition-transform duration-300 -translate-x-full lg:translate-x-0">

        <!-- Brand -->
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/5">
            <div class="w-9 h-9 bg-orange-500 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fas fa-bolt text-white text-sm"></i>
            </div>
            <div>
                <p class="text-white font-bold text-sm leading-tight">Idoil<span class="text-orange-400">Energy</span></p>
                <p class="text-slate-500 text-xs">Administration</p>
            </div>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">
            <p class="text-slate-600 text-xs font-semibold uppercase tracking-wider px-4 mb-3">Navigation</p>

            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie w-4 text-center"></i> Dashboard
            </a>
            <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-cogs w-4 text-center"></i> Services
            </a>
            <a href="{{ route('admin.projets.index') }}" class="sidebar-link {{ request()->routeIs('admin.projets.*') ? 'active' : '' }}">
                <i class="fas fa-project-diagram w-4 text-center"></i> Projets
            </a>
            <a href="{{ route('admin.catalogue.index') }}" class="sidebar-link {{ request()->routeIs('admin.catalogue.*') ? 'active' : '' }}">
                <i class="fas fa-book w-4 text-center"></i> Catalogue
            </a>
            <a href="{{ route('admin.equipe.index') }}" class="sidebar-link {{ request()->routeIs('admin.equipe.*') ? 'active' : '' }}">
                <i class="fas fa-users w-4 text-center"></i> Équipe
            </a>
            <a href="{{ route('admin.articles.index') }}" class="sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper w-4 text-center"></i> Articles
            </a>
            <a href="{{ route('admin.pages.index') }}" class="sidebar-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <i class="fas fa-file-alt w-4 text-center"></i> Pages
            </a>

            @php $nonLus = \App\Models\ContactMessage::where('lu', false)->count(); @endphp
            <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope w-4 text-center"></i>
                Messages
                @if($nonLus > 0)
                <span class="ml-auto bg-orange-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $nonLus }}</span>
                @endif
            </a>

            <div class="border-t border-white/5 my-4"></div>
            <p class="text-slate-600 text-xs font-semibold uppercase tracking-wider px-4 mb-3">Configuration</p>

            <a href="{{ route('admin.parametres.index') }}" class="sidebar-link {{ request()->routeIs('admin.parametres.*') ? 'active' : '' }}">
                <i class="fas fa-sliders w-4 text-center"></i> Paramètres
            </a>
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <i class="fas fa-external-link-alt w-4 text-center"></i> Voir le site
            </a>
        </nav>

        <!-- User -->
        <div class="border-t border-white/5 p-4">
            <div class="flex items-center gap-3 px-2 py-2 rounded-xl bg-white/3 mb-2">
                <div class="w-8 h-8 bg-orange-500/20 border border-orange-500/30 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-orange-400 text-xs"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-white text-sm font-medium truncate">{{ auth()->user()->name }}</p>
                    <p class="text-slate-500 text-xs truncate">Administrateur</p>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 rounded-xl text-slate-400 hover:text-red-400 hover:bg-red-500/10 text-sm transition-all">
                    <i class="fas fa-sign-out-alt w-4 text-center"></i> Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- Overlay mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden" onclick="closeSidebar()"></div>

    <!-- ── Main ────────────────────────────────────────────────── -->
    <div class="flex-1 lg:ml-64 flex flex-col min-h-screen">

        <!-- Topbar -->
        <header class="sticky top-0 z-20 bg-slate-950/80 backdrop-blur border-b border-white/5 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="lg:hidden text-slate-400 hover:text-white transition-colors">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                <div>
                    <h1 class="text-white font-bold text-lg leading-tight">@yield('title', 'Dashboard')</h1>
                    <p class="text-slate-500 text-xs">@yield('subtitle', '')</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                @if($nonLus > 0)
                <a href="{{ route('admin.messages.index') }}" class="relative w-9 h-9 bg-white/5 hover:bg-white/10 rounded-xl flex items-center justify-center transition-colors">
                    <i class="fas fa-bell text-slate-400 text-sm"></i>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-orange-500 text-white text-xs rounded-full flex items-center justify-center font-bold">{{ $nonLus }}</span>
                </a>
                @endif
                <div class="flex items-center gap-2 bg-white/5 rounded-xl px-3 py-2">
                    <div class="w-6 h-6 bg-orange-500/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user text-orange-400 text-xs"></i>
                    </div>
                    <span class="text-white text-sm font-medium hidden sm:block">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </header>

        <!-- Alerts -->
        <div class="px-6 pt-4">
            @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/30 text-green-300 rounded-xl px-4 py-3 mb-4 flex items-center gap-3 text-sm">
                <i class="fas fa-check-circle text-green-400 flex-shrink-0"></i>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/30 text-red-300 rounded-xl px-4 py-3 mb-4 flex items-center gap-3 text-sm">
                <i class="fas fa-exclamation-circle text-red-400 flex-shrink-0"></i>
                {{ session('error') }}
            </div>
            @endif
        </div>

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

        <footer class="text-center text-slate-700 text-xs py-4 border-t border-white/5">
            &copy; {{ date('Y') }} Idoil Energy — Panel Admin
        </footer>
    </div>

    <script>
        function toggleSidebar() {
            const sb = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sb.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('sidebar-overlay').classList.add('hidden');
        }
    </script>
    @stack('scripts')
</body>
</html>
