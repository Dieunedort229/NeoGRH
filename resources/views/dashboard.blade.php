
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-tachometer-alt mr-3 text-blue-600"></i>{{ __('Tableau de Bord NGO') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="bg-white/80 backdrop-blur-sm px-4 py-2 rounded-xl shadow-lg text-sm text-gray-700 flex items-center">
                    <i class="fas fa-calendar mr-2 text-blue-500"></i>{{ date('d/m/Y') }}
                </div>
                <div class="bg-white/80 backdrop-blur-sm px-4 py-2 rounded-xl shadow-lg text-sm text-gray-700 flex items-center">
                    <i class="fas fa-clock mr-2 text-green-500"></i><span id="current-time"></span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Barre de recherche globale -->
            <div class="mb-8 flex justify-center animate__animated animate__fadeInUp">
                <div class="relative w-full max-w-xl">
                    <input type="text" placeholder="Rechercher dans l'application..." 
                           class="w-full px-6 py-4 pl-12 rounded-2xl border border-gray-300 bg-white/80 backdrop-blur-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-2xl transition-all duration-300 hover:shadow-3xl" />
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 opacity-0 hover:opacity-20 rounded-2xl transition-opacity duration-300"></div>
                </div>
            </div>

            <!-- Cartes statistiques animées -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card: Personnel -->
                <div class="group bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 p-6 cursor-pointer animate__animated animate__fadeInUp border border-blue-100 backdrop-blur-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-blue-600 group-hover:text-blue-700 transition-colors duration-300">
                                <i class="fas fa-users text-3xl mb-2"></i>
                            </div>
                            <h3 class="font-bold text-lg text-gray-800 group-hover:text-gray-900">Personnel</h3>
                            <p class="text-gray-600 text-sm mt-1">Équipe et employés</p>
                        </div>
                        <div class="text-2xl font-bold text-blue-600 group-hover:text-blue-700">
                            <span class="animate-pulse">{{ $stats['personnel'] ?? 0 }}</span>
                        </div>
                    </div>
                    <a href="{{ route('personnel.index') }}" class="mt-4 block w-full text-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <i class="fas fa-arrow-right mr-2"></i>Gérer le personnel
                    </a>
                </div>

                <!-- Card: Projets -->
                <div class="group bg-gradient-to-br from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 p-6 cursor-pointer animate__animated animate__fadeInUp animate__delay-1s border border-green-100 backdrop-blur-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-green-600 group-hover:text-green-700 transition-colors duration-300">
                                <i class="fas fa-project-diagram text-3xl mb-2"></i>
                            </div>
                            <h3 class="font-bold text-lg text-gray-800 group-hover:text-gray-900">Projets</h3>
                            <p class="text-gray-600 text-sm mt-1">Gestion des projets</p>
                        </div>
                        <div class="text-2xl font-bold text-green-600 group-hover:text-green-700">
                            <span class="animate-pulse">{{ $stats['projets'] ?? 0 }}</span>
                        </div>
                    </div>
                    <a href="{{ route('projets.index') }}" class="mt-4 block w-full text-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <i class="fas fa-arrow-right mr-2"></i>Voir les projets
                    </a>
                </div>

                <!-- Card: Partenaires -->
                <div class="group bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 p-6 cursor-pointer animate__animated animate__fadeInUp animate__delay-2s border border-purple-100 backdrop-blur-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-purple-600 group-hover:text-purple-700 transition-colors duration-300">
                                <i class="fas fa-handshake text-3xl mb-2"></i>
                            </div>
                            <h3 class="font-bold text-lg text-gray-800 group-hover:text-gray-900">Partenaires</h3>
                            <p class="text-gray-600 text-sm mt-1">Réseau et collaborations</p>
                        </div>
                        <div class="text-2xl font-bold text-purple-600 group-hover:text-purple-700">
                            <span class="animate-pulse">{{ $stats['partenaires'] ?? 0 }}</span>
                        </div>
                    </div>
                    <a href="{{ route('partenaires.index') }}" class="mt-4 block w-full text-center px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <i class="fas fa-arrow-right mr-2"></i>Gérer partenaires
                    </a>
                </div>

                <!-- Card: Finances -->
                <div class="group bg-gradient-to-br from-yellow-50 to-yellow-100 hover:from-yellow-100 hover:to-yellow-200 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 p-6 cursor-pointer animate__animated animate__fadeInUp animate__delay-3s border border-yellow-100 backdrop-blur-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-yellow-600 group-hover:text-yellow-700 transition-colors duration-300">
                                <i class="fas fa-university text-3xl mb-2"></i>
                            </div>
                            <h3 class="font-bold text-lg text-gray-800 group-hover:text-gray-900">Finances</h3>
                            <p class="text-gray-600 text-sm mt-1">Comptes et budget</p>
                        </div>
                        <div class="text-2xl font-bold text-yellow-600 group-hover:text-yellow-700">
                            <span class="animate-pulse">{{ number_format($stats['solde_total'] ?? 0, 0, ',', ' ') }} DH</span>
                        </div>
                    </div>
                    <a href="{{ route('banques.index') }}" class="mt-4 block w-full text-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <i class="fas fa-arrow-right mr-2"></i>Gestion bancaire
                    </a>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 hover:shadow-3xl transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1s border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt mr-2 text-yellow-500"></i>Actions Rapides
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('personnel.create') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-user-plus text-blue-500 mr-3"></i>
                            <span class="text-gray-700">Ajouter employé</span>
                        </a>
                        <a href="{{ route('projets.create') }}" class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-plus-circle text-green-500 mr-3"></i>
                            <span class="text-gray-700">Nouveau projet</span>
                        </a>
                        <a href="{{ route('partenaires.create') }}" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-handshake text-purple-500 mr-3"></i>
                            <span class="text-gray-700">Ajouter partenaire</span>
                        </a>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 hover:shadow-3xl transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-2s border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-line mr-2 text-green-500"></i>Statistiques
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Personnel actif</span>
                            <span class="font-bold text-blue-600">{{ $stats['personnel'] ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Projets en cours</span>
                            <span class="font-bold text-green-600">{{ $stats['projets_actifs'] ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Budget total</span>
                            <span class="font-bold text-yellow-600">{{ number_format($stats['budget_total'] ?? 0, 0, ',', ' ') }} DH</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Prestataires</span>
                            <span class="font-bold text-purple-600">{{ $stats['prestataires'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 hover:shadow-3xl transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-3s border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>Aide & Support
                    </h3>
                    <div class="space-y-3">
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <p class="text-sm text-gray-700">💡 Commencez par ajouter votre équipe dans la section Personnel</p>
                        </div>
                        <div class="p-3 bg-green-50 rounded-lg">
                            <p class="text-sm text-gray-700">📋 Créez vos premiers projets pour organiser vos activités</p>
                        </div>
                        <div class="p-3 bg-purple-50 rounded-lg">
                            <p class="text-sm text-gray-700">🤝 Ajoutez vos partenaires pour faciliter la collaboration</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section des dernières activités -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Derniers personnels ajoutés -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 hover:shadow-3xl transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1s border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-users mr-2 text-blue-500"></i>Personnel Récent
                    </h3>
                    <div class="space-y-3">
                        @forelse($recent_personnel as $person)
                            <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $person->prenom }} {{ $person->nom }}</div>
                                    <div class="text-xs text-gray-500">{{ $person->poste }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-4">
                                <i class="fas fa-user-plus text-2xl mb-2"></i>
                                <p>Aucun personnel ajouté</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Derniers projets -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 hover:shadow-3xl transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-2s border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-project-diagram mr-2 text-green-500"></i>Projets Récents
                    </h3>
                    <div class="space-y-3">
                        @forelse($recent_projets as $projet)
                            <div class="flex items-center p-3 bg-green-50 rounded-lg">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-400 to-green-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-folder text-white text-sm"></i>
                                </div>
                                <div class="ml-3 flex-1">
                                    <div class="text-sm font-medium text-gray-900">{{ Str::limit($projet->nom, 25) }}</div>
                                    <div class="text-xs text-gray-500">{{ $projet->statut }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-4">
                                <i class="fas fa-plus-circle text-2xl mb-2"></i>
                                <p>Aucun projet créé</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Derniers partenaires -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 hover:shadow-3xl transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-3s border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-handshake mr-2 text-purple-500"></i>Partenaires Récents
                    </h3>
                    <div class="space-y-3">
                        @forelse($recent_partenaires as $partenaire)
                            <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-handshake text-white text-sm"></i>
                                </div>
                                <div class="ml-3 flex-1">
                                    <div class="text-sm font-medium text-gray-900">{{ Str::limit($partenaire->nom, 20) }}</div>
                                    <div class="text-xs text-gray-500">{{ $partenaire->type_partenaire }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-4">
                                <i class="fas fa-handshake text-2xl mb-2"></i>
                                <p>Aucun partenaire ajouté</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Section Budget et Performance -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Aperçu Budget -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 hover:shadow-3xl transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1s border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-pie mr-2 text-yellow-500"></i>Aperçu Budget
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Budget Total Projets</span>
                            <span class="font-bold text-green-600">{{ number_format($stats['budget_total'] ?? 0, 0, ',', ' ') }} DH</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Budget Utilisé</span>
                            <span class="font-bold text-red-600">{{ number_format($stats['budget_utilise'] ?? 0, 0, ',', ' ') }} DH</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Budget Disponible</span>
                            <span class="font-bold text-blue-600">{{ number_format(($stats['budget_total'] - $stats['budget_utilise']) ?? 0, 0, ',', ' ') }} DH</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            @php
                                $percentage = $stats['budget_total'] > 0 ? (($stats['budget_utilise'] / $stats['budget_total']) * 100) : 0;
                            @endphp
                            <div class="bg-gradient-to-r from-green-400 to-blue-500 h-3 rounded-full transition-all duration-1000" 
                                 style="width: {{ min($percentage, 100) }}%"></div>
                        </div>
                        <div class="text-center text-sm text-gray-600">
                            {{ number_format($percentage, 1) }}% du budget utilisé
                        </div>
                    </div>
                </div>

                <!-- Aperçu Financier -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl p-6 hover:shadow-3xl transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-2s border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-university mr-2 text-green-500"></i>Situation Financière
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Comptes Bancaires</span>
                            <span class="font-bold text-blue-600">{{ $stats['banques'] ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Solde Total</span>
                            <span class="font-bold text-green-600">{{ number_format($stats['solde_total'] ?? 0, 0, ',', ' ') }} DH</span>
                        </div>
                        <div class="p-4 bg-gradient-to-r from-green-50 to-blue-50 rounded-lg">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-chart-line text-2xl text-green-600 mr-3"></i>
                                <div class="text-center">
                                    <div class="text-sm text-gray-600">Santé Financière</div>
                                    <div class="font-bold text-green-600">
                                        @if(($stats['solde_total'] ?? 0) > 100000)
                                            Excellente
                                        @elseif(($stats['solde_total'] ?? 0) > 50000)
                                            Bonne
                                        @elseif(($stats['solde_total'] ?? 0) > 0)
                                            Stable
                                        @else
                                            À surveiller
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour l'horloge temps réel -->
    <script>
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('fr-FR', { 
                hour: '2-digit', 
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('current-time').textContent = timeString;
        }
        
        // Mettre à jour l'heure immédiatement puis toutes les secondes
        updateTime();
        setInterval(updateTime, 1000);
    </script>
</x-app-layout>
