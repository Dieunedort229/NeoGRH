<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-user mr-3 text-blue-600"></i>
                {{ __('Détails Utilisateur') }} - {{ $user->name }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('users.edit', $user) }}" 
                   class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Modifier
                </a>
                <a href="{{ route('users.index') }}" 
                   class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="container mx-auto px-4 py-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Informations principales -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Informations personnelles -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-user mr-3"></i>
                                Informations Personnelles
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                                    <p class="text-lg font-semibold text-gray-900">{{ $user->name }}</p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <p class="text-lg text-gray-900">{{ $user->email }}</p>
                                </div>
                                @if($user->phone)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                                    <p class="text-lg text-gray-900">{{ $user->phone }}</p>
                                </div>
                                @endif
                                @if($user->gender)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                                    <p class="text-lg text-gray-900">{{ $user->gender == 'M' ? 'Masculin' : 'Féminin' }}</p>
                                </div>
                                @endif
                            </div>
                            
                            @if($user->address)
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                                <p class="text-gray-900">{{ $user->address }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Informations professionnelles -->
                    @if($user->fonction || $user->department || $user->entreprise)
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-500 to-teal-600 p-6">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-briefcase mr-3"></i>
                                Informations Professionnelles
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if($user->fonction)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Fonction</label>
                                    <p class="text-lg text-gray-900">{{ $user->fonction }}</p>
                                </div>
                                @endif
                                @if($user->department)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Département</label>
                                    <p class="text-lg text-gray-900">{{ $user->department }}</p>
                                </div>
                                @endif
                                @if($user->matricule)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Matricule</label>
                                    <p class="text-lg text-gray-900">{{ $user->matricule }}</p>
                                </div>
                                @endif
                                @if($user->entreprise)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Entreprise</label>
                                    <p class="text-lg text-gray-900">{{ $user->entreprise }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Rôles et permissions -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-yellow-500 to-orange-600 p-6">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-crown mr-3"></i>
                                Rôle et Permissions
                            </h3>
                        </div>
                        <div class="p-6">
                            @foreach($user->roles as $role)
                                <div class="flex items-center p-3 rounded-lg
                                    @if($role->name === 'SuperAdmin') bg-red-50 border border-red-200
                                    @elseif($role->name === 'Admin') bg-green-50 border border-green-200
                                    @elseif($role->name === 'Editeur') bg-blue-50 border border-blue-200
                                    @else bg-purple-50 border border-purple-200
                                    @endif">
                                    @if($role->name === 'SuperAdmin')
                                        <i class="fas fa-crown text-red-500 mr-3"></i>
                                    @elseif($role->name === 'Admin')
                                        <i class="fas fa-user-shield text-green-500 mr-3"></i>
                                    @elseif($role->name === 'Editeur')
                                        <i class="fas fa-user-edit text-blue-500 mr-3"></i>
                                    @else
                                        <i class="fas fa-user text-purple-500 mr-3"></i>
                                    @endif
                                    <div>
                                        <span class="font-semibold">{{ $role->name }}</span>
                                        <p class="text-sm text-gray-600">
                                            @if($role->name === 'SuperAdmin') Accès total et invisible
                                            @elseif($role->name === 'Admin') Gestion complète
                                            @elseif($role->name === 'Editeur') Création et modification
                                            @else Accès limité
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Informations système -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-gray-500 to-gray-600 p-6">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-cog mr-3"></i>
                                Informations Système
                            </h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">ID Utilisateur</span>
                                <span class="font-mono text-sm">{{ $user->id }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Créé le</span>
                                <span>{{ $user->created_at->format('d/m/Y à H:i') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Modifié le</span>
                                <span>{{ $user->updated_at->format('d/m/Y à H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>