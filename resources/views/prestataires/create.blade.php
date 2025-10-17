<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nouveau Prestataire') }}
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
                    <form action="{{ route('prestataires.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Informations générales</h3>
                            </div>
                            
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom du prestataire *</label>
                                <input type="text" name="nom" id="nom" value="{{ old('nom') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('nom')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="type_service" class="block text-sm font-medium text-gray-700">Type de service *</label>
                                <input type="text" name="type_service" id="type_service" value="{{ old('type_service') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('type_service')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 mb-4 mt-6">Contact principal</h3>
                            </div>

                            <div>
                                <label for="contact_nom" class="block text-sm font-medium text-gray-700">Nom du contact *</label>
                                <input type="text" name="contact_nom" id="contact_nom" value="{{ old('contact_nom') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('contact_nom')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="contact_telephone" class="block text-sm font-medium text-gray-700">Téléphone *</label>
                                <input type="text" name="contact_telephone" id="contact_telephone" value="{{ old('contact_telephone') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('contact_telephone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="contact_email" class="block text-sm font-medium text-gray-700">Email *</label>
                                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('contact_email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse *</label>
                                <textarea name="adresse" id="adresse" rows="3" 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('adresse') }}</textarea>
                                @error('adresse')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="ville" class="block text-sm font-medium text-gray-700">Ville *</label>
                                <input type="text" name="ville" id="ville" value="{{ old('ville') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('ville')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="pays" class="block text-sm font-medium text-gray-700">Pays *</label>
                                <input type="text" name="pays" id="pays" value="{{ old('pays') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('pays')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="tarif_journalier" class="block text-sm font-medium text-gray-700">Tarif journalier</label>
                                <input type="number" name="tarif_journalier" id="tarif_journalier" value="{{ old('tarif_journalier') }}" step="0.01" min="0"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('tarif_journalier')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="devise" class="block text-sm font-medium text-gray-700">Devise</label>
                                <select name="devise" id="devise" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Sélectionner...</option>
                                    <option value="FCFA" {{ old('devise') === 'FCFA' ? 'selected' : '' }}>FCFA</option>
                                    <option value="USD" {{ old('devise') === 'USD' ? 'selected' : '' }}>USD</option>
                                    <option value="EUR" {{ old('devise') === 'EUR' ? 'selected' : '' }}>EUR</option>
                                </select>
                                @error('devise')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="statut" class="block text-sm font-medium text-gray-700">Statut *</label>
                                <select name="statut" id="statut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="Actif" {{ old('statut') === 'Actif' ? 'selected' : '' }}>Actif</option>
                                    <option value="Inactif" {{ old('statut') === 'Inactif' ? 'selected' : '' }}>Inactif</option>
                                    <option value="Suspendu" {{ old('statut') === 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                                </select>
                                @error('statut')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="specialite" class="block text-sm font-medium text-gray-700">Spécialité</label>
                                <textarea name="specialite" id="specialite" rows="3" 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('specialite') }}</textarea>
                                @error('specialite')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                                <textarea name="notes" id="notes" rows="3" 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes') }}</textarea>
                                @error('notes')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('prestataires.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Annuler
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
