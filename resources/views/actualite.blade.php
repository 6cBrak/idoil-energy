@extends('layouts.app')
@section('title', $article->titre)
@section('meta_description', $article->extrait ?? $article->titre)

@section('content')

<section class="hero-gradient pt-32 pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('actualites') }}" class="inline-flex items-center text-primary-400 hover:text-primary-300 text-sm font-medium mb-6 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Retour aux actualités
        </a>
        @if($article->date_publication)
        <p class="text-primary-400 text-sm font-semibold mb-3">
            <i class="fas fa-calendar mr-1"></i>{{ $article->date_publication->format('d F Y') }}
        </p>
        @endif
        <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">{{ $article->titre }}</h1>
        @if($article->extrait)
        <p class="text-gray-300 text-xl mt-4 leading-relaxed">{{ $article->extrait }}</p>
        @endif
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($article->image)
        <div class="rounded-2xl overflow-hidden mb-10 shadow-xl">
            <img src="/{{ $article->image }}" alt="{{ $article->titre }}" class="w-full max-h-96 object-cover">
        </div>
        @endif

        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($article->contenu)) !!}
        </div>
    </div>
</section>

@if($recents->isNotEmpty())
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-extrabold text-navy-800 mb-8">Autres actualités</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($recents as $recent)
            <a href="{{ route('actualites.show', $recent->slug) }}" class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg border border-gray-100 card-hover block">
                <div class="aspect-video overflow-hidden">
                    @if($recent->image)
                    <img src="/{{ $recent->image }}" alt="{{ $recent->titre }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center">
                        <i class="fas fa-newspaper text-primary-400 text-3xl opacity-40"></i>
                    </div>
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-navy-800 text-sm line-clamp-2">{{ $recent->titre }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
