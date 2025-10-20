<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-university mr-2"></i>{{ __('Nouveau Compte Bancaire') }}
            </h2>
            <a href="{{ route('banques.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-300 transform hover:scale-105">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('banques.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Informations de la banque -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-university mr-2 text-blue-600"></i>Informations de la banque
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nom_banque" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-building mr-1"></i>Nom de la banque *
                                    </label>
                                    <input type="text" name="nom_banque" id="nom_banque" value="{{ old('nom_banque') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: BMCE Bank" required>
                                    @error('nom_banque')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="numero_compte" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-hashtag mr-1"></i>Numéro de compte *
                                    </label>
                                    <input type="text" name="numero_compte" id="numero_compte" value="{{ old('numero_compte') }}" 
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
                                        <option value="Courant" {{ old('type_compte') === 'Courant' ? 'selected' : '' }}>Courant</option>
                                        <option value="Épargne" {{ old('type_compte') === 'Épargne' ? 'selected' : '' }}>Épargne</option>
                                        <option value="Projet" {{ old('type_compte') === 'Projet' ? 'selected' : '' }}>Projet</option>
                                        <option value="Investissement" {{ old('type_compte') === 'Investissement' ? 'selected' : '' }}>Investissement</option>
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
                                        <option value="FCFA" {{ old('devise') === 'FCFA' ? 'selected' : '' }}>FCFA</option>
                                        <option value="MAD" {{ old('devise') === 'MAD' ? 'selected' : '' }}>MAD (Dirham)</option>
                                        <option value="USD" {{ old('devise') === 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="EUR" {{ old('devise') === 'EUR' ? 'selected' : '' }}>EUR</option>
                                    </select>
                                    @error('devise')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="solde_initial" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-dollar-sign mr-1"></i>Solde initial *
                                    </label>
                                    <input type="number" name="solde_initial" id="solde_initial" value="{{ old('solde_initial') }}" 
                                           step="0.01" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="0.00" required>
                                    @error('solde_initial')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-toggle-on mr-1"></i>Statut *
                                    </label>
                                    <select name="statut" id="statut" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="Actif" {{ old('statut') === 'Actif' ? 'selected' : '' }}>Actif</option>
                                        <option value="Fermé" {{ old('statut') === 'Fermé' ? 'selected' : '' }}>Fermé</option>
                                        <option value="Suspendu" {{ old('statut') === 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                                    </select>
                                    @error('statut')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="adresse_banque" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-map-marker-alt mr-1"></i>Adresse de la banque
                                    </label>
                                    <textarea name="adresse_banque" id="adresse_banque" rows="3" 
                                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                              placeholder="Adresse complète de la banque...">{{ old('adresse_banque') }}</textarea>
                                    @error('adresse_banque')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact responsable -->
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-user-tie mr-2 text-green-600"></i>Contact responsable
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="responsable_compte" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-user mr-1"></i>Responsable du compte
                                    </label>
                                    <input type="text" name="responsable_compte" id="responsable_compte" value="{{ old('responsable_compte') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Ahmed Alami">
                                    @error('responsable_compte')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="contact_banque" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-phone mr-1"></i>Contact banque
                                    </label>
                                    <input type="text" name="contact_banque" id="contact_banque" value="{{ old('contact_banque') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="Téléphone, email ou nom du conseiller">
                                    @error('contact_banque')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-sticky-note mr-1"></i>Notes
                            </label>
                            <textarea name="notes" id="notes" rows="4" 
                                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                      placeholder="Informations supplémentaires...">{{ old('notes') }}</textarea>
                            @error('notes')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ route('banques.index') }}" 
                               class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold rounded-lg transition duration-300 transform hover:scale-105">
                                <i class="fas fa-times mr-2"></i>Annuler
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-save mr-2"></i>Enregistrer le compte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour copier le solde initial vers le solde actuel -->
    <script>
        document.getElementById('solde_initial').addEventListener('input', function() {
            const soldeInitial = this.value;
            // Auto-set the current balance to match initial balance when creating
            // This ensures solde_actuel is automatically set
        });
    </script>
</x-app-layout>
