@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('subtitle', 'Vue d\'ensemble du site Idoil Energy')

@section('content')

<!-- Stats cards -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    @foreach([
        ['Services actifs', $stats['services'], 'fas fa-cogs', 'bg-blue-500/10 border-blue-500/20 text-blue-400', route('admin.services.index')],
        ['Projets', $stats['projets'], 'fas fa-project-diagram', 'bg-purple-500/10 border-purple-500/20 text-purple-400', route('admin.projets.index')],
        ['Catalogue', $stats['catalogues'], 'fas fa-book', 'bg-green-500/10 border-green-500/20 text-green-400', route('admin.catalogue.index')],
        ['Messages', $stats['messages'], 'fas fa-envelope', 'bg-orange-500/10 border-orange-500/20 text-orange-400', route('admin.messages.index')],
    ] as [$label, $value, $icon, $style, $link])
    <a href="{{ $link }}" class="bg-slate-900 border border-white/5 hover:border-white/10 rounded-2xl p-5 transition-all hover:bg-slate-800 group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 {{ $style }} border rounded-xl flex items-center justify-center">
                <i class="{{ $icon }} text-sm"></i>
            </div>
            <i class="fas fa-arrow-right text-slate-700 group-hover:text-slate-400 text-xs transition-colors"></i>
        </div>
        <p class="text-3xl font-extrabold text-white mb-1">{{ $value }}</p>
        <p class="text-slate-500 text-sm">{{ $label }}</p>
    </a>
    @endforeach
</div>

@if($stats['messages_non_lus'] > 0)
<div class="bg-orange-500/10 border border-orange-500/30 rounded-2xl p-4 mb-8 flex items-center gap-4">
    <div class="w-10 h-10 bg-orange-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
        <i class="fas fa-bell text-orange-400"></i>
    </div>
    <div class="flex-1">
        <p class="text-orange-300 font-semibold">{{ $stats['messages_non_lus'] }} message(s) non lu(s)</p>
        <p class="text-orange-400/60 text-sm">Des visiteurs attendent votre réponse</p>
    </div>
    <a href="{{ route('admin.messages.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-colors flex-shrink-0">
        Voir les messages
    </a>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- Derniers messages -->
    <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-white/5">
            <h2 class="text-white font-semibold">Derniers messages</h2>
            <a href="{{ route('admin.messages.index') }}" class="text-orange-400 text-sm hover:text-orange-300 transition-colors">Voir tout</a>
        </div>
        <div class="divide-y divide-white/5">
            @forelse($derniers_messages as $msg)
            <a href="{{ route('admin.messages.show', $msg) }}" class="flex items-start gap-4 px-6 py-4 hover:bg-white/3 transition-colors block">
                <div class="w-9 h-9 bg-slate-800 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-user text-slate-400 text-xs"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 mb-1">
                        <p class="text-white text-sm font-medium truncate">{{ $msg->nom }}</p>
                        @if(!$msg->lu)
                        <span class="w-2 h-2 bg-orange-500 rounded-full flex-shrink-0"></span>
                        @endif
                    </div>
                    <p class="text-slate-400 text-xs truncate">{{ $msg->sujet }}</p>
                    <p class="text-slate-600 text-xs mt-0.5">{{ $msg->created_at->diffForHumans() }}</p>
                </div>
            </a>
            @empty
            <div class="px-6 py-8 text-center text-slate-600">
                <i class="fas fa-inbox text-2xl mb-2 block"></i>
                <p class="text-sm">Aucun message reçu</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Derniers projets -->
    <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-white/5">
            <h2 class="text-white font-semibold">Derniers projets</h2>
            <a href="{{ route('admin.projets.index') }}" class="text-orange-400 text-sm hover:text-orange-300 transition-colors">Voir tout</a>
        </div>
        <div class="divide-y divide-white/5">
            @forelse($derniers_projets as $projet)
            <div class="flex items-center gap-4 px-6 py-4">
                <div class="w-9 h-9 bg-slate-800 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-oil-well text-orange-400 text-xs"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-white text-sm font-medium truncate">{{ $projet->titre }}</p>
                    <p class="text-slate-500 text-xs">{{ $projet->localisation }} — {{ $projet->annee }}</p>
                </div>
                <span class="text-xs px-2 py-1 rounded-full {{ $projet->statut === 'En cours' ? 'bg-green-500/20 text-green-400' : 'bg-blue-500/20 text-blue-400' }} flex-shrink-0">
                    {{ $projet->statut }}
                </span>
            </div>
            @empty
            <div class="px-6 py-8 text-center text-slate-600">
                <i class="fas fa-project-diagram text-2xl mb-2 block"></i>
                <p class="text-sm">Aucun projet enregistré</p>
            </div>
            @endforelse
        </div>
    </div>

</div>

<!-- Raccourcis -->
<div class="mt-6 grid grid-cols-2 sm:grid-cols-4 gap-4">
    @foreach([
        ['Ajouter un service', route('admin.services.create'), 'fas fa-plus-circle', 'text-blue-400'],
        ['Ajouter un projet', route('admin.projets.create'), 'fas fa-plus-circle', 'text-purple-400'],
        ['Ajouter au catalogue', route('admin.catalogue.create'), 'fas fa-plus-circle', 'text-green-400'],
        ['Voir le site public', route('home'), 'fas fa-external-link-alt', 'text-orange-400'],
    ] as [$label, $href, $icon, $color])
    <a href="{{ $href }}" {{ str_contains($href, route('home')) ? 'target="_blank"' : '' }}
        class="bg-slate-900 border border-white/5 hover:border-white/10 rounded-xl p-4 flex items-center gap-3 transition-all hover:bg-slate-800 group">
        <i class="{{ $icon }} {{ $color }} text-lg"></i>
        <span class="text-slate-300 text-sm group-hover:text-white transition-colors">{{ $label }}</span>
    </a>
    @endforeach
</div>

@endsection
