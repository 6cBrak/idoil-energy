@extends('admin.layouts.app')
@section('title', isset($page->id) ? 'Modifier la page' : 'Nouvelle page')
@section('subtitle', isset($page->id) ? $page->titre : 'Créer une nouvelle page')

@section('content')
<form action="{{ isset($page->id) ? route('admin.pages.update', $page) : route('admin.pages.store') }}" method="POST">
    @csrf
    @if(isset($page->id)) @method('PUT') @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Contenu principal --}}
        <div class="lg:col-span-2 space-y-5">
            <div class="bg-slate-900 border border-white/5 rounded-2xl p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Titre de la page <span class="text-red-400">*</span></label>
                    <input type="text" name="titre" value="{{ old('titre', $page->titre) }}" required
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all"
                        placeholder="Ex: Mentions légales">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">URL de la page</label>
                    <div class="flex items-center gap-2">
                        <span class="text-slate-500 text-sm">/</span>
                        <input type="text" name="slug" value="{{ old('slug', $page->slug) }}"
                            class="flex-1 bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all font-mono"
                            placeholder="mentions-legales">
                    </div>
                    <p class="text-slate-600 text-xs mt-1">Laissez vide pour générer automatiquement depuis le titre.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Contenu</label>
                    <textarea name="contenu" rows="20"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-y"
                        placeholder="Rédigez le contenu de votre page ici...">{{ old('contenu', $page->contenu) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Colonne latérale --}}
        <div class="space-y-5">
            <div class="bg-slate-900 border border-white/5 rounded-2xl p-5 space-y-4">
                <h3 class="text-white font-semibold text-sm">Publication</h3>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="publie" value="1" {{ old('publie', $page->publie ?? true) ? 'checked' : '' }}
                        class="w-4 h-4 text-orange-500 border-slate-600 rounded focus:ring-orange-500">
                    <span class="text-slate-300 text-sm">Visible sur le site</span>
                </label>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-orange-500 hover:bg-orange-600 text-white py-2.5 rounded-xl font-semibold text-sm transition-colors">
                        <i class="fas fa-save mr-1"></i> Enregistrer
                    </button>
                    <a href="{{ route('admin.pages.index') }}" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-xl text-sm transition-colors">
                        Annuler
                    </a>
                </div>
            </div>

            <div class="bg-slate-900 border border-white/5 rounded-2xl p-5">
                <h3 class="text-white font-semibold text-sm mb-3">SEO</h3>
                <label class="block text-sm font-medium text-slate-300 mb-2">Méta-description</label>
                <textarea name="meta_description" rows="4"
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none"
                    placeholder="Description courte pour les moteurs de recherche (max 160 car.)">{{ old('meta_description', $page->meta_description) }}</textarea>
            </div>
        </div>
    </div>
</form>
@endsection
