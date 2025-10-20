<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-edit mr-3 text-blue-600"></i>
                {{ __('Modifier le Partenaire') }} - {{ $partenaire->nom_organisation }}
            </h2>
            <a href="{{ route('partenaires.show', $partenaire) }}" 
               class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Annuler
            </a>
        </div>
    </x-slot>
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <div class="container mx-auto px-4 py-8">
        <!-- En-tête déplacé dans le header slot ci-dessus -->

        <form action="{{ route('partenaires.update', $partenaire) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Formulaire principal -->
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
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nom de l'organisation -->
                                <div>
                                    <label for="nom_organisation" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nom de l'organisation *
                                    </label>
                                    <input type="text" 
                                           id="nom_organisation" 
                                           name="nom_organisation" 
                                           value="{{ old('nom_organisation', $partenaire->nom_organisation) }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nom_organisation') border-red-500 @enderror"
                                           required>
                                    @error('nom_organisation')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Domaine d'intervention -->
                                <div>
                                    <label for="domaine_intervention" class="block text-sm font-medium text-gray-700 mb-2">
                                        Domaine d'intervention
                                    </label>
                                    <select id="domaine_intervention" 
                                            name="domaine_intervention"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('domaine_intervention') border-red-500 @enderror">
                                        <option value="">-- Sélectionner --</option>
                                        <option value="Education" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Education' ? 'selected' : '' }}>Education</option>
                                        <option value="Santé" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Santé' ? 'selected' : '' }}>Santé</option>
                                        <option value="Environnement" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Environnement' ? 'selected' : '' }}>Environnement</option>
                                        <option value="Développement économique" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Développement économique' ? 'selected' : '' }}>Développement économique</option>
                                        <option value="Droits humains" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Droits humains' ? 'selected' : '' }}>Droits humains</option>
                                        <option value="Aide humanitaire" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Aide humanitaire' ? 'selected' : '' }}>Aide humanitaire</option>
                                        <option value="Culture" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Culture' ? 'selected' : '' }}>Culture</option>
                                        <option value="Sport" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Sport' ? 'selected' : '' }}>Sport</option>
                                        <option value="Autre" {{ old('domaine_intervention', $partenaire->domaine_intervention) == 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                    @error('domaine_intervention')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Type de partenariat -->
                                <div>
                                    <label for="type_partenariat" class="block text-sm font-medium text-gray-700 mb-2">
                                        Type de partenariat
                                    </label>
                                    <select id="type_partenariat" 
                                            name="type_partenariat"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('type_partenariat') border-red-500 @enderror">
                                        <option value="">-- Sélectionner --</option>
                                        <option value="Financier" {{ old('type_partenariat', $partenaire->type_partenariat) == 'Financier' ? 'selected' : '' }}>Financier</option>
                                        <option value="Technique" {{ old('type_partenariat', $partenaire->type_partenariat) == 'Technique' ? 'selected' : '' }}>Technique</option>
                                        <option value="Stratégique" {{ old('type_partenariat', $partenaire->type_partenariat) == 'Stratégique' ? 'selected' : '' }}>Stratégique</option>
                                        <option value="Opérationnel" {{ old('type_partenariat', $partenaire->type_partenariat) == 'Opérationnel' ? 'selected' : '' }}>Opérationnel</option>
                                        <option value="Institutionnel" {{ old('type_partenariat', $partenaire->type_partenariat) == 'Institutionnel' ? 'selected' : '' }}>Institutionnel</option>
                                        <option value="Autre" {{ old('type_partenariat', $partenaire->type_partenariat) == 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                    @error('type_partenariat')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Statut -->
                                <div>
                                    <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">
                                        Statut
                                    </label>
                                    <select id="statut" 
                                            name="statut"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('statut') border-red-500 @enderror">
                                        <option value="">-- Sélectionner --</option>
                                        <option value="actif" {{ old('statut', $partenaire->statut) == 'actif' ? 'selected' : '' }}>Actif</option>
                                        <option value="inactif" {{ old('statut', $partenaire->statut) == 'inactif' ? 'selected' : '' }}>Inactif</option>
                                        <option value="en_attente" {{ old('statut', $partenaire->statut) == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                        <option value="suspendu" {{ old('statut', $partenaire->statut) == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                                    </select>
                                    @error('statut')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Description
                                </label>
                                <textarea id="description" 
                                          name="description" 
                                          rows="4"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('description') border-red-500 @enderror"
                                          placeholder="Description détaillée de l'organisation et de ses activités...">{{ old('description', $partenaire->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Période de partenariat -->
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
                                <!-- Date de début -->
                                <div>
                                    <label for="date_debut_partenariat" class="block text-sm font-medium text-gray-700 mb-2">
                                        Date de début du partenariat
                                    </label>
                                    <input type="date" 
                                           id="date_debut_partenariat" 
                                           name="date_debut_partenariat" 
                                           value="{{ old('date_debut_partenariat', $partenaire->date_debut_partenariat ? \Carbon\Carbon::parse($partenaire->date_debut_partenariat)->format('Y-m-d') : '') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('date_debut_partenariat') border-red-500 @enderror">
                                    @error('date_debut_partenariat')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Date de fin -->
                                <div>
                                    <label for="date_fin_partenariat" class="block text-sm font-medium text-gray-700 mb-2">
                                        Date de fin du partenariat
                                    </label>
                                    <input type="date" 
                                           id="date_fin_partenariat" 
                                           name="date_fin_partenariat" 
                                           value="{{ old('date_fin_partenariat', $partenaire->date_fin_partenariat ? \Carbon\Carbon::parse($partenaire->date_fin_partenariat)->format('Y-m-d') : '') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('date_fin_partenariat') border-red-500 @enderror">
                                    @error('date_fin_partenariat')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <!-- Nom du contact -->
                            <div>
                                <label for="contact_principal" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nom du contact principal
                                </label>
                                <input type="text" 
                                       id="contact_principal" 
                                       name="contact_principal" 
                                       value="{{ old('contact_principal', $partenaire->contact_principal) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('contact_principal') border-red-500 @enderror"
                                       placeholder="Nom et prénom">
                                @error('contact_principal')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', $partenaire->email) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('email') border-red-500 @enderror"
                                       placeholder="contact@organisation.com">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Téléphone -->
                            <div>
                                <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Téléphone
                                </label>
                                <input type="tel" 
                                       id="telephone" 
                                       name="telephone" 
                                       value="{{ old('telephone', $partenaire->telephone) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('telephone') border-red-500 @enderror"
                                       placeholder="+33 1 23 45 67 89">
                                @error('telephone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Adresse -->
                            <div>
                                <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">
                                    Adresse
                                </label>
                                <textarea id="adresse" 
                                          name="adresse" 
                                          rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('adresse') border-red-500 @enderror"
                                          placeholder="Adresse complète...">{{ old('adresse', $partenaire->adresse) }}</textarea>
                                @error('adresse')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="p-6">
                            <div class="space-y-4">
                                <button type="submit" 
                                        class="w-full inline-flex justify-center items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-lg shadow-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Mettre à jour
                                </button>
                                
                                <a href="{{ route('partenaires.show', $partenaire) }}" 
                                   class="w-full inline-flex justify-center items-center px-6 py-3 bg-white text-gray-700 font-medium rounded-lg shadow-lg border border-gray-300 hover:bg-gray-50 transition-all duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Annuler
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
