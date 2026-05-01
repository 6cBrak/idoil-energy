@extends('admin.layouts.app')
@section('title', 'Pages')
@section('subtitle', 'Gérer le contenu des pages du site')

@section('content')

{{-- Pages existantes --}}
<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-white/5 flex items-center gap-3">
        <div class="w-8 h-8 bg-blue-500/10 border border-blue-500/20 rounded-lg flex items-center justify-center">
            <i class="fas fa-file-alt text-blue-400 text-sm"></i>
        </div>
        <h2 class="text-white font-semibold">Pages existantes</h2>
        <span class="text-slate-500 text-xs ml-auto">Modifier le contenu des pages du site</span>
    </div>
    <div class="p-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
        @foreach([
            ['accueil',  'fa-home',           'Accueil'],
            ['apropos',  'fa-building',        'À propos'],
            ['services', 'fa-cogs',            'Services'],
            ['projets',  'fa-project-diagram', 'Projets'],
            ['contact',  'fa-envelope',        'Contact'],
        ] as [$nom, $icon, $label])
        <a href="{{ route('admin.pages.contenu', $nom) }}"
           class="bg-slate-800 hover:bg-slate-700 border border-white/5 hover:border-orange-500/30 rounded-xl p-4 flex flex-col items-center gap-2 transition-all group">
            <div class="w-10 h-10 bg-orange-500/10 group-hover:bg-orange-500/20 rounded-xl flex items-center justify-center transition-colors">
                <i class="fas {{ $icon }} text-orange-400 text-sm"></i>
            </div>
            <span class="text-slate-300 text-sm font-medium">{{ $label }}</span>
        </a>
        @endforeach
    </div>
</div>

{{-- Pages personnalisées --}}
<div class="flex justify-between items-center mb-4">
    <h2 class="text-white font-semibold">Pages personnalisées</h2>
    <a href="{{ route('admin.pages.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm flex items-center gap-2 transition-colors shadow-lg shadow-orange-500/20">
        <i class="fas fa-plus"></i> Nouvelle page
    </a>
</div>

@if(session('success'))
<div class="bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl px-4 py-3 mb-4 text-sm flex items-center gap-2">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/5">
                <th class="text-left text-slate-400 text-xs font-medium uppercase tracking-wider px-6 py-4">Page</th>
                <th class="text-left text-slate-400 text-xs font-medium uppercase tracking-wider px-6 py-4">URL</th>
                <th class="text-left text-slate-400 text-xs font-medium uppercase tracking-wider px-6 py-4">Statut</th>
                <th class="text-right text-slate-400 text-xs font-medium uppercase tracking-wider px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($pages as $page)
            <tr class="hover:bg-white/2 transition-colors">
                <td class="px-6 py-4">
                    <p class="text-white font-medium text-sm">{{ $page->titre }}</p>
                </td>
                <td class="px-6 py-4">
                    <a href="/{{ $page->slug }}" target="_blank" class="text-slate-400 hover:text-orange-400 text-sm font-mono transition-colors">
                        /{{ $page->slug }} <i class="fas fa-external-link-alt text-xs ml-1"></i>
                    </a>
                </td>
                <td class="px-6 py-4">
                    @if($page->publie)
                    <span class="bg-green-500/10 text-green-400 border border-green-500/20 text-xs font-semibold px-2.5 py-1 rounded-full">Publié</span>
                    @else
                    <span class="bg-slate-700 text-slate-400 text-xs font-semibold px-2.5 py-1 rounded-full">Brouillon</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.pages.edit', $page) }}" class="w-8 h-8 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fas fa-pen text-xs"></i>
                        </a>
                        <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Supprimer cette page ?')">
                            @csrf @method('DELETE')
                            <button class="w-8 h-8 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-12 text-center text-slate-500">
                    <i class="fas fa-file text-3xl mb-2 block opacity-30"></i>
                    Aucune page personnalisée. <a href="{{ route('admin.pages.create') }}" class="text-orange-400 hover:underline">Créer la première</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
