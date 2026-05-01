<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin — Idoil Energy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 flex items-center justify-center p-4">

    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>

    <div class="w-full max-w-md relative z-10">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-500 rounded-2xl mb-4 shadow-2xl shadow-orange-500/40">
                <i class="fas fa-bolt text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-extrabold text-white">Idoil<span class="text-orange-400">Energy</span></h1>
            <p class="text-slate-400 text-sm mt-1">Administration</p>
        </div>

        <!-- Card -->
        <div class="bg-white/5 backdrop-blur border border-white/10 rounded-3xl p-8 shadow-2xl">
            <h2 class="text-xl font-bold text-white mb-1">Connexion</h2>
            <p class="text-slate-400 text-sm mb-8">Accès réservé aux administrateurs</p>

            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 mb-6 flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-400 flex-shrink-0"></i>
                <p class="text-red-300 text-sm">{{ $errors->first() }}</p>
            </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="admin@idoil-energy.com"
                            class="w-full bg-white/5 border border-white/10 focus:border-orange-500/50 focus:ring-2 focus:ring-orange-500/20 rounded-xl pl-11 pr-4 py-3.5 text-white placeholder-slate-500 text-sm outline-none transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Mot de passe</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="password" name="password" required
                            placeholder="••••••••"
                            class="w-full bg-white/5 border border-white/10 focus:border-orange-500/50 focus:ring-2 focus:ring-orange-500/20 rounded-xl pl-11 pr-4 py-3.5 text-white placeholder-slate-500 text-sm outline-none transition-all">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-orange-500 bg-white/10 border-white/20 focus:ring-orange-500">
                        <span class="text-slate-400 text-sm">Se souvenir de moi</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3.5 rounded-xl font-semibold transition-all duration-200 hover:shadow-xl hover:shadow-orange-500/30 flex items-center justify-center gap-2">
                    <i class="fas fa-sign-in-alt"></i> Se connecter
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-slate-500 hover:text-slate-300 text-sm transition-colors">
                <i class="fas fa-arrow-left mr-1"></i> Retour au site
            </a>
        </div>
    </div>
</body>
</html>
