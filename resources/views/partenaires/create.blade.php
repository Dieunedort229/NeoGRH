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
                                    <label for="nom_organisation" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-building mr-1"></i>Nom de l'organisation *
                                    </label>
                                    <input type="text" name="nom_organisation" id="nom_organisation" value="{{ old('nom_organisation') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Fondation Mohammed V" required>
                                    @error('nom_organisation')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
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
                                        <option value="Partenaire local" {{ old('type_partenaire') === 'Partenaire local' ? 'selected' : '' }}>Partenaire local</option>
                                        <option value="Gouvernement" {{ old('type_partenaire') === 'Gouvernement' ? 'selected' : '' }}>Gouvernement</option>
                                    </select>
                                    @error('type_partenaire')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
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
                                        <option value="En négociation" {{ old('statut') === 'En négociation' ? 'selected' : '' }}>En négociation</option>
                                    </select>
                                    @error('statut')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="site_web" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-globe mr-1"></i>Site web
                                    </label>
                                    <input type="url" name="site_web" id="site_web" value="{{ old('site_web') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                           placeholder="https://www.organisation.org">
                                    @error('site_web')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="domaine_intervention" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-list mr-1"></i>Domaine d'intervention
                                    </label>
                                    <textarea name="domaine_intervention" id="domaine_intervention" rows="3" 
                                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                              placeholder="Décrivez les domaines d'intervention de l'organisation...">{{ old('domaine_intervention') }}</textarea>
                                    @error('domaine_intervention')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact principal -->
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-user-tie mr-2 text-green-600"></i>Contact principal
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="contact_principal" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-user mr-1"></i>Nom du contact
                                    </label>
                                    <input type="text" name="contact_principal" id="contact_principal" value="{{ old('contact_principal') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="Ex: Ahmed Alami">
                                    @error('contact_principal')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-phone mr-1"></i>Téléphone
                                    </label>
                                    <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="+212 6 XX XX XX XX">
                                    @error('telephone')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-envelope mr-1"></i>Email
                                    </label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" 
                                           placeholder="contact@organisation.org">
                                    @error('email')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Adresse -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-purple-600"></i>Adresse
                            </h3>
                            
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-home mr-1"></i>Adresse complète
                                    </label>
                                    <textarea name="adresse" id="adresse" rows="3" 
                                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                                              placeholder="Adresse complète de l'organisation...">{{ old('adresse') }}</textarea>
                                    @error('adresse')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Partenariat -->
                        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-yellow-600"></i>Informations de partenariat
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="date_debut_partenariat" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-calendar-plus mr-1"></i>Date début partenariat
                                    </label>
                                    <input type="date" name="date_debut_partenariat" id="date_debut_partenariat" value="{{ old('date_debut_partenariat') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200">
                                    @error('date_debut_partenariat')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="date_fin_partenariat" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-calendar-minus mr-1"></i>Date fin partenariat
                                    </label>
                                    <input type="date" name="date_fin_partenariat" id="date_fin_partenariat" value="{{ old('date_fin_partenariat') }}" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200">
                                    @error('date_fin_partenariat')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="accords_signes" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-file-signature mr-1"></i>Accords signés
                                    </label>
                                    <textarea name="accords_signes" id="accords_signes" rows="3" 
                                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200" 
                                              placeholder="Décrivez les accords ou conventions signés...">{{ old('accords_signes') }}</textarea>
                                    @error('accords_signes')<span class="text-red-500 text-sm mt-1 block"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>@enderror
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
                            <a href="{{ route('partenaires.index') }}" 
                               class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold rounded-lg transition duration-300 transform hover:scale-105">
                                <i class="fas fa-times mr-2"></i>Annuler
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-save mr-2"></i>Enregistrer le partenaire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
