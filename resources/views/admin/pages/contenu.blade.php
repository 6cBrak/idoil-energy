@extends('admin.layouts.app')
@section('title', 'Modifier — ' . $config['label'])
@section('subtitle', 'Contenu de la page ' . $config['label'])

@section('content')

@if(session('success'))
<div class="bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl px-4 py-3 mb-6 text-sm flex items-center gap-2">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="mb-4">
    <a href="{{ route('admin.pages.index') }}" class="text-slate-400 hover:text-white text-sm flex items-center gap-2 transition-colors">
        <i class="fas fa-arrow-left text-xs"></i> Retour aux pages
    </a>
</div>

<form action="{{ route('admin.pages.contenu.update', $nom) }}" method="POST">
    @csrf @method('PUT')

    <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-white/5 flex items-center gap-3">
            <div class="w-8 h-8 bg-orange-500/10 border border-orange-500/20 rounded-lg flex items-center justify-center">
                <i class="fas {{ $config['icon'] }} text-orange-400 text-sm"></i>
            </div>
            <h2 class="text-white font-semibold">Page — {{ $config['label'] }}</h2>
        </div>

        <div class="p-6 space-y-5">
            @php use App\Models\Setting; @endphp
            @foreach($config['champs'] as $champ)
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">{{ $champ['label'] }}</label>
                @if($champ['type'] === 'textarea')
                <textarea name="{{ $champ['key'] }}" rows="4"
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all resize-none">{{ \App\Models\Setting::get($champ['key'], $champ['default']) }}</textarea>
                @else
                <input type="text" name="{{ $champ['key'] }}" value="{{ \App\Models\Setting::get($champ['key'], $champ['default']) }}"
                    class="w-full bg-slate-800 border border-white/10 focus:border-orange-500/50 rounded-xl px-4 py-3 text-white text-sm outline-none transition-all">
                @endif
            </div>
            @endforeach
        </div>

        <div class="px-6 py-4 border-t border-white/5 flex justify-end">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>
    </div>
</form>
@endsection
