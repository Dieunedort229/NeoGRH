<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails Personnel') }} - {{ $personnel->nom_complet }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('personnel.edit', $personnel) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </a>
                <a href="{{ route('personnel.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Retour à la liste
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Informations personnelles -->
                        <div class="col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informations personnelles</h3>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Matricule</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->matricule }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Nom complet</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->nom_complet }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->email }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Téléphone</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->telephone }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Date de naissance</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->date_naissance?->format('d/m/Y') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Sexe</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->sexe === 'M' ? 'Masculin' : 'Féminin' }}</p>
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-500">Adresse</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->adresse }}</p>
                        </div>

                        <!-- Informations professionnelles -->
                        <div class="col-span-2 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informations professionnelles</h3>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Poste</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->poste }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Département</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->departement }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Date d'embauche</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->date_embauche?->format('d/m/Y') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Ancienneté</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->anciennete }} an(s)</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Type de contrat</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->type_contrat }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Salaire</label>
                            <p class="mt-1 text-sm text-gray-900">{{ number_format($personnel->salaire, 2) }} FCFA</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Statut</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $personnel->statut === 'Actif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $personnel->statut ?? 'Actif' }}
                            </span>
                        </div>

                        @if($personnel->numero_cnss)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Numéro CNSS</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->numero_cnss }}</p>
                        </div>
                        @endif

                        @if($personnel->notes)
                        <div class="col-span-2 mt-6">
                            <label class="block text-sm font-medium text-gray-500">Notes</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $personnel->notes }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex justify-between">
                            <div class="text-sm text-gray-500">
                                Créé le {{ $personnel->created_at?->format('d/m/Y à H:i') }}<br>
                                @if($personnel->updated_at && $personnel->updated_at != $personnel->created_at)
                                    Modifié le {{ $personnel->updated_at?->format('d/m/Y à H:i') }}
                                @endif
                            </div>
                            <div class="space-x-2">
                                <a href="{{ route('personnel.edit', $personnel) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Modifier
                                </a>
                                <form action="{{ route('personnel.destroy', $personnel) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" 
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce personnel ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>