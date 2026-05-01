@extends('admin.layouts.app')
@section('title', $catalogue->exists ? 'Modifier l\'article' : 'Nouvel article catalogue')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.catalogue.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-white text-sm mb-6 transition-colors">
        <i class="fas fa-arrow-left"></i> Retour au catalogue
    </a>

    <div class="bg-slate-900 border border-white/5 rounded-2xl p-6">
        <form action="{{ $catalogue->exists ? route('admin.catalogue.update', $catalogue) : route('admin.catalogue.store') }}" method="POST" class="space-y-5">
            @csrf
            @if($catalogue->exists) @method('PUT') @endif

            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 text-red-300 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Titre <span class="text-orange-400">*</span></label>
                <input type="text" name="titre" value="{{ old('titre', $catalogue->titre) }}" required
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Catégorie <span class="text-orange-400">*</span></label>
                    <select name="categorie" required class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                        @foreach(['Équipements de Forage','Pipelines & Raccords','Vannes & Robinetterie','Instrumentation','Pompes & Compresseurs','Équipements HSE','Autre'] as $cat)
                        <option value="{{ $cat }}" {{ old('categorie', $catalogue->categorie) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Référence</label>
                    <input type="text" name="reference" value="{{ old('reference', $catalogue->reference) }}"
                        placeholder="ex: IDO-FD-001"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all font-mono">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Ordre</label>
                    <input type="number" name="ordre" value="{{ old('ordre', $catalogue->ordre ?? 0) }}" min="0"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Description</label>
                <textarea name="description" rows="4"
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none">{{ old('description', $catalogue->description) }}</textarea>
            </div>

            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="actif" value="0">
                        <input type="checkbox" name="actif" value="1" {{ old('actif', $catalogue->actif ?? true) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-700 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    </label>
                    <span class="text-slate-300 text-sm">Visible dans le catalogue</span>
                </div>
                <div class="flex items-center gap-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="telecharger" value="0">
                        <input type="checkbox" name="telecharger" value="1" {{ old('telecharger', $catalogue->telecharger ?? true) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-700 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    </label>
                    <span class="text-slate-300 text-sm">Autoriser le téléchargement de la fiche</span>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                    <i class="fas fa-save"></i> {{ $catalogue->exists ? 'Enregistrer' : 'Créer l\'article' }}
                </button>
                <a href="{{ route('admin.catalogue.index') }}" class="bg-white/5 hover:bg-white/10 text-slate-300 px-6 py-3 rounded-xl font-semibold text-sm transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
