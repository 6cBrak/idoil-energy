@extends('admin.layouts.app')
@section('title', 'Messages de contact')
@section('subtitle', $messages->total() . ' message(s) reçu(s)')

@section('content')
<div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
    <div class="divide-y divide-white/5">
        @forelse($messages as $msg)
        <div class="flex items-start gap-4 px-6 py-4 hover:bg-white/2 transition-colors {{ !$msg->lu ? 'bg-orange-500/3 border-l-2 border-orange-500' : '' }}">
            <div class="w-10 h-10 bg-slate-800 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fas fa-user text-slate-400 text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1 flex-wrap">
                    <p class="text-white font-semibold text-sm">{{ $msg->nom }}</p>
                    @if(!$msg->lu)
                    <span class="bg-orange-500/20 text-orange-400 border border-orange-500/30 text-xs px-2 py-0.5 rounded-full font-semibold">Nouveau</span>
                    @endif
                    <span class="text-slate-600 text-xs ml-auto flex-shrink-0">{{ $msg->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <p class="text-slate-400 text-sm mb-1"><span class="text-slate-500">Sujet :</span> {{ $msg->sujet }}</p>
                <p class="text-slate-500 text-xs truncate">{{ $msg->message }}</p>
                <div class="flex items-center gap-2 mt-2 flex-wrap">
                    <a href="mailto:{{ $msg->email }}" class="text-orange-400 hover:text-orange-300 text-xs transition-colors">
                        <i class="fas fa-envelope mr-1"></i>{{ $msg->email }}
                    </a>
                    @if($msg->telephone)
                    <span class="text-slate-700">·</span>
                    <a href="tel:{{ $msg->telephone }}" class="text-slate-400 hover:text-white text-xs transition-colors">
                        <i class="fas fa-phone mr-1"></i>{{ $msg->telephone }}
                    </a>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <a href="{{ route('admin.messages.show', $msg) }}" class="w-8 h-8 bg-white/5 hover:bg-blue-500/20 hover:text-blue-400 text-slate-400 rounded-lg flex items-center justify-center transition-all" title="Lire">
                    <i class="fas fa-eye text-xs"></i>
                </a>
                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?')">
                    @csrf @method('DELETE')
                    <button class="w-8 h-8 bg-white/5 hover:bg-red-500/20 hover:text-red-400 text-slate-400 rounded-lg flex items-center justify-center transition-all" title="Supprimer">
                        <i class="fas fa-trash text-xs"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="px-6 py-16 text-center text-slate-600">
            <i class="fas fa-inbox text-4xl mb-4 block"></i>
            <p class="text-lg">Aucun message reçu</p>
            <p class="text-sm mt-1">Les messages envoyés via le formulaire de contact apparaîtront ici</p>
        </div>
        @endforelse
    </div>
</div>

@if($messages->hasPages())
<div class="mt-4">
    {{ $messages->links() }}
</div>
@endif
@endsection
