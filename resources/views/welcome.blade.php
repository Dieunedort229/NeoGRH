<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'NeoGRH') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-primary/10 to-tertiary/10 text-gray-800 dark:text-white min-h-screen flex flex-col">
        <header class="w-full p-4 lg:p-6 bg-white/80 backdrop-blur-sm border-b border-primary/20">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-primary">ZEUS</h1>
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-primary hover:bg-primary/90 text-white rounded-md transition-colors">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-5 py-2 text-primary hover:text-primary/80 transition-colors">
                                Connexion
                            </a>

                            {{-- Inscription publique désactivée. Les comptes sont créés par l'administrateur. --}}
                        @endauth
                    </div>
                </nav>
            @endif
        </header>

        <main class="flex-grow flex items-center justify-center p-6">
            <div class="max-w-4xl w-full">
                @auth
                    <div class="bg-white/90 backdrop-blur-sm rounded-lg shadow-xl p-8 text-center border border-primary/20">
                        <h1 class="text-3xl font-bold mb-4 text-primary">Bienvenue sur NeoGRH</h1>
                        <p class="text-xl mb-6 text-gray-600">Votre système de gestion des ressources humaines</p>
                        <a href="{{ url('/dashboard') }}" class="inline-block px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-md transition-colors">
                            Accéder au tableau de bord
                        </a>
                    </div>
                @else
                    <div class="bg-white/90 backdrop-blur-sm rounded-lg shadow-xl p-8 text-center border border-primary/20">
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded-md text-center transition-colors">
                                Connexion
                            </a>
                            {{-- Inscription publique désactivée. --}}
                        </div>
                    </div>
                @endauth
            </div>
        </main>

        <footer class="p-6 text-center text-gray-500 bg-white/50 backdrop-blur-sm border-t border-primary/20">
            <p>&copy; {{ date('Y') }} NeoGRH - Tous droits réservés</p>
        </footer>
    </body>
</html>
