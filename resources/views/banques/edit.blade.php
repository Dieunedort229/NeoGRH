<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-university mr-3 text-yellow-600"></i>
                {{ __('Modifier Compte Bancaire') }} - {{ $banque->nom_banque }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('banques.show', $banque) }}" 
                   class="bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium py-2 px-4 rounded-xl transition-all duration-300 flex items-center">
                    <i class="fas fa-eye mr-2"></i>
                    Voir les détails
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
                    
                    @if($errors->any())
                        <div class="bg-gradient-to-r from-red-400 to-red-500 text-white px-6 py-4 rounded-xl mb-6 shadow-lg animate__animated animate__fadeInDown">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-triangle mr-3 text-xl"></i>
                                <div>
                                    <h4 class="font-bold">Erreurs de validation</h4>
                                    <ul class="mt-2 text-sm">
                                        @foreach($errors->all() as $error)
                                            <li>• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('banques.update', $banque) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Informations de la banque -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-university mr-2 text-blue-600"></i>Informations de la banque
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nom_banque" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-building mr-1"></i>Nom de la banque *
                                    </label>
                                    <input type="text" name="nom_banque" id="nom_banque" value="{{ old('nom_banque', $banque->nom_banque) }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: BMCE Bank" required>
                                    @error('nom_banque')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="numero_compte" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-hashtag mr-1"></i>Numéro de compte *
                                    </label>
                                    <input type="text" name="numero_compte" id="numero_compte" value="{{ old('numero_compte', $banque->numero_compte) }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: 123456789012" required>
                                    @error('numero_compte')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="type_compte" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-tags mr-1"></i>Type de compte *
                                    </label>
                                    <select name="type_compte" id="type_compte" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="Courant" {{ old('type_compte', $banque->type_compte) === 'Courant' ? 'selected' : '' }}>Courant</option>
                                        <option value="Épargne" {{ old('type_compte', $banque->type_compte) === 'Épargne' ? 'selected' : '' }}>Épargne</option>
                                        <option value="Projet" {{ old('type_compte', $banque->type_compte) === 'Projet' ? 'selected' : '' }}>Projet</option>
                                        <option value="Investissement" {{ old('type_compte', $banque->type_compte) === 'Investissement' ? 'selected' : '' }}>Investissement</option>
                                    </select>
                                    @error('type_compte')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="devise" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-coins mr-1"></i>Devise *
                                    </label>
                                    <select name="devise" id="devise" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="FCFA" {{ old('devise', $banque->devise) === 'FCFA' ? 'selected' : '' }}>FCFA</option>
                                        <option value="MAD" {{ old('devise', $banque->devise) === 'MAD' ? 'selected' : '' }}>MAD (Dirham)</option>
                                        <option value="USD" {{ old('devise', $banque->devise) === 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="EUR" {{ old('devise', $banque->devise) === 'EUR' ? 'selected' : '' }}>EUR</option>
                                    </select>
                                    @error('devise')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-toggle-on mr-1"></i>Statut *
                                    </label>
                                    <select name="statut" id="statut" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="Actif" {{ old('statut', $banque->statut) === 'Actif' ? 'selected' : '' }}>Actif</option>
                                        <option value="Fermé" {{ old('statut', $banque->statut) === 'Fermé' ? 'selected' : '' }}>Fermé</option>
                                        <option value="Suspendu" {{ old('statut', $banque->statut) === 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                                    </select>
                                    @error('statut')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="adresse_banque" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-map-marker-alt mr-1"></i>Adresse de la banque
                                    </label>
                                    <textarea name="adresse_banque" id="adresse_banque" rows="3" 
                                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                              placeholder="Adresse complète de la banque...">{{ old('adresse_banque', $banque->adresse_banque) }}</textarea>
                                    @error('adresse_banque')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Soldes -->
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-chart-line mr-2 text-green-600"></i>Informations financières
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="solde_initial" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-wallet mr-1"></i>Solde initial *
                                    </label>
                                    <input type="number" name="solde_initial" id="solde_initial" value="{{ old('solde_initial', $banque->solde_initial) }}" 
                                           step="0.01" min="0"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="0.00" required>
                                    @error('solde_initial')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="solde_actuel" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-money-bill-wave mr-1"></i>Solde actuel *
                                    </label>
                                    <input type="number" name="solde_actuel" id="solde_actuel" value="{{ old('solde_actuel', $banque->solde_actuel) }}" 
                                           step="0.01"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="0.00" required>
                                    @error('solde_actuel')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <!-- Affichage de la variation -->
                            <div class="mt-4 p-4 bg-white rounded-lg border border-green-200">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-gray-600">
                                        <i class="fas fa-exchange-alt mr-2 text-green-500"></i>Variation calculée
                                    </span>
                                    <span id="variation-display" class="text-lg font-bold">
                                        {{ number_format($banque->variation_solde, 2) }} {{ $banque->devise }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Contact responsable -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-user-tie mr-2 text-purple-600"></i>Contact responsable
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="responsable_compte" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-user mr-1"></i>Responsable du compte
                                    </label>
                                    <input type="text" name="responsable_compte" id="responsable_compte" value="{{ old('responsable_compte', $banque->responsable_compte) }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Ahmed Alami">
                                    @error('responsable_compte')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="contact_banque" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-phone mr-1"></i>Contact banque
                                    </label>
                                    <input type="text" name="contact_banque" id="contact_banque" value="{{ old('contact_banque', $banque->contact_banque) }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                                           placeholder="Téléphone, email ou nom du conseiller">
                                    @error('contact_banque')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="bg-gradient-to-r from-gray-50 to-slate-50 p-6 rounded-xl">
                            <h3 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-sticky-note mr-2 text-gray-600"></i>Notes et observations
                            </h3>
                            
                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-comment mr-1"></i>Notes
                                </label>
                                <textarea name="notes" id="notes" rows="4" 
                                          class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-500 focus:border-transparent transition duration-200" 
                                          placeholder="Informations supplémentaires...">{{ old('notes', $banque->notes) }}</textarea>
                                @error('notes')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ route('banques.show', $banque) }}" 
                               class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold rounded-lg transition duration-300 transform hover:scale-105 flex items-center">
                                <i class="fas fa-eye mr-2"></i>Voir les détails
                            </a>
                            <a href="{{ route('banques.index') }}" 
                               class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold rounded-lg transition duration-300 transform hover:scale-105 flex items-center">
                                <i class="fas fa-times mr-2"></i>Annuler
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold rounded-lg transition duration-300 transform hover:scale-105 shadow-lg flex items-center">
                                <i class="fas fa-save mr-2"></i>Mettre à jour le compte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour calculer la variation en temps réel -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const soldeInitial = document.getElementById('solde_initial');
            const soldeActuel = document.getElementById('solde_actuel');
            const variationDisplay = document.getElementById('variation-display');
            const devise = '{{ $banque->devise }}';

            function updateVariation() {
                const initial = parseFloat(soldeInitial.value) || 0;
                const actuel = parseFloat(soldeActuel.value) || 0;
                const variation = actuel - initial;
                
                variationDisplay.textContent = variation.toLocaleString('fr-FR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }) + ' ' + devise;
                
                // Changer la couleur selon le signe
                if (variation > 0) {
                    variationDisplay.className = 'text-lg font-bold text-green-600';
                } else if (variation < 0) {
                    variationDisplay.className = 'text-lg font-bold text-red-600';
                } else {
                    variationDisplay.className = 'text-lg font-bold text-gray-600';
                }
            }

            soldeInitial.addEventListener('input', updateVariation);
            soldeActuel.addEventListener('input', updateVariation);
        });
    </script>
</x-app-layout>
