<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-handshake mr-3 text-purple-600"></i>
                {{ __('Gestion des Partenaires') }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('partenaires.create') }}" 
                   class="group relative bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-plus mr-2 group-hover:animate-bounce"></i>
                    Nouveau Partenaire
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

    <div class="py-12 bg-gradient-to-br from-purple-50 via-white to-pink-50 min-h-screen">
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
                <div class="p-8 text-gray-900">
                    <div class="overflow-x-auto rounded-xl">
                        <table class="min-w-full table-auto shadow-lg rounded-xl overflow-hidden">
                            <thead class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                        <i class="fas fa-handshake mr-2"></i>Partenaire
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                        <i class="fas fa-tag mr-2"></i>Type
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                        <i class="fas fa-phone mr-2"></i>Contact
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                        <i class="fas fa-map-marker-alt mr-2"></i>Localisation
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                        <i class="fas fa-info-circle mr-2"></i>Statut
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                        <i class="fas fa-cogs mr-2"></i>Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($partenaires as $partenaire)
                                    <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 transform hover:scale-[1.01] animate__animated animate__fadeInUp">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                                                        <i class="fas fa-handshake text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $partenaire->nom }}</div>
                                                    @if($partenaire->secteur_activite)
                                                        <div class="text-sm text-gray-500">{{ $partenaire->secteur_activite }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $partenaire->type_partenaire }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $partenaire->contact_nom }}</div>
                                            <div class="text-sm text-gray-500">{{ $partenaire->contact_email }}</div>
                                            <div class="text-sm text-gray-500">{{ $partenaire->contact_telephone }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <div>{{ $partenaire->ville }}</div>
                                            <div class="text-gray-500">{{ $partenaire->pays }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $partenaire->statut === 'Actif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $partenaire->statut }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('partenaires.show', $partenaire) }}" class="text-indigo-600 hover:text-indigo-900 transition duration-200">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('partenaires.edit', $partenaire) }}" class="text-yellow-600 hover:text-yellow-900 transition duration-200">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('partenaires.destroy', $partenaire) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 transition duration-200" 
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <i class="fas fa-handshake text-4xl text-gray-300 mb-4"></i>
                                                <p class="text-lg mb-2">Aucun partenaire trouvé</p>
                                                <a href="{{ route('partenaires.create') }}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                                    <i class="fas fa-plus mr-1"></i>Ajouter le premier partenaire
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($partenaires->hasPages())
                        <div class="mt-6">
                            {{ $partenaires->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>