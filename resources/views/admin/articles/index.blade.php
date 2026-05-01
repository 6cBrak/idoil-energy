@extends('admin.layouts.app')
@section('title', 'Articles')
@section('subtitle', 'Gérer les actualités et publications')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div></div>
    <a href="{{ route('admin.articles.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm flex items-center gap-2 transition-colors shadow-lg shadow-orange-500/20">
        <i class="fas fa-plus"></i> Nouvel Article
    </a>
</div>

@if(session('success'))
<div class="bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl px-4 py-3 mb-6 text-sm flex items-center gap-2">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/5">
                <th class="text-left text-slate-400 text-xs font-medium uppercase tracking-wider px-6 py-4">Article</th>
                <th class="text-left text-slate-400 text-xs font-medium uppercase tracking-wider px-6 py-4">Date</th>
                <th class="text-left text-slate-400 text-xs font-medium uppercase tracking-wider px-6 py-4">Statut</th>
                <th class="text-right text-slate-400 text-xs font-medium uppercase tracking-wider px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($articles as $article)
            <tr class="hover:bg-white/2 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        @if($article->image)
                        <img src="/{{ $article->image }}" class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                        @else
                        <div class="w-12 h-12 bg-slate-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-newspaper text-slate-600"></i>
                        </div>
                        @endif
                        <div>
                            <p class="text-white font-medium text-sm">{{ $article->titre }}</p>
                            <p class="text-slate-500 text-xs mt-0.5">{{ Str::limit($article->extrait, 60) }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-slate-400 text-sm">
                    {{ $article->date_publication?->format('d/m/Y') ?? '—' }}
                </td>
                <td class="px-6 py-4">
                    @if($article->publie)
                    <span class="bg-green-500/10 text-green-400 border border-green-500/20 text-xs font-semibold px-2.5 py-1 rounded-full">Publié</span>
                    @else
                    <span class="bg-slate-700 text-slate-400 text-xs font-semibold px-2.5 py-1 rounded-full">Brouillon</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="w-8 h-8 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fas fa-pen text-xs"></i>
                        </a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?')">
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
                <td colspan="4" class="px-6 py-16 text-center text-slate-500">
                    <i class="fas fa-newspaper text-4xl mb-3 block opacity-30"></i>
                    Aucun article. <a href="{{ route('admin.articles.create') }}" class="text-orange-400 hover:underline">Créer le premier</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
