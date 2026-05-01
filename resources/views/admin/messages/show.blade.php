@extends('admin.layouts.app')
@section('title', 'Message de ' . $message->nom)

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-white text-sm mb-6 transition-colors">
        <i class="fas fa-arrow-left"></i> Retour aux messages
    </a>

    <div class="bg-slate-900 border border-white/5 rounded-2xl overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-5 border-b border-white/5 flex items-start gap-4">
            <div class="w-12 h-12 bg-orange-500/10 border border-orange-500/20 rounded-2xl flex items-center justify-center flex-shrink-0">
                <i class="fas fa-user text-orange-400"></i>
            </div>
            <div class="flex-1">
                <h2 class="text-white font-bold text-lg">{{ $message->nom }}</h2>
                <div class="flex flex-wrap gap-3 mt-2">
                    <a href="mailto:{{ $message->email }}" class="text-orange-400 hover:text-orange-300 text-sm transition-colors flex items-center gap-1">
                        <i class="fas fa-envelope text-xs"></i> {{ $message->email }}
                    </a>
                    @if($message->telephone)
                    <a href="tel:{{ $message->telephone }}" class="text-slate-400 hover:text-white text-sm transition-colors flex items-center gap-1">
                        <i class="fas fa-phone text-xs"></i> {{ $message->telephone }}
                    </a>
                    @endif
                </div>
            </div>
            <span class="text-slate-500 text-xs flex-shrink-0">{{ $message->created_at->format('d/m/Y à H:i') }}</span>
        </div>

        <!-- Sujet -->
        <div class="px-6 py-4 border-b border-white/5 bg-white/2">
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Sujet</p>
            <p class="text-white font-semibold">{{ $message->sujet }}</p>
        </div>

        <!-- Message -->
        <div class="px-6 py-6">
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-3">Message</p>
            <div class="text-slate-200 text-sm leading-relaxed whitespace-pre-wrap bg-white/3 rounded-xl p-4 border border-white/5">{{ $message->message }}</div>
        </div>

        <!-- Actions -->
        <div class="px-6 py-4 border-t border-white/5 flex items-center gap-3">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->sujet }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                <i class="fas fa-reply"></i> Répondre par email
            </a>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Supprimer ce message définitivement ?')">
                @csrf @method('DELETE')
                <button class="bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/20 px-5 py-2.5 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
