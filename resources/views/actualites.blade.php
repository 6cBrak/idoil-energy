@extends('layouts.app')
@section('title', 'Actualités')
@section('meta_description', 'Toutes les actualités et publications d\'IDOIL ENERGY — projets, innovations et nouvelles du secteur énergétique.')

@section('content')

<section class="hero-gradient pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-primary-400 font-semibold text-sm uppercase tracking-widest">Nos Publications</span>
        <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">Actualités</h1>
        <p class="text-gray-300 text-xl max-w-2xl mx-auto">
            Restez informé des dernières nouvelles, projets et innovations d'IDOIL ENERGY.
        </p>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($articles->isEmpty())
        <div class="text-center py-20">
            <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-bold text-navy-800 mb-2">Aucun article publié</h3>
            <p class="text-gray-500">Les actualités seront disponibles prochainement.</p>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <a href="{{ route('actualites.show', $article->slug) }}" class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 card-hover animate-on-scroll block">
                <div class="aspect-video overflow-hidden">
                    @if($article->image)
                    <img src="/{{ $article->image }}" alt="{{ $article->titre }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center">
                        <i class="fas fa-newspaper text-primary-400 text-4xl opacity-40"></i>
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    @if($article->date_publication)
                    <p class="text-primary-500 text-xs font-semibold mb-2">
                        <i class="fas fa-calendar mr-1"></i>{{ $article->date_publication->format('d F Y') }}
                    </p>
                    @endif
                    <h3 class="text-lg font-bold text-navy-800 mb-2 line-clamp-2">{{ $article->titre }}</h3>
                    @if($article->extrait)
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">{{ $article->extrait }}</p>
                    @endif
                    <div class="mt-4 flex items-center text-primary-500 text-sm font-semibold">
                        Lire la suite <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-12">{{ $articles->links() }}</div>
        @endif
    </div>
</section>

@endsection
