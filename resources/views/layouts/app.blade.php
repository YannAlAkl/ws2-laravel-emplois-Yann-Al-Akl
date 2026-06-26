<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Offres d'emploi")</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <nav class="bg-[#1E2D4A] text-white shadow-md">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('emplois.index') }}"
               class="text-lg font-bold tracking-tight hover:text-cyan-400 transition-colors duration-200">
                💼 EmploiInterne
            </a>
            <div class="flex items-center gap-6 text-sm">
                <x-nav-link href="{{ route('emplois.index') }}" :active="request()->routeIs('emplois.*')">
                    Offres
                </x-nav-link>

                <x-nav-link href="{{ route('apropos') }}" :active="request()->routeIs('apropos')">
                    À propos
                </x-nav-link>

                @auth
                    <x-nav-link href="{{ route('mes-candidatures.index') }}" :active="request()->routeIs('candidatures.*')">
                        Mes candidatures
                    </x-nav-link>

                    @if(auth()->user()->is_admin)
                        <x-nav-link href="{{ route('admin.offres.index') }}" :active="request()->routeIs('admin.*')">
                            Administration
                        </x-nav-link>
                    @endif

                    <div class="flex items-center gap-4">
                        <span class="text-white/90">{{ auth()->user()->name ?? 'Compte' }}</span>
                        <a href="{{ route('logout') }}"
                           class="text-white/90 hover:text-white transition-colors duration-200"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="relative group">
                        <button type="button" class="text-white/90 hover:text-white transition-colors duration-200 inline-flex items-center gap-2">
                            Authentification
                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div class="absolute right-0 mt-2 w-52 bg-white text-slate-800 rounded-lg shadow-lg border border-slate-200 hidden group-hover:block">
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm hover:bg-slate-50">Connexion</a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm hover:bg-slate-50">S’inscrire</a>
                        </div>
                    </div>
                @endauth

            </div>

        </div>
    </nav>

    @if(session('success'))
    <div class="max-w-5xl mx-auto px-6 pt-5">
        <x-alert type="success">{{ session('success') }}</x-alert>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-5xl mx-auto px-6 pt-5">
        <x-alert type="error">{{ session('error') }}</x-alert>
    </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="mt-16 border-t border-slate-200 bg-white">
        <div class="max-w-5xl mx-auto px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-sm text-slate-400">
            <span>© {{ date('Y') }} EmploiInterne — Tous droits réservés</span>
            <span>Propulsé par Laravel</span>
        </div>
    </footer>

</body>
</html>
