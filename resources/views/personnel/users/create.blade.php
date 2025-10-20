<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-user-plus mr-3 text-blue-600"></i>
                {{ __('Créer un Nouvel Utilisateur') }}
            </h2>
            <a href="{{ route('users.index') }}" 
               class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="container mx-auto px-4 py-8">
            
            @if($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg animate__animated animate__fadeInUp">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-circle mr-3"></i>
                        <span class="font-semibold">Erreurs de validation :</span>
                    </div>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Formulaire principal -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Informations de connexion -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gradient-to-r from-red-500 to-red-600 p-6">
                                <h3 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-key mr-3"></i>
                                    Informations de Connexion (Obligatoire)
                                </h3>
                                <p class="text-red-100 text-sm mt-1">Ces informations permettront à l'utilisateur de se connecter</p>
                            </div>
                            <div class="p-6 space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Nom complet -->
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                            Nom complet *
                                        </label>
                                        <input type="text" 
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror"
                                               required>
                                        @error('name')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                            Email *
                                        </label>
                                        <input type="email" 
                                               id="email" 
                                               name="email" 
                                               value="{{ old('email') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('email') border-red-500 @enderror"
                                               required>
                                        @error('email')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Mot de passe -->
                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                            Mot de passe *
                                        </label>
                                        <input type="password" 
                                               id="password" 
                                               name="password" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('password') border-red-500 @enderror"
                                               required>
                                        @error('password')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Confirmation mot de passe -->
                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                            Confirmer le mot de passe *
                                        </label>
                                        <input type="password" 
                                               id="password_confirmation" 
                                               name="password_confirmation" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations personnelles -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                                <h3 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-user mr-3"></i>
                                    Informations Personnelles
                                </h3>
                                <p class="text-blue-100 text-sm mt-1">Informations optionnelles pour le profil</p>
                            </div>
                            <div class="p-6 space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Genre -->
                                    <div>
                                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">
                                            Genre
                                        </label>
                                        <select id="gender" 
                                                name="gender"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Masculin</option>
                                            <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Féminin</option>
                                        </select>
                                    </div>

                                    <!-- Date de naissance -->
                                    <div>
                                        <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">
                                            Date de naissance
                                        </label>
                                        <input type="date" 
                                               id="birth_date" 
                                               name="birth_date" 
                                               value="{{ old('birth_date') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    </div>

                                    <!-- Téléphone -->
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                            Téléphone
                                        </label>
                                        <input type="tel" 
                                               id="phone" 
                                               name="phone" 
                                               value="{{ old('phone') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="+33 1 23 45 67 89">
                                    </div>

                                    <!-- Matricule -->
                                    <div>
                                        <label for="matricule" class="block text-sm font-medium text-gray-700 mb-2">
                                            Matricule
                                        </label>
                                        <input type="text" 
                                               id="matricule" 
                                               name="matricule" 
                                               value="{{ old('matricule') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="MAT-001">
                                    </div>
                                </div>

                                <!-- Adresse -->
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                        Adresse
                                    </label>
                                    <textarea id="address" 
                                              name="address" 
                                              rows="3"
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                              placeholder="Adresse complète...">{{ old('address') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Informations professionnelles -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gradient-to-r from-green-500 to-teal-600 p-6">
                                <h3 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-briefcase mr-3"></i>
                                    Informations Professionnelles
                                </h3>
                            </div>
                            <div class="p-6 space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Fonction -->
                                    <div>
                                        <label for="fonction" class="block text-sm font-medium text-gray-700 mb-2">
                                            Fonction
                                        </label>
                                        <input type="text" 
                                               id="fonction" 
                                               name="fonction" 
                                               value="{{ old('fonction') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="Directeur, Chef de projet, etc.">
                                    </div>

                                    <!-- Département -->
                                    <div>
                                        <label for="department" class="block text-sm font-medium text-gray-700 mb-2">
                                            Département
                                        </label>
                                        <input type="text" 
                                               id="department" 
                                               name="department" 
                                               value="{{ old('department') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="RH, IT, Marketing, etc.">
                                    </div>

                                    <!-- Date d'embauche -->
                                    <div>
                                        <label for="hire_date" class="block text-sm font-medium text-gray-700 mb-2">
                                            Date d'embauche
                                        </label>
                                        <input type="date" 
                                               id="hire_date" 
                                               name="hire_date" 
                                               value="{{ old('hire_date') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    </div>

                                    <!-- Type de contrat -->
                                    <div>
                                        <label for="contract_type" class="block text-sm font-medium text-gray-700 mb-2">
                                            Type de contrat
                                        </label>
                                        <select id="contract_type" 
                                                name="contract_type"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="CDI" {{ old('contract_type') == 'CDI' ? 'selected' : '' }}>CDI</option>
                                            <option value="CDD" {{ old('contract_type') == 'CDD' ? 'selected' : '' }}>CDD</option>
                                            <option value="Stage" {{ old('contract_type') == 'Stage' ? 'selected' : '' }}>Stage</option>
                                            <option value="Freelance" {{ old('contract_type') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                            <option value="Consultant" {{ old('contract_type') == 'Consultant' ? 'selected' : '' }}>Consultant</option>
                                        </select>
                                    </div>

                                    <!-- Type de prestation -->
                                    <div>
                                        <label for="prestation_type" class="block text-sm font-medium text-gray-700 mb-2">
                                            Type de prestation
                                        </label>
                                        <input type="text" 
                                               id="prestation_type" 
                                               name="prestation_type" 
                                               value="{{ old('prestation_type') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="Temps plein, Temps partiel, etc.">
                                    </div>

                                    <!-- Entreprise -->
                                    <div>
                                        <label for="entreprise" class="block text-sm font-medium text-gray-700 mb-2">
                                            Entreprise/Organisation
                                        </label>
                                        <input type="text" 
                                               id="entreprise" 
                                               name="entreprise" 
                                               value="{{ old('entreprise') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="Nom de l'entreprise">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar - Rôle et Actions -->
                    <div class="space-y-6">
                        <!-- Assignation de rôle - LE PLUS IMPORTANT -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gradient-to-r from-yellow-500 to-orange-600 p-6">
                                <h3 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-crown mr-3"></i>
                                    Rôle et Permissions
                                </h3>
                                <p class="text-yellow-100 text-sm mt-1">CRITIQUE : Choisir le niveau d'accès</p>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    @foreach($roles as $role)
                                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors
                                            @if($role->name === 'SuperAdmin') border-red-200 hover:border-red-300
                                            @elseif($role->name === 'Admin') border-green-200 hover:border-green-300
                                            @elseif($role->name === 'Editeur') border-blue-200 hover:border-blue-300
                                            @else border-purple-200 hover:border-purple-300
                                            @endif">
                                            <input type="radio" 
                                                   name="role_id" 
                                                   value="{{ $role->id }}" 
                                                   class="mr-3 text-blue-600"
                                                   {{ old('role_id') == $role->id ? 'checked' : '' }}
                                                   required>
                                            <div class="flex-1">
                                                <div class="flex items-center">
                                                    <span class="font-semibold text-gray-900 mr-2">{{ $role->name }}</span>
                                                    @if($role->name === 'SuperAdmin')
                                                        <i class="fas fa-crown text-red-500"></i>
                                                    @elseif($role->name === 'Admin')
                                                        <i class="fas fa-user-shield text-green-500"></i>
                                                    @elseif($role->name === 'Editeur')
                                                        <i class="fas fa-user-edit text-blue-500"></i>
                                                    @else
                                                        <i class="fas fa-user text-purple-500"></i>
                                                    @endif
                                                </div>
                                                <p class="text-sm text-gray-600 mt-1">
                                                    @if($role->name === 'SuperAdmin')
                                                        Accès total et invisible. Peut tout faire sans restriction.
                                                    @elseif($role->name === 'Admin')
                                                        Gestion complète sauf accès aux logs système.
                                                    @elseif($role->name === 'Editeur')
                                                        Peut créer des moniteurs et modifier certaines données.
                                                    @else
                                                        Accès limité aux interfaces basiques (congés, réclamations).
                                                    @endif
                                                </p>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                                @error('role_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="p-6">
                                <div class="space-y-4">
                                    <button type="submit" 
                                            class="w-full inline-flex justify-center items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-lg shadow-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105">
                                        <i class="fas fa-user-plus mr-2"></i>
                                        Créer l'Utilisateur
                                    </button>
                                    
                                    <a href="{{ route('users.index') }}" 
                                       class="w-full inline-flex justify-center items-center px-6 py-3 bg-white text-gray-700 font-medium rounded-lg shadow-lg border border-gray-300 hover:bg-gray-50 transition-all duration-300">
                                        <i class="fas fa-times mr-2"></i>
                                        Annuler
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Aide -->
                        <div class="bg-blue-50 rounded-xl border border-blue-200 p-4">
                            <div class="flex items-start">
                                <i class="fas fa-info-circle text-blue-500 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-blue-900">Information</h4>
                                    <p class="text-sm text-blue-700 mt-1">
                                        L'utilisateur recevra ses identifiants par email et devra changer son mot de passe lors de sa première connexion.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>