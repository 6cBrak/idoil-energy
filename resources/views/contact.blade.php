@extends('layouts.app')

@section('title', 'Contact')
@section('meta_description', 'Contactez Idoil Energy pour vos projets pétroliers et gaziers. Notre équipe est à votre disposition pour répondre à toutes vos questions.')

@section('content')

<!-- Hero -->
<section class="hero-gradient pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-primary-400 font-semibold text-sm uppercase tracking-widest">Parlons de votre projet</span>
        <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">Contactez-Nous</h1>
        <p class="text-gray-300 text-xl max-w-2xl mx-auto">
            Notre équipe d'experts est disponible pour répondre à vos questions et vous accompagner dans vos projets énergétiques.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Infos Contact -->
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-extrabold text-navy-800 mb-2">Nos Coordonnées</h2>
                    <p class="text-gray-500 text-sm">N'hésitez pas à nous contacter par téléphone, email ou en visitant notre siège social.</p>
                </div>

                @php
                use App\Models\Setting;
                $contactInfos = [
                    ['map-marker-alt','Adresse','bg-primary-50 border-primary-200 text-primary-500', Setting::get('contact_adresse','Ouagadougou, Burkina Faso')],
                    ['phone','Téléphone','bg-blue-50 border-blue-200 text-blue-500', Setting::get('contact_telephone','+226 70 23 81 44') . (Setting::get('contact_telephone_2') ? '<br>'.Setting::get('contact_telephone_2') : '')],
                    ['envelope','Email','bg-orange-50 border-orange-200 text-orange-500', Setting::get('contact_email','contact@idoil-energy.com') . (Setting::get('contact_email_2') ? '<br>'.Setting::get('contact_email_2') : '')],
                    ['clock','Horaires','bg-green-50 border-green-200 text-green-500', Setting::get('contact_horaires_semaine','Lundi – Vendredi : 7h30 – 17h30') . (Setting::get('contact_horaires_samedi') ? '<br>'.Setting::get('contact_horaires_samedi') : '')],
                ];
                @endphp
                @foreach($contactInfos as [$icon, $label, $style, $value])
                <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 {{ $style }} border rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-{{ $icon }}"></i>
                    </div>
                    <div>
                        <p class="font-bold text-navy-800 text-sm mb-1">{{ $label }}</p>
                        <p class="text-gray-500 text-sm">{!! $value !!}</p>
                    </div>
                </div>
                @endforeach

                <!-- Réseaux sociaux -->
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                    <p class="font-bold text-navy-800 text-sm mb-4">Nos Réseaux Sociaux</p>
                    <div class="flex gap-3">
                        @foreach([['linkedin-in','LinkedIn','bg-blue-600'],['facebook-f','Facebook','bg-blue-700'],['twitter','Twitter','bg-sky-500'],['youtube','YouTube','bg-red-600']] as [$icon, $name, $color])
                        <a href="#" class="{{ $color }} hover:opacity-80 text-white w-10 h-10 rounded-xl flex items-center justify-center transition-opacity" title="{{ $name }}">
                            <i class="fab fa-{{ $icon }} text-sm"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 lg:p-10">
                    <h2 class="text-2xl font-extrabold text-navy-800 mb-2">Envoyez-nous un message</h2>
                    <p class="text-gray-500 text-sm mb-8">Remplissez ce formulaire et nous vous répondrons dans les 24 heures ouvrables.</p>

                    @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 mb-6 flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl flex-shrink-0"></i>
                        <p class="font-medium text-sm">{{ session('success') }}</p>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                            <p class="font-bold text-sm">Veuillez corriger les erreurs suivantes :</p>
                        </div>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="nom" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Nom complet <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required
                                    placeholder="Ex: Ahmed Bensalem"
                                    class="w-full px-4 py-3 border {{ $errors->has('nom') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-gray-50' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Adresse email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="votre@email.com"
                                    class="w-full px-4 py-3 border {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-gray-50' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="telephone" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Téléphone
                                </label>
                                <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}"
                                    placeholder="+226 XX XX XX XX"
                                    class="w-full px-4 py-3 border border-gray-200 bg-gray-50 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            </div>
                            <div>
                                <label for="sujet" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Sujet <span class="text-red-500">*</span>
                                </label>
                                <select id="sujet" name="sujet" required
                                    class="w-full px-4 py-3 border {{ $errors->has('sujet') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-gray-50' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                                    <option value="">-- Choisir un sujet --</option>
                                    @foreach(['Demande de devis','Information sur nos services','Partenariat commercial','Recrutement','Demande de catalogue','Autre'] as $s)
                                    <option value="{{ $s }}" {{ old('sujet') === $s ? 'selected' : '' }}>{{ $s }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Votre message <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                placeholder="Décrivez votre projet ou votre demande en détail..."
                                class="w-full px-4 py-3 border {{ $errors->has('message') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-gray-50' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all resize-none">{{ old('message') }}</textarea>
                        </div>

                        <div class="flex items-start gap-3">
                            <input type="checkbox" id="consent" required class="mt-1 w-4 h-4 text-primary-500 border-gray-300 rounded focus:ring-primary-500">
                            <label for="consent" class="text-gray-500 text-xs leading-relaxed">
                                J'accepte que mes données soient traitées par Idoil Energy dans le cadre de ma demande, conformément à notre <a href="#" class="text-primary-500 hover:underline">politique de confidentialité</a>.
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full bg-primary-500 hover:bg-primary-600 text-white py-4 px-8 rounded-xl font-bold text-base transition-all duration-200 hover:shadow-xl hover:shadow-primary-500/30 flex items-center justify-center gap-3 group">
                            <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                            Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Carte / Map placeholder -->
<section class="bg-white">
    <div class="w-full h-80 bg-gradient-to-br from-navy-800 to-navy-900 flex items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 30px 30px;"></div>
        <div class="text-center z-10 relative">
            <div class="w-16 h-16 bg-primary-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-map-marker-alt text-white text-2xl"></i>
            </div>
            <p class="text-white font-bold text-xl">IDOIL ENERGY – Siège Social</p>
            <p class="text-gray-400 mt-2">Ouagadougou, Burkina Faso</p>
            <a href="https://maps.google.com/?q=Ouagadougou,Burkina+Faso" target="_blank" class="inline-flex items-center mt-4 bg-primary-500 hover:bg-primary-600 text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition-colors">
                <i class="fas fa-external-link-alt mr-2 text-xs"></i> Ouvrir dans Google Maps
            </a>
        </div>
    </div>
</section>

@endsection
