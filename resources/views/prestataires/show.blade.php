<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-user-tie mr-3 text-purple-600"></i>
                {{ __('Détails du Prestataire') }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('prestataires.edit', $prestataire) }}" 
                   class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Modifier
                </a>
                <a href="{{ route('prestataires.index') }}" 
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-xl transition-all duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-purple-50 via-white to-pink-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-2xl rounded-2xl border border-gray-100 animate__animated animate__fadeInUp">
                <div class="p-8">
                    <!-- En-tête avec informations principales -->
                    <div class="border-b border-gray-200 pb-6 mb-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                    {{ substr($prestataire->nom, 0, 1) }}{{ $prestataire->prenom ? substr($prestataire->prenom, 0, 1) : '' }}
                                </div>
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900">
                                        {{ $prestataire->nom }} {{ $prestataire->prenom }}
                                    </h1>
                                    @if($prestataire->entreprise)
                                        <p class="text-lg text-gray-600">{{ $prestataire->entreprise }}</p>
                                    @endif
                                    <div class="flex items-center mt-2">
                                        <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                            {{ $prestataire->statut === 'Actif' ? 'bg-green-100 text-green-800' : 
                                               ($prestataire->statut === 'Blacklisté' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ $prestataire->statut }}
                                        </span>
                                        <span class="ml-3 px-3 py-1 text-sm bg-purple-100 text-purple-800 rounded-full">
                                            {{ $prestataire->type_prestation }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations détaillées -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Colonne gauche -->
                        <div class="space-y-6">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-id-card mr-2 text-purple-600"></i>
                                    Informations personnelles
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600">Nom :</span>
                                        <span class="text-gray-900">{{ $prestataire->nom }}</span>
                                    </div>
                                    @if($prestataire->prenom)
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-600">Prénom :</span>
                                            <span class="text-gray-900">{{ $prestataire->prenom }}</span>
                                        </div>
                                    @endif
                                    @if($prestataire->entreprise)
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-600">Entreprise :</span>
                                            <span class="text-gray-900">{{ $prestataire->entreprise }}</span>
                                        </div>
                                    @endif
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600">Spécialité :</span>
                                        <span class="text-gray-900">{{ $prestataire->specialite }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600">Type de prestation :</span>
                                        <span class="text-gray-900">{{ $prestataire->type_prestation }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-phone mr-2 text-purple-600"></i>
                                    Contact
                                </h3>
                                <div class="space-y-3">
                                    @if($prestataire->email)
                                        <div class="flex items-center">
                                            <i class="fas fa-envelope w-5 text-gray-400 mr-3"></i>
                                            <a href="mailto:{{ $prestataire->email }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $prestataire->email }}
                                            </a>
                                        </div>
                                    @endif
                                    @if($prestataire->telephone)
                                        <div class="flex items-center">
                                            <i class="fas fa-phone w-5 text-gray-400 mr-3"></i>
                                            <a href="tel:{{ $prestataire->telephone }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $prestataire->telephone }}
                                            </a>
                                        </div>
                                    @endif
                                    @if($prestataire->adresse)
                                        <div class="flex items-start">
                                            <i class="fas fa-map-marker-alt w-5 text-gray-400 mr-3 mt-1"></i>
                                            <span class="text-gray-700">{{ $prestataire->adresse }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Colonne droite -->
                        <div class="space-y-6">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-briefcase mr-2 text-purple-600"></i>
                                    Informations professionnelles
                                </h3>
                                <div class="space-y-3">
                                    @if($prestataire->tarif_journalier)
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-600">Tarif journalier :</span>
                                            <span class="text-gray-900 font-semibold">{{ $prestataire->tarif_format }}</span>
                                        </div>
                                    @endif
                                    @if($prestataire->date_debut_collaboration)
                                        <div class="flex justify-between">
                                            <span class="font-medium text-gray-600">Début collaboration :</span>
                                            <span class="text-gray-900">{{ $prestataire->date_debut_collaboration->format('d/m/Y') }}</span>
                                        </div>
                                    @endif
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600">Statut :</span>
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            {{ $prestataire->statut === 'Actif' ? 'bg-green-100 text-green-800' : 
                                               ($prestataire->statut === 'Blacklisté' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ $prestataire->statut }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            @if($prestataire->competences)
                                <div class="bg-gray-50 rounded-xl p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                        <i class="fas fa-cogs mr-2 text-purple-600"></i>
                                        Compétences
                                    </h3>
                                    <p class="text-gray-700 leading-relaxed">{{ $prestataire->competences }}</p>
                                </div>
                            @endif

                            @if($prestataire->notes)
                                <div class="bg-gray-50 rounded-xl p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                        <i class="fas fa-sticky-note mr-2 text-purple-600"></i>
                                        Notes
                                    </h3>
                                    <p class="text-gray-700 leading-relaxed">{{ $prestataire->notes }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Informations de création/modification -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Créé le {{ $prestataire->created_at->format('d/m/Y à H:i') }}</span>
                            @if($prestataire->updated_at != $prestataire->created_at)
                                <span>Modifié le {{ $prestataire->updated_at->format('d/m/Y à H:i') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
