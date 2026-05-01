@extends('admin.layouts.app')
@section('title', $member->exists ? 'Modifier le membre' : 'Nouveau membre')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.equipe.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-white text-sm mb-6 transition-colors">
        <i class="fas fa-arrow-left"></i> Retour à l'équipe
    </a>

    <div class="bg-slate-900 border border-white/5 rounded-2xl p-6">
        <form action="{{ $member->exists ? route('admin.equipe.update', $member) : route('admin.equipe.store') }}" method="POST" class="space-y-5">
            @csrf
            @if($member->exists) @method('PUT') @endif

            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 text-red-300 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Nom complet <span class="text-orange-400">*</span></label>
                    <input type="text" name="nom" value="{{ old('nom', $member->nom) }}" required
                        placeholder="Ex: Moussa Kaboré"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Poste / Titre <span class="text-orange-400">*</span></label>
                    <input type="text" name="poste" value="{{ old('poste', $member->poste) }}" required
                        placeholder="Ex: Directeur Général"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Biographie</label>
                <textarea name="bio" rows="4" placeholder="Courte description du parcours et des compétences..."
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none">{{ old('bio', $member->bio) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        <i class="fab fa-linkedin text-blue-400 mr-1"></i> Lien LinkedIn
                    </label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $member->linkedin) }}"
                        placeholder="https://linkedin.com/in/..."
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all font-mono text-xs">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Ordre d'affichage</label>
                    <input type="number" name="ordre" value="{{ old('ordre', $member->ordre ?? 0) }}" min="0"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                    <p class="text-slate-600 text-xs mt-1">0 = affiché en premier</p>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                    <i class="fas fa-save"></i> {{ $member->exists ? 'Enregistrer' : 'Ajouter le membre' }}
                </button>
                <a href="{{ route('admin.equipe.index') }}" class="bg-white/5 hover:bg-white/10 text-slate-300 px-6 py-3 rounded-xl font-semibold text-sm transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
