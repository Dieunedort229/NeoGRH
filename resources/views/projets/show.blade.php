<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails Projet') }} - {{ $projet->nom }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('projets.edit', $projet) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </a>
                <a href="{{ route('projets.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
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
                        <!-- Informations générales -->
                        <div class="col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informations générales</h3>
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-500">Description</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $projet->description }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Responsable</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $projet->responsable }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Statut</label>
                            @php
                                $statusColors = [
                                    'Planifié' => 'bg-yellow-100 text-yellow-800',
                                    'En cours' => 'bg-blue-100 text-blue-800',
                                    'Terminé' => 'bg-green-100 text-green-800',
                                    'Suspendu' => 'bg-red-100 text-red-800'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$projet->statut] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $projet->statut }}
                            </span>
                        </div>

                        <!-- Budget et finances -->
                        <div class="col-span-2 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Budget et finances</h3>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Budget total</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900">{{ number_format($projet->budget_total, 2) }} FCFA</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Budget utilisé</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900">{{ number_format($projet->budget_utilise ?? 0, 2) }} FCFA</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Budget restant</label>
                            <p class="mt-1 text-lg font-semibold text-green-600">{{ number_format($projet->budget_restant, 2) }} FCFA</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Pourcentage utilisé</label>
                            <div class="mt-1">
                                <div class="flex items-center">
                                    <div class="w-full bg-gray-200 rounded-full h-2 mr-2">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $projet->pourcentage_utilise }}%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $projet->pourcentage_utilise }}%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Informations temporelles -->
                        <div class="col-span-2 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Calendrier</h3>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Date de début</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $projet->date_debut?->format('d/m/Y') }}</p>
                        </div>

                        @if($projet->date_fin)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Date de fin</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $projet->date_fin->format('d/m/Y') }}</p>
                        </div>
                        @endif

                        <!-- Autres informations -->
                        <div class="col-span-2 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Autres informations</h3>
                        </div>

                        @if($projet->bailleur)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Bailleur</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $projet->bailleur }}</p>
                        </div>
                        @endif



                        @if($projet->objectifs)
                        <div class="col-span-2 mt-4">
                            <label class="block text-sm font-medium text-gray-500">Objectifs</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $projet->objectifs }}</p>
                        </div>
                        @endif


                    </div>

                    <!-- Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex justify-between">
                            <div class="text-sm text-gray-500">
                                Créé le {{ $projet->created_at?->format('d/m/Y à H:i') }}<br>
                                @if($projet->updated_at && $projet->updated_at != $projet->created_at)
                                    Modifié le {{ $projet->updated_at?->format('d/m/Y à H:i') }}
                                @endif
                            </div>
                            <div class="space-x-2">
                                <a href="{{ route('projets.edit', $projet) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Modifier
                                </a>
                                <form action="{{ route('projets.destroy', $projet) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" 
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
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