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
                <x-nav-link href="{{ route('admin.offres.index') }}" :active="request()->routeIs('admin.*')">
                    Administration
                </x-nav-link>
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
