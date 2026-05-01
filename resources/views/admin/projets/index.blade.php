@extends('admin.layouts.app')
@section('title', 'Projets')
@section('subtitle', $projets->count() . ' projet(s) enregistré(s)')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.projets.create') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-colors shadow-lg shadow-orange-500/20">
        <i class="fas fa-plus"></i> Nouveau projet
    </a>
</div>

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-white/5">
                    <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Projet</th>
                    <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider hidden md:table-cell">Client</th>
                    <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider hidden lg:table-cell">Localisation</th>
                    <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Catégorie</th>
                    <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Statut</th>
                    <th class="text-right px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($projets as $projet)
                <tr class="hover:bg-white/2 transition-colors">
                    <td class="px-6 py-4">
                        <div>
                            <p class="text-white font-medium text-sm">{{ $projet->titre }}</p>
                            <p class="text-slate-600 text-xs">{{ $projet->annee }}{{ $projet->en_vedette ? ' · ⭐ En vedette' : '' }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4 hidden md:table-cell text-slate-400 text-sm">{{ $projet->client ?? '—' }}</td>
                    <td class="px-6 py-4 hidden lg:table-cell text-slate-400 text-sm">{{ $projet->localisation ?? '—' }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-purple-500/10 text-purple-400 border border-purple-500/20 text-xs px-2.5 py-1 rounded-full">{{ $projet->categorie }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold {{ $projet->statut === 'En cours' ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $projet->statut === 'En cours' ? 'bg-green-400' : 'bg-blue-400' }}"></span>
                            {{ $projet->statut }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.projets.edit', $projet) }}" class="w-8 h-8 bg-white/5 hover:bg-blue-500/20 hover:text-blue-400 text-slate-400 rounded-lg flex items-center justify-center transition-all">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            <form action="{{ route('admin.projets.destroy', $projet) }}" method="POST" onsubmit="return confirm('Supprimer ce projet ?')">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 bg-white/5 hover:bg-red-500/20 hover:text-red-400 text-slate-400 rounded-lg flex items-center justify-center transition-all">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-600">
                        <i class="fas fa-project-diagram text-3xl mb-3 block"></i>
                        <p>Aucun projet enregistré</p>
                        <a href="{{ route('admin.projets.create') }}" class="text-orange-400 hover:text-orange-300 text-sm mt-2 inline-block">+ Ajouter le premier projet</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
