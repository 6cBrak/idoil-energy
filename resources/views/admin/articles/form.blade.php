@extends('admin.layouts.app')
@section('title', isset($article->id) ? 'Modifier l\'article' : 'Nouvel article')
@section('subtitle', isset($article->id) ? $article->titre : 'Rédiger un nouvel article')

@section('content')
<form action="{{ isset($article->id) ? route('admin.articles.update', $article) : route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($article->id)) @method('PUT') @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Colonne principale --}}
        <div class="lg:col-span-2 space-y-5">

            <div class="bg-slate-900 border border-white/5 rounded-2xl p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Titre <span class="text-red-400">*</span></label>
                    <input type="text" name="titre" value="{{ old('titre', $article->titre) }}" required
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all"
                        placeholder="Titre de l'article">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Extrait (résumé)</label>
                    <textarea name="extrait" rows="3"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none"
                        placeholder="Courte description affichée dans la liste...">{{ old('extrait', $article->extrait) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Contenu</label>
                    <textarea name="contenu" rows="15"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-y font-mono"
                        placeholder="Rédigez votre article ici...">{{ old('contenu', $article->contenu) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Colonne latérale --}}
        <div class="space-y-5">

            {{-- Publication --}}
            <div class="bg-slate-900 border border-white/5 rounded-2xl p-5 space-y-4">
                <h3 class="text-white font-semibold text-sm">Publication</h3>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Date de publication</label>
                    <input type="date" name="date_publication" value="{{ old('date_publication', $article->date_publication?->format('Y-m-d')) }}"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="publie" value="1" {{ old('publie', $article->publie) ? 'checked' : '' }}
                        class="w-4 h-4 text-orange-500 border-slate-600 rounded focus:ring-orange-500">
                    <span class="text-slate-300 text-sm">Publié (visible sur le site)</span>
                </label>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-orange-500 hover:bg-orange-600 text-white py-2.5 rounded-xl font-semibold text-sm transition-colors">
                        <i class="fas fa-save mr-1"></i> Enregistrer
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-xl text-sm transition-colors">
                        Annuler
                    </a>
                </div>
            </div>

            {{-- Image --}}
            <div class="bg-slate-900 border border-white/5 rounded-2xl p-5 space-y-3">
                <h3 class="text-white font-semibold text-sm">Image à la une</h3>

                @if($article->image)
                <div class="rounded-xl overflow-hidden border border-white/10" style="height:140px">
                    <img id="preview-img" src="/{{ $article->image }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="rounded-xl overflow-hidden bg-slate-800 border border-white/10 flex items-center justify-center" style="height:140px">
                    <div id="preview-img" class="text-slate-600 text-center">
                        <i class="fas fa-image text-3xl mb-1 block"></i>
                        <span class="text-xs">Aucune image</span>
                    </div>
                </div>
                @endif

                <label class="flex items-center justify-center gap-2 w-full cursor-pointer border-2 border-dashed border-white/10 hover:border-orange-500/50 rounded-xl p-3 transition-all group">
                    <i class="fas fa-upload text-slate-500 group-hover:text-orange-400 text-sm transition-colors"></i>
                    <span class="text-slate-400 group-hover:text-orange-400 text-xs transition-colors">Choisir une image</span>
                    <input type="file" name="image" accept="image/*" class="hidden" onchange="previewImg(this)">
                </label>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
function previewImg(input) {
    if (!input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('preview-img').outerHTML = '<img id="preview-img" src="' + e.target.result + '" class="w-full h-full object-cover">';
    };
    reader.readAsDataURL(input.files[0]);
}
</script>
@endpush
