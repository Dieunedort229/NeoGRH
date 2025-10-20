<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-university mr-3 text-yellow-600"></i>
                {{ __('Détails Compte Bancaire') }} - {{ $banque->nom_banque }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('banques.edit', $banque) }}" 
                   class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Modifier
                </a>
                <a href="{{ route('banques.index') }}" 
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-xl transition-all duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour à la liste
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-yellow-50 via-white to-orange-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-2xl rounded-2xl border border-gray-100 animate__animated animate__fadeInUp">
                <div class="p-8 text-gray-900">
                    
                    <!-- En-tête avec informations principales -->
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white p-6 rounded-xl mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-bold flex items-center">
                                    <i class="fas fa-university mr-3"></i>
                                    {{ $banque->nom_banque }}
                                </h3>
                                <p class="text-yellow-100 mt-2">{{ $banque->numero_compte }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-bold">{{ $banque->solde_format }}</div>
                                <div class="text-yellow-100">Solde actuel</div>
                                @if($banque->variation_solde != 0)
                                    <div class="mt-2 text-sm">
                                        <span class="px-3 py-1 rounded-full {{ $banque->variation_solde > 0 ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                            {{ $banque->variation_solde > 0 ? '+' : '' }}{{ number_format($banque->variation_solde, 2) }} {{ $banque->devise }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        
                        <!-- Informations du compte -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-credit-card mr-2 text-blue-600"></i>
                                Informations du compte
                            </h3>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between items-center border-b border-blue-100 pb-2">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-hashtag mr-2 text-blue-500"></i>Numéro de compte
                                    </span>
                                    <span class="text-sm text-gray-900 font-mono">{{ $banque->numero_compte }}</span>
                                </div>

                                <div class="flex justify-between items-center border-b border-blue-100 pb-2">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-tags mr-2 text-blue-500"></i>Type de compte
                                    </span>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                        {{ $banque->type_compte }}
                                    </span>
                                </div>

                                <div class="flex justify-between items-center border-b border-blue-100 pb-2">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-coins mr-2 text-blue-500"></i>Devise
                                    </span>
                                    <span class="text-sm text-gray-900 font-semibold">{{ $banque->devise }}</span>
                                </div>

                                <div class="flex justify-between items-center border-b border-blue-100 pb-2">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-toggle-on mr-2 text-blue-500"></i>Statut
                                    </span>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium 
                                        {{ $banque->statut === 'Actif' ? 'bg-green-100 text-green-800' : 
                                           ($banque->statut === 'Fermé' ? 'bg-red-100 text-red-800' : 'bg-orange-100 text-orange-800') }}">
                                        {{ $banque->statut }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Soldes et finances -->
                        <div class="bg-gradient-to-br from-green-50 to-teal-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-chart-line mr-2 text-green-600"></i>
                                Informations financières
                            </h3>
                            
                            <div class="space-y-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm border border-green-100">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-600">
                                            <i class="fas fa-wallet mr-2 text-green-500"></i>Solde initial
                                        </span>
                                        <span class="text-lg font-bold text-green-700">
                                            {{ number_format($banque->solde_initial, 2) }} {{ $banque->devise }}
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm border border-green-100">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-600">
                                            <i class="fas fa-money-bill-wave mr-2 text-green-500"></i>Solde actuel
                                        </span>
                                        <span class="text-lg font-bold text-green-700">
                                            {{ number_format($banque->solde_actuel, 2) }} {{ $banque->devise }}
                                        </span>
                                    </div>
                                </div>

                                @if($banque->variation_solde != 0)
                                <div class="bg-white p-4 rounded-lg shadow-sm border border-green-100">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-600">
                                            <i class="fas fa-exchange-alt mr-2 text-green-500"></i>Variation
                                        </span>
                                        <span class="text-lg font-bold {{ $banque->variation_solde > 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $banque->variation_solde > 0 ? '+' : '' }}{{ number_format($banque->variation_solde, 2) }} {{ $banque->devise }}
                                        </span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Responsable et contact -->
                        @if($banque->responsable_compte || $banque->contact_banque)
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-user-tie mr-2 text-purple-600"></i>
                                Contact et responsable
                            </h3>
                            
                            <div class="space-y-4">
                                @if($banque->responsable_compte)
                                <div class="flex justify-between items-center border-b border-purple-100 pb-2">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-user mr-2 text-purple-500"></i>Responsable du compte
                                    </span>
                                    <span class="text-sm text-gray-900">{{ $banque->responsable_compte }}</span>
                                </div>
                                @endif

                                @if($banque->contact_banque)
                                <div class="flex justify-between items-center border-b border-purple-100 pb-2">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-phone mr-2 text-purple-500"></i>Contact banque
                                    </span>
                                    <span class="text-sm text-gray-900">{{ $banque->contact_banque }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        <!-- Adresse -->
                        @if($banque->adresse_banque)
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 p-6 rounded-xl {{ !($banque->responsable_compte || $banque->contact_banque) ? 'lg:col-span-2' : '' }}">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-orange-600"></i>
                                Adresse de la banque
                            </h3>
                            
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-orange-100">
                                <p class="text-gray-700 leading-relaxed">{{ $banque->adresse_banque }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Notes -->
                        @if($banque->notes)
                        <div class="lg:col-span-2 bg-gradient-to-br from-gray-50 to-slate-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-sticky-note mr-2 text-gray-600"></i>
                                Notes et observations
                            </h3>
                            
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                                <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $banque->notes }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Informations système -->
                        <div class="lg:col-span-2 bg-gradient-to-br from-indigo-50 to-blue-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-indigo-600"></i>
                                Informations système
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-calendar-plus mr-2 text-indigo-500"></i>Créé le
                                    </span>
                                    <span class="text-sm text-gray-900">{{ $banque->created_at->format('d/m/Y H:i') }}</span>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-calendar-edit mr-2 text-indigo-500"></i>Modifié le
                                    </span>
                                    <span class="text-sm text-gray-900">{{ $banque->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('banques.edit', $banque) }}" 
                           class="px-6 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold rounded-lg transition duration-300 transform hover:scale-105 shadow-lg flex items-center">
                            <i class="fas fa-edit mr-2"></i>
                            Modifier ce compte
                        </a>
                        
                        <form action="{{ route('banques.destroy', $banque) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold rounded-lg transition duration-300 transform hover:scale-105 shadow-lg flex items-center"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte bancaire ?')">
                                <i class="fas fa-trash-alt mr-2"></i>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
