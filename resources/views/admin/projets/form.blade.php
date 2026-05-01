@extends('admin.layouts.app')
@section('title', $projet->exists ? 'Modifier le projet' : 'Nouveau projet')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.projets.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-white text-sm mb-6 transition-colors">
        <i class="fas fa-arrow-left"></i> Retour aux projets
    </a>

    <div class="bg-slate-900 border border-white/5 rounded-2xl p-6">
        <form action="{{ $projet->exists ? route('admin.projets.update', $projet) : route('admin.projets.store') }}" method="POST" class="space-y-5">
            @csrf
            @if($projet->exists) @method('PUT') @endif

            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 text-red-300 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Titre du projet <span class="text-orange-400">*</span></label>
                <input type="text" name="titre" value="{{ old('titre', $projet->titre) }}" required
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Client</label>
                    <input type="text" name="client" value="{{ old('client', $projet->client) }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Localisation</label>
                    <input type="text" name="localisation" value="{{ old('localisation', $projet->localisation) }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Année <span class="text-orange-400">*</span></label>
                    <input type="number" name="annee" value="{{ old('annee', $projet->annee ?? date('Y')) }}" min="1990" max="2030"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Catégorie <span class="text-orange-400">*</span></label>
                    <select name="categorie" required class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                        @foreach(['Pétrole & Gaz','Offshore','Raffinage','Pipeline','Maintenance','Conseil','Énergie Renouvelable'] as $cat)
                        <option value="{{ $cat }}" {{ old('categorie', $projet->categorie) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Statut <span class="text-orange-400">*</span></label>
                    <select name="statut" required class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                        @foreach(['Réalisé','En cours','Planifié'] as $s)
                        <option value="{{ $s }}" {{ old('statut', $projet->statut) === $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Ordre d'affichage</label>
                    <input type="number" name="ordre" value="{{ old('ordre', $projet->ordre ?? 0) }}" min="0"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Description <span class="text-orange-400">*</span></label>
                <textarea name="description" rows="5" required
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none">{{ old('description', $projet->description) }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="hidden" name="en_vedette" value="0">
                    <input type="checkbox" name="en_vedette" value="1" {{ old('en_vedette', $projet->en_vedette ?? false) ? 'checked' : '' }}
                        class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-700 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                </label>
                <span class="text-slate-300 text-sm">⭐ Afficher en vedette sur la page d'accueil</span>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                    <i class="fas fa-save"></i> {{ $projet->exists ? 'Enregistrer' : 'Créer le projet' }}
                </button>
                <a href="{{ route('admin.projets.index') }}" class="bg-white/5 hover:bg-white/10 text-slate-300 px-6 py-3 rounded-xl font-semibold text-sm transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
