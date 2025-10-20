<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-handshake mr-3 text-blue-600"></i>
                {{ __('Détails du Partenaire') }} - {{ $partenaire->nom_organisation }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('partenaires.edit', $partenaire) }}" 
                   class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Modifier
                </a>
                <a href="{{ route('partenaires.index') }}" 
                   class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour
                </a>
            </div>
        </div>
    </x-slot>
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header avec animation -->
        <!-- En-tête déplacé dans le header slot ci-dessus -->

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Informations principales -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Informations générales -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informations générales
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nom de l'organisation</label>
                                <p class="text-lg font-semibold text-gray-900">{{ $partenaire->nom_organisation }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Domaine d'intervention</label>
                                <p class="text-lg text-gray-900">{{ $partenaire->domaine_intervention ?? 'Non renseigné' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Type de partenariat</label>
                                <p class="text-lg text-gray-900">{{ $partenaire->type_partenariat ?? 'Non renseigné' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Statut</label>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $partenaire->statut === 'actif' ? 'bg-green-100 text-green-800' : 
                                       ($partenaire->statut === 'inactif' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ ucfirst($partenaire->statut ?? 'Non défini') }}
                                </span>
                            </div>
                        </div>
                        
                        @if($partenaire->description)
                        <div class="bg-gray-50 rounded-lg p-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <p class="text-gray-900 leading-relaxed">{{ $partenaire->description }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Période de partenariat -->
                @if($partenaire->date_debut_partenariat || $partenaire->date_fin_partenariat)
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-500 to-pink-600 p-6">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Période de partenariat
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if($partenaire->date_debut_partenariat)
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Date de début</label>
                                <p class="text-lg font-semibold text-green-600">
                                    {{ \Carbon\Carbon::parse($partenaire->date_debut_partenariat)->format('d/m/Y') }}
                                </p>
                            </div>
                            @endif
                            
                            @if($partenaire->date_fin_partenariat)
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Date de fin</label>
                                <p class="text-lg font-semibold text-red-600">
                                    {{ \Carbon\Carbon::parse($partenaire->date_fin_partenariat)->format('d/m/Y') }}
                                </p>
                            </div>
                            @endif
                        </div>
                        
                        @if($partenaire->date_debut_partenariat && $partenaire->date_fin_partenariat)
                        <div class="mt-4 bg-blue-50 rounded-lg p-4">
                            <label class="block text-sm font-medium text-blue-700 mb-2">Durée du partenariat</label>
                            <p class="text-lg font-semibold text-blue-800">
                                @php
                                    $debut = \Carbon\Carbon::parse($partenaire->date_debut_partenariat);
                                    $fin = \Carbon\Carbon::parse($partenaire->date_fin_partenariat);
                                    $duree = $debut->diffInDays($fin);
                                @endphp
                                {{ $duree }} jours ({{ round($duree / 365, 1) }} années)
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar - Informations de contact -->
            <div class="space-y-6">
                <!-- Contact principal -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-500 to-teal-600 p-6">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Contact principal
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        @if($partenaire->contact_principal)
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Nom</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $partenaire->contact_principal }}</p>
                            </div>
                        </div>
                        @endif

                        @if($partenaire->email)
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Email</p>
                                <a href="mailto:{{ $partenaire->email }}" 
                                   class="text-lg font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                                    {{ $partenaire->email }}
                                </a>
                            </div>
                        </div>
                        @endif

                        @if($partenaire->telephone)
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Téléphone</p>
                                <a href="tel:{{ $partenaire->telephone }}" 
                                   class="text-lg font-semibold text-purple-600 hover:text-purple-800 transition-colors">
                                    {{ $partenaire->telephone }}
                                </a>
                            </div>
                        </div>
                        @endif

                        @if($partenaire->adresse)
                        <div class="flex items-start space-x-3">
                            <div class="p-2 bg-red-100 rounded-lg">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Adresse</p>
                                <p class="text-lg font-semibold text-gray-900 leading-relaxed">{{ $partenaire->adresse }}</p>
                            </div>
                        </div>
                        @endif

                        @if(!$partenaire->contact_principal && !$partenaire->email && !$partenaire->telephone && !$partenaire->adresse)
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <p class="text-gray-500">Aucune information de contact renseignée</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Informations système -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-500 to-gray-600 p-6">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Informations système
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">ID</span>
                            <span class="text-sm font-semibold text-gray-900">#{{ $partenaire->id }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Créé le</span>
                            <span class="text-sm font-semibold text-gray-900">{{ $partenaire->created_at->format('d/m/Y à H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-sm text-gray-600">Modifié le</span>
                            <span class="text-sm font-semibold text-gray-900">{{ $partenaire->updated_at->format('d/m/Y à H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out forwards;
}
</style>
</x-app-layout>
