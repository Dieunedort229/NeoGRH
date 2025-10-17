<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-handshake mr-2"></i>{{ __('Nouveau Partenaire') }}
            </h2>
            <a href="{{ route('partenaires.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-300 transform hover:scale-105">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('partenaires.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Informations générales -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-blue-600"></i>Informations générales
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="col-span-2">
                                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-building mr-1"></i>Nom du partenaire *
                                    </label>
                                    <input type="text" name="nom" id="nom" value="{{ old('nom') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Fondation Mohammed V" required>
                                    @error('nom')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="type_partenaire" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-tags mr-1"></i>Type de partenaire *
                                    </label>
                                    <select name="type_partenaire" id="type_partenaire" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="Bailleur" {{ old('type_partenaire') === 'Bailleur' ? 'selected' : '' }}>Bailleur</option>
                                        <option value="Partenaire technique" {{ old('type_partenaire') === 'Partenaire technique' ? 'selected' : '' }}>Partenaire technique</option>
                                        <option value="Gouvernement" {{ old('type_partenaire') === 'Gouvernement' ? 'selected' : '' }}>Gouvernement</option>
                                        <option value="ONG" {{ old('type_partenaire') === 'ONG' ? 'selected' : '' }}>ONG</option>
                                        <option value="Entreprise privée" {{ old('type_partenaire') === 'Entreprise privée' ? 'selected' : '' }}>Entreprise privée</option>
                                        <option value="Autre" {{ old('type_partenaire') === 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                    @error('type_partenaire')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="secteur_activite" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-industry mr-1"></i>Secteur d'activité
                                    </label>
                                    <input type="text" name="secteur_activite" id="secteur_activite" value="{{ old('secteur_activite') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Développement social">
                                    @error('secteur_activite')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="site_web" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-globe mr-1"></i>Site web
                                    </label>
                                    <input type="url" name="site_web" id="site_web" value="{{ old('site_web') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="https://www.partenaire.com">
                                    @error('site_web')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-toggle-on mr-1"></i>Statut *
                                    </label>
                                    <select name="statut" id="statut" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="Actif" {{ old('statut') === 'Actif' ? 'selected' : '' }}>Actif</option>
                                        <option value="Inactif" {{ old('statut') === 'Inactif' ? 'selected' : '' }}>Inactif</option>
                                        <option value="Suspendu" {{ old('statut') === 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                                        <option value="Terminé" {{ old('statut') === 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                    </select>
                                    @error('statut')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact principal -->
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-user-tie mr-2 text-green-600"></i>Contact principal
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="contact_nom" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-user mr-1"></i>Nom du contact *
                                    </label>
                                    <input type="text" name="contact_nom" id="contact_nom" value="{{ old('contact_nom') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Mme Fatima Zahra" required>
                                    @error('contact_nom')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="contact_telephone" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-phone mr-1"></i>Téléphone *
                                    </label>
                                    <input type="text" name="contact_telephone" id="contact_telephone" value="{{ old('contact_telephone') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="+212 6 XX XX XX XX" required>
                                    @error('contact_telephone')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-envelope mr-1"></i>Email *
                                    </label>
                                    <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="contact@partenaire.com" required>
                                    @error('contact_email')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Localisation -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-purple-600"></i>Localisation
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="col-span-2">
                                    <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-address-card mr-1"></i>Adresse *
                                    </label>
                                    <textarea name="adresse" id="adresse" rows="3" 
                                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                                              placeholder="Adresse complète..." required>{{ old('adresse') }}</textarea>
                                    @error('adresse')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="ville" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-city mr-1"></i>Ville *
                                    </label>
                                    <input type="text" name="ville" id="ville" value="{{ old('ville') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Rabat" required>
                                    @error('ville')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="pays" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-flag mr-1"></i>Pays *
                                    </label>
                                    <input type="text" name="pays" id="pays" value="{{ old('pays') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Maroc" required>
                                    @error('pays')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Partenariat -->
                        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-yellow-600"></i>Informations partenariat
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="date_partenariat" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-calendar-plus mr-1"></i>Date début partenariat *
                                    </label>
                                    <input type="date" name="date_partenariat" id="date_partenariat" value="{{ old('date_partenariat') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200" required>
                                    @error('date_partenariat')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="type_collaboration" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-handshake mr-1"></i>Type de collaboration
                                    </label>
                                    <input type="text" name="type_collaboration" id="type_collaboration" value="{{ old('type_collaboration') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Financement, Expertise technique">
                                    @error('type_collaboration')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="budget_alloue" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-dollar-sign mr-1"></i>Budget alloué
                                    </label>
                                    <input type="number" name="budget_alloue" id="budget_alloue" value="{{ old('budget_alloue') }}" 
                                           step="0.01" min="0"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200" 
                                           placeholder="0.00">
                                    @error('budget_alloue')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="devise" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-coins mr-1"></i>Devise
                                    </label>
                                    <select name="devise" id="devise" 
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200">
                                        <option value="">Sélectionner...</option>
                                        <option value="MAD" {{ old('devise') === 'MAD' ? 'selected' : '' }}>MAD (Dirham)</option>
                                        <option value="FCFA" {{ old('devise') === 'FCFA' ? 'selected' : '' }}>FCFA</option>
                                        <option value="USD" {{ old('devise') === 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="EUR" {{ old('devise') === 'EUR' ? 'selected' : '' }}>EUR</option>
                                    </select>
                                    @error('devise')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
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
                                      placeholder="Informations supplémentaires sur le partenariat...">{{ old('notes') }}</textarea>
                            @error('notes')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ route('partenaires.index') }}" 
                               class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold rounded-lg transition duration-300 transform hover:scale-105">
                                <i class="fas fa-times mr-2"></i>Annuler
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-handshake mr-2"></i>Créer le partenariat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
