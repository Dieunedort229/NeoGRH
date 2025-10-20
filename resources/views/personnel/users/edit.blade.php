<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-user-edit mr-3 text-blue-600"></i>
                {{ __('Modifier Utilisateur') }} - {{ $user->name }}
            </h2>
            <a href="{{ route('users.show', $user) }}" 
               class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Annuler
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="container mx-auto px-4 py-8">
            
            @if($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Formulaire principal -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Informations de base -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                                <h3 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-user mr-3"></i>
                                    Informations de Base
                                </h3>
                            </div>
                            <div class="p-6 space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom complet *</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    </div>
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                                        <select id="gender" name="gender" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="M" {{ old('gender', $user->gender) == 'M' ? 'selected' : '' }}>Masculin</option>
                                            <option value="F" {{ old('gender', $user->gender) == 'F' ? 'selected' : '' }}>Féminin</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                                    <textarea id="address" name="address" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('address', $user->address) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gradient-to-r from-red-500 to-red-600 p-6">
                                <h3 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-key mr-3"></i>
                                    Changer le Mot de Passe
                                </h3>
                                <p class="text-red-100 text-sm mt-1">Laisser vide pour conserver le mot de passe actuel</p>
                            </div>
                            <div class="p-6 space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Nouveau mot de passe</label>
                                        <input type="password" id="password" name="password" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Rôle -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gradient-to-r from-yellow-500 to-orange-600 p-6">
                                <h3 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-crown mr-3"></i>
                                    Rôle
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="space-y-3">
                                    @foreach($roles as $role)
                                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                                            <input type="radio" name="role_id" value="{{ $role->id }}" 
                                                   {{ old('role_id', $user->roles->first()?->id) == $role->id ? 'checked' : '' }}
                                                   class="mr-3" required>
                                            <div>
                                                <span class="font-semibold">{{ $role->name }}</span>
                                                <p class="text-sm text-gray-600">
                                                    @if($role->name === 'SuperAdmin') Accès total
                                                    @elseif($role->name === 'Admin') Gestion complète
                                                    @elseif($role->name === 'Editeur') Création et modification
                                                    @else Accès limité
                                                    @endif
                                                </p>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="p-6">
                                <div class="space-y-4">
                                    <button type="submit" 
                                            class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium py-3 px-6 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all">
                                        <i class="fas fa-save mr-2"></i>
                                        Mettre à jour
                                    </button>
                                    <a href="{{ route('users.show', $user) }}"
                                       class="w-full block text-center bg-gray-500 text-white font-medium py-3 px-6 rounded-lg hover:bg-gray-600 transition-all">
                                        <i class="fas fa-times mr-2"></i>
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