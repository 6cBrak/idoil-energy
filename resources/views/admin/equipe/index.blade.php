@extends('admin.layouts.app')
@section('title', 'Équipe')
@section('subtitle', $members->count() . ' membre(s)')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.equipe.create') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-colors shadow-lg shadow-orange-500/20">
        <i class="fas fa-plus"></i> Nouveau membre
    </a>
</div>

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/5">
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Membre</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider hidden md:table-cell">Poste</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider hidden lg:table-cell">Biographie</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider hidden md:table-cell">Ordre</th>
                <th class="text-right px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($members as $member)
            <tr class="hover:bg-white/2 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-slate-700 to-slate-800 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-slate-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-sm">{{ $member->nom }}</p>
                            @if($member->linkedin)
                            <a href="{{ $member->linkedin }}" target="_blank" class="text-blue-400 text-xs hover:text-blue-300 transition-colors">
                                <i class="fab fa-linkedin mr-1"></i>LinkedIn
                            </a>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 hidden md:table-cell">
                    <span class="bg-orange-500/10 text-orange-400 border border-orange-500/20 text-xs px-2.5 py-1 rounded-full font-medium">{{ $member->poste }}</span>
                </td>
                <td class="px-6 py-4 hidden lg:table-cell">
                    <p class="text-slate-500 text-xs max-w-xs truncate">{{ $member->bio ?? '—' }}</p>
                </td>
                <td class="px-6 py-4 hidden md:table-cell">
                    <span class="text-slate-400 text-sm font-mono">{{ $member->ordre }}</span>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.equipe.edit', $member) }}" class="w-8 h-8 bg-white/5 hover:bg-blue-500/20 hover:text-blue-400 text-slate-400 rounded-lg flex items-center justify-center transition-all">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form action="{{ route('admin.equipe.destroy', $member) }}" method="POST" onsubmit="return confirm('Supprimer ce membre ?')">
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
                <td colspan="5" class="px-6 py-12 text-center text-slate-600">
                    <i class="fas fa-users text-3xl mb-3 block"></i>
                    <p>Aucun membre dans l'équipe</p>
                    <a href="{{ route('admin.equipe.create') }}" class="text-orange-400 text-sm mt-2 inline-block">+ Ajouter le premier membre</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
