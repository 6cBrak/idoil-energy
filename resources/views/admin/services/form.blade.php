@extends('admin.layouts.app')
@section('title', $service->exists ? 'Modifier le service' : 'Nouveau service')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-white text-sm mb-6 transition-colors">
        <i class="fas fa-arrow-left"></i> Retour aux services
    </a>

    <div class="bg-slate-900 border border-white/5 rounded-2xl p-6">
        <form action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" class="space-y-5">
            @csrf
            @if($service->exists) @method('PUT') @endif

            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 text-red-300 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Titre <span class="text-orange-400">*</span></label>
                    <input type="text" name="titre" value="{{ old('titre', $service->titre) }}" required
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Icône Font Awesome <span class="text-orange-400">*</span></label>
                    <div class="relative">
                        <input type="text" name="icone" id="icone-input" value="{{ old('icone', $service->icone) }}" required
                            placeholder="ex: bolt, cogs, wrench..."
                            class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl pl-4 pr-12 py-3 text-white text-sm outline-none transition-all">
                        <div id="icone-preview" class="absolute right-4 top-1/2 -translate-y-1/2 text-orange-400">
                            <i class="fas fa-{{ old('icone', $service->icone ?? 'bolt') }}"></i>
                        </div>
                    </div>
                    <p class="text-slate-600 text-xs mt-1">Nom de l'icône sans "fa-" (ex: bolt, cogs, wrench, flask, truck-fast...)</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Ordre d'affichage</label>
                    <input type="number" name="ordre" value="{{ old('ordre', $service->ordre ?? 0) }}" min="0"
                        class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Description courte <span class="text-orange-400">*</span></label>
                <textarea name="description" rows="2" required
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none">{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Description détaillée</label>
                <textarea name="description_longue" rows="5"
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none">{{ old('description_longue', $service->description_longue) }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="hidden" name="actif" value="0">
                    <input type="checkbox" name="actif" value="1" {{ old('actif', $service->actif ?? true) ? 'checked' : '' }}
                        class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-700 peer-focus:ring-2 peer-focus:ring-orange-500/30 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                </label>
                <span class="text-slate-300 text-sm">Service actif (visible sur le site)</span>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                    <i class="fas fa-save"></i> {{ $service->exists ? 'Enregistrer les modifications' : 'Créer le service' }}
                </button>
                <a href="{{ route('admin.services.index') }}" class="bg-white/5 hover:bg-white/10 text-slate-300 px-6 py-3 rounded-xl font-semibold text-sm transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('icone-input').addEventListener('input', function() {
        document.getElementById('icone-preview').innerHTML = `<i class="fas fa-${this.value}"></i>`;
    });
</script>
@endpush
