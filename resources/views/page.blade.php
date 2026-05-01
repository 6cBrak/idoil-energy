@extends('layouts.app')
@section('title', $page->titre)
@section('meta_description', $page->meta_description ?? $page->titre)

@section('content')

<section class="hero-gradient pt-32 pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">{{ $page->titre }}</h1>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($page->contenu)) !!}
        </div>
    </div>
</section>

@endsection
