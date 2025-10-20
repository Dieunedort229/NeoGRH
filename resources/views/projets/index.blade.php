<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-project-diagram mr-3 text-green-600"></i>
                {{ __('Gestion des Projets') }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('projets.create') }}" 
                   class="group relative bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-plus-circle mr-2 group-hover:animate-bounce"></i>
                    Nouveau Projet
                    <div class="absolute inset-0 bg-white opacity-20 rounded-xl transform scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                </a>
                <a href="{{ route('dashboard') }}" 
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-xl transition-all duration-300 flex items-center">
                    <i class="fas fa-home mr-2"></i>
                    Accueil
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-green-50 via-white to-teal-50 min-h-screen">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-gradient-to-r from-green-400 to-green-500 text-white px-6 py-4 rounded-xl mb-6 shadow-lg animate__animated animate__fadeInDown">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3 text-xl"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-2xl rounded-2xl border border-gray-100 animate__animated animate__fadeInUp">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du Projet</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Budget</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisation</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Période</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($projets as $projet)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $projet->nom }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($projet->description, 50) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ number_format($projet->budget_total, 2) }} FCFA</div>
                                            <div class="text-sm text-gray-500">Responsable: {{ $projet->responsable }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ number_format($projet->budget_utilise ?? 0, 2) }} FCFA</div>
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $projet->pourcentage_utilise }}%"></div>
                                            </div>
                                            <div class="text-xs text-gray-500">{{ $projet->pourcentage_utilise }}%</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <div>{{ $projet->date_debut?->format('d/m/Y') }}</div>
                                            @if($projet->date_fin)
                                                <div class="text-gray-500">au {{ $projet->date_fin->format('d/m/Y') }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'Planifié' => 'bg-yellow-100 text-yellow-800',
                                                    'En cours' => 'bg-blue-100 text-blue-800',
                                                    'Terminé' => 'bg-green-100 text-green-800',
                                                    'Suspendu' => 'bg-red-100 text-red-800'
                                                ];
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$projet->statut] ?? 'bg-gray-100 text-gray-800' }}">
                                                {{ $projet->statut }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('projets.show', $projet) }}" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('projets.edit', $projet) }}" class="text-yellow-600 hover:text-yellow-900 mr-3" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('projets.destroy', $projet) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')"
                                                        title="Supprimer">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            Aucun projet trouvé. <a href="{{ route('projets.create') }}" class="text-blue-500">Créer le premier projet</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($projets->hasPages())
                        <div class="mt-4">
                            {{ $projets->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>