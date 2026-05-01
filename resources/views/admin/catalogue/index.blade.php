@extends('admin.layouts.app')
@section('title', 'Catalogue')
@section('subtitle', $catalogues->count() . ' article(s)')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.catalogue.create') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-colors shadow-lg shadow-orange-500/20">
        <i class="fas fa-plus"></i> Nouvel article
    </a>
</div>

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/5">
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Article</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider hidden md:table-cell">Référence</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider hidden md:table-cell">Catégorie</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Statut</th>
                <th class="text-right px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($catalogues as $item)
            <tr class="hover:bg-white/2 transition-colors">
                <td class="px-6 py-4">
                    <p class="text-white font-medium text-sm">{{ $item->titre }}</p>
                    <p class="text-slate-600 text-xs mt-0.5">{{ Str::limit($item->description, 60) }}</p>
                </td>
                <td class="px-6 py-4 hidden md:table-cell">
                    <code class="bg-slate-800 text-orange-400 text-xs px-2 py-1 rounded-lg">{{ $item->reference ?? '—' }}</code>
                </td>
                <td class="px-6 py-4 hidden md:table-cell">
                    <span class="bg-green-500/10 text-green-400 border border-green-500/20 text-xs px-2.5 py-1 rounded-full">{{ $item->categorie }}</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                        <span class="inline-flex items-center gap-1 text-xs {{ $item->actif ? 'text-green-400' : 'text-slate-600' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $item->actif ? 'bg-green-400' : 'bg-slate-700' }}"></span>
                            {{ $item->actif ? 'Visible' : 'Masqué' }}
                        </span>
                        @if($item->telecharger)
                        <span class="text-xs text-blue-400"><i class="fas fa-download text-[10px] mr-1"></i>Téléchargeable</span>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.catalogue.edit', $item) }}" class="w-8 h-8 bg-white/5 hover:bg-blue-500/20 hover:text-blue-400 text-slate-400 rounded-lg flex items-center justify-center transition-all">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form action="{{ route('admin.catalogue.destroy', $item) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?')">
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
                    <i class="fas fa-book text-3xl mb-3 block"></i>
                    <p>Aucun article dans le catalogue</p>
                    <a href="{{ route('admin.catalogue.create') }}" class="text-orange-400 text-sm mt-2 inline-block">+ Ajouter le premier article</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
