<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modifier Prestataire') }}
            </h2>
            <a href="{{ route('prestataires.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('prestataires.update', $prestataire) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Informations générales</h3>
                            </div>
                            
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom *</label>
                                <input type="text" name="nom" id="nom" value="{{ old('nom', $prestataire->nom) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('nom')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $prestataire->prenom) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('prenom')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="entreprise" class="block text-sm font-medium text-gray-700">Entreprise</label>
                                <input type="text" name="entreprise" id="entreprise" value="{{ old('entreprise', $prestataire->entreprise) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('entreprise')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $prestataire->email) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $prestataire->telephone) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('telephone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="specialite" class="block text-sm font-medium text-gray-700">Spécialité *</label>
                                <input type="text" name="specialite" id="specialite" value="{{ old('specialite', $prestataire->specialite) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('specialite')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="type_prestation" class="block text-sm font-medium text-gray-700">Type de prestation *</label>
                                <select name="type_prestation" id="type_prestation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="Consultant" {{ old('type_prestation', $prestataire->type_prestation) === 'Consultant' ? 'selected' : '' }}>Consultant</option>
                                    <option value="Fournisseur" {{ old('type_prestation', $prestataire->type_prestation) === 'Fournisseur' ? 'selected' : '' }}>Fournisseur</option>
                                    <option value="Service" {{ old('type_prestation', $prestataire->type_prestation) === 'Service' ? 'selected' : '' }}>Service</option>
                                </select>
                                @error('type_prestation')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="tarif_journalier" class="block text-sm font-medium text-gray-700">Tarif journalier (€)</label>
                                <input type="number" name="tarif_journalier" id="tarif_journalier" value="{{ old('tarif_journalier', $prestataire->tarif_journalier) }}" step="0.01" min="0"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('tarif_journalier')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="statut" class="block text-sm font-medium text-gray-700">Statut *</label>
                                <select name="statut" id="statut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="Actif" {{ old('statut', $prestataire->statut) === 'Actif' ? 'selected' : '' }}>Actif</option>
                                    <option value="Inactif" {{ old('statut', $prestataire->statut) === 'Inactif' ? 'selected' : '' }}>Inactif</option>
                                    <option value="Blacklisté" {{ old('statut', $prestataire->statut) === 'Blacklisté' ? 'selected' : '' }}>Blacklisté</option>
                                </select>
                                @error('statut')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="date_debut_collaboration" class="block text-sm font-medium text-gray-700">Date début collaboration</label>
                                <input type="date" name="date_debut_collaboration" id="date_debut_collaboration" value="{{ old('date_debut_collaboration', $prestataire->date_debut_collaboration?->format('Y-m-d')) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('date_debut_collaboration')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                                <textarea name="adresse" id="adresse" rows="3" 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('adresse', $prestataire->adresse) }}</textarea>
                                @error('adresse')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="competences" class="block text-sm font-medium text-gray-700">Compétences</label>
                                <textarea name="competences" id="competences" rows="3" 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('competences', $prestataire->competences) }}</textarea>
                                @error('competences')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                                <textarea name="notes" id="notes" rows="3" 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes', $prestataire->notes) }}</textarea>
                                @error('notes')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('prestataires.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Annuler
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Modifier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
