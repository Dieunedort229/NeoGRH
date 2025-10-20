<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modifier Projet') }} - {{ $projet->nom }}
            </h2>
            <a href="{{ route('projets.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('projets.update', $projet) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom du projet *</label>
                                <input type="text" name="nom" id="nom" value="{{ old('nom', $projet->nom) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('nom')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                                <textarea name="description" id="description" rows="4" 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('description', $projet->description) }}</textarea>
                                @error('description')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="budget_total" class="block text-sm font-medium text-gray-700">Budget total *</label>
                                <input type="number" name="budget_total" id="budget_total" value="{{ old('budget_total', $projet->budget_total) }}" step="0.01" min="0"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('budget_total')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="budget_utilise" class="block text-sm font-medium text-gray-700">Budget utilisé</label>
                                <input type="number" name="budget_utilise" id="budget_utilise" value="{{ old('budget_utilise', $projet->budget_utilise) }}" step="0.01" min="0"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('budget_utilise')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de début *</label>
                                <input type="date" name="date_debut" id="date_debut" value="{{ old('date_debut', $projet->date_debut?->format('Y-m-d')) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('date_debut')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de fin</label>
                                <input type="date" name="date_fin" id="date_fin" value="{{ old('date_fin', $projet->date_fin?->format('Y-m-d')) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('date_fin')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="statut" class="block text-sm font-medium text-gray-700">Statut *</label>
                                <select name="statut" id="statut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="Planifié" {{ old('statut', $projet->statut) === 'Planifié' ? 'selected' : '' }}>Planifié</option>
                                    <option value="En cours" {{ old('statut', $projet->statut) === 'En cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="Terminé" {{ old('statut', $projet->statut) === 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                    <option value="Suspendu" {{ old('statut', $projet->statut) === 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                                </select>
                                @error('statut')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="responsable" class="block text-sm font-medium text-gray-700">Responsable *</label>
                                <input type="text" name="responsable" id="responsable" value="{{ old('responsable', $projet->responsable) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('responsable')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="bailleur" class="block text-sm font-medium text-gray-700">Bailleur</label>
                                <input type="text" name="bailleur" id="bailleur" value="{{ old('bailleur', $projet->bailleur) }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('bailleur')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-2">
                                <label for="objectifs" class="block text-sm font-medium text-gray-700">Objectifs</label>
                                <textarea name="objectifs" id="objectifs" rows="3" 
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('objectifs', $projet->objectifs) }}</textarea>
                                @error('objectifs')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('projets.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Annuler
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>