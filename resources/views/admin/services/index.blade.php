@extends('admin.layouts.app')
@section('title', 'Services')
@section('subtitle', $services->count() . ' service(s) enregistré(s)')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-colors shadow-lg shadow-orange-500/20">
        <i class="fas fa-plus"></i> Nouveau service
    </a>
</div>

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/5">
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">#</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Service</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider hidden md:table-cell">Description</th>
                <th class="text-left px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Statut</th>
                <th class="text-right px-6 py-4 text-slate-400 text-xs font-semibold uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($services as $service)
            <tr class="hover:bg-white/2 transition-colors">
                <td class="px-6 py-4 text-slate-600 text-sm">{{ $service->ordre }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-orange-500/10 border border-orange-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-{{ $service->icone }} text-orange-400 text-sm"></i>
                        </div>
                        <p class="text-white font-medium text-sm">{{ $service->titre }}</p>
                    </div>
                </td>
                <td class="px-6 py-4 hidden md:table-cell">
                    <p class="text-slate-400 text-sm truncate max-w-xs">{{ $service->description }}</p>
                </td>
                <td class="px-6 py-4">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold {{ $service->actif ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'bg-red-500/10 text-red-400 border border-red-500/20' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $service->actif ? 'bg-green-400' : 'bg-red-400' }}"></span>
                        {{ $service->actif ? 'Actif' : 'Inactif' }}
                    </span>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.services.edit', $service) }}" class="w-8 h-8 bg-white/5 hover:bg-blue-500/20 hover:text-blue-400 text-slate-400 rounded-lg flex items-center justify-center transition-all" title="Modifier">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Supprimer ce service ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-8 h-8 bg-white/5 hover:bg-red-500/20 hover:text-red-400 text-slate-400 rounded-lg flex items-center justify-center transition-all" title="Supprimer">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-slate-600">
                    <i class="fas fa-cogs text-3xl mb-3 block"></i>
                    <p>Aucun service enregistré</p>
                    <a href="{{ route('admin.services.create') }}" class="text-orange-400 hover:text-orange-300 text-sm mt-2 inline-block">+ Ajouter le premier service</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
