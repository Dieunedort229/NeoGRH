<x-guest-layout>
    <form method="POST" action="{{ route('admin.register.store') }}" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ __('Inscription') }}</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">{{ __('Créez votre compte NeoGRH') }}</p>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Informations personnelles supplémentaires -->

        <!-- Adresse -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Adresse')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Téléphone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Téléphone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Informations professionnelles -->
        <div class="mt-4">
            <x-input-label for="fonction" :value="__('Fonction')" />
            <select id="fonction" name="fonction" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1 w-full" onchange="showFields()">
                <option value="">--Sélectionner--</option>
                <option value="Personnel">Personnel</option>
                <option value="Prestataire">Prestataire</option>
                <option value="Partenaire">Partenaire</option>
            </select>
            <x-input-error :messages="$errors->get('fonction')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="gender" :value="__('Sexe')" />
            <select id="gender" name="gender" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1 w-full">
                <option value="">--Sélectionner--</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

         <!-- Date de naissance -->
        <div id="fields-dob" class="mt-4">
            <x-input-label for="birth_date" :value="__('Date de naissance')" />
            <div class="flex space-x-2">
                <select id="birth_date_day" name="birth_date_day" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Jour</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}" {{ old('birth_date_day') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <select id="birth_date_month" name="birth_date_month" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Mois</option>
                    <option value="01" {{ old('birth_date_month') == '01' ? 'selected' : '' }}>Janvier</option>
                    <option value="02" {{ old('birth_date_month') == '02' ? 'selected' : '' }}>Février</option>
                    <option value="03" {{ old('birth_date_month') == '03' ? 'selected' : '' }}>Mars</option>
                    <option value="04" {{ old('birth_date_month') == '04' ? 'selected' : '' }}>Avril</option>
                    <option value="05" {{ old('birth_date_month') == '05' ? 'selected' : '' }}>Mai</option>
                    <option value="06" {{ old('birth_date_month') == '06' ? 'selected' : '' }}>Juin</option>
                    <option value="07" {{ old('birth_date_month') == '07' ? 'selected' : '' }}>Juillet</option>
                    <option value="08" {{ old('birth_date_month') == '08' ? 'selected' : '' }}>Août</option>
                    <option value="09" {{ old('birth_date_month') == '09' ? 'selected' : '' }}>Septembre</option>
                    <option value="10" {{ old('birth_date_month') == '10' ? 'selected' : '' }}>Octobre</option>
                    <option value="11" {{ old('birth_date_month') == '11' ? 'selected' : '' }}>Novembre</option>
                    <option value="12" {{ old('birth_date_month') == '12' ? 'selected' : '' }}>Décembre</option>
                </select>
                <select id="birth_date_year" name="birth_date_year" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Année</option>
                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                        <option value="{{ $i }}" {{ old('birth_date_year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <input type="hidden" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!-- Champs dynamiques selon la fonction -->
        <div id="fields-personnel" class="mt-4 hidden">
            <x-input-label for="matricule" :value="__('Matricule')" />
            <x-text-input id="matricule" class="block mt-1 w-full" type="text" name="matricule" :value="old('matricule')" />
            <x-input-error :messages="$errors->get('matricule')" class="mt-2" />

            <x-input-label for="department" :value="__('Département / Service')" class="mt-4" />
            <select id="department" name="department" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1 w-full">
                <option value="">--Sélectionner--</option>
                <option value="Technique">Technique</option>
                <option value="Ressources Humaines">Ressources Humaines</option>
                <option value="Finance">Finance</option>
            </select>
            <x-input-error :messages="$errors->get('department')" class="mt-2" />

            <!--Date d'embauche-->
            <x-input-label for="hire_date" :value="__('Date d\'embauche')" class="mt-4" />
            <div class="flex space-x-2">
                <select id="hire_date_day" name="hire_date_day" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Jour</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}" {{ old('hire_date_day') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>

                <!--Date d'anniversaire-->
                <select id="hire_date_month" name="hire_date_month" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Mois</option>
                    <option value="01" {{ old('hire_date_month') == '01' ? 'selected' : '' }}>Janvier</option>
                    <option value="02" {{ old('hire_date_month') == '02' ? 'selected' : '' }}>Février</option>
                    <option value="03" {{ old('hire_date_month') == '03' ? 'selected' : '' }}>Mars</option>
                    <option value="04" {{ old('hire_date_month') == '04' ? 'selected' : '' }}>Avril</option>
                    <option value="05" {{ old('hire_date_month') == '05' ? 'selected' : '' }}>Mai</option>
                    <option value="06" {{ old('hire_date_month') == '06' ? 'selected' : '' }}>Juin</option>
                    <option value="07" {{ old('hire_date_month') == '07' ? 'selected' : '' }}>Juillet</option>
                    <option value="08" {{ old('hire_date_month') == '08' ? 'selected' : '' }}>Août</option>
                    <option value="09" {{ old('hire_date_month') == '09' ? 'selected' : '' }}>Septembre</option>
                    <option value="10" {{ old('hire_date_month') == '10' ? 'selected' : '' }}>Octobre</option>
                    <option value="11" {{ old('hire_date_month') == '11' ? 'selected' : '' }}>Novembre</option>
                    <option value="12" {{ old('hire_date_month') == '12' ? 'selected' : '' }}>Décembre</option>
                </select>
                <select id="hire_date_year" name="hire_date_year" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Année</option>
                    @for ($i = date('Y') + 1; $i >= date('Y') - 50; $i--)
                        <option value="{{ $i }}" {{ old('hire_date_year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <input type="hidden" id="hire_date" name="hire_date" value="{{ old('hire_date') }}">
            <x-input-error :messages="$errors->get('hire_date')" class="mt-2" />

            <!-- Type de contrat -->
            <x-input-label for="contract_type" :value="__('Type de contrat')" class="mt-4" />
            <select id="contract_type" name="contract_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1 w-full">
                <option value="">--Sélectionner--</option>
                <option value="CDI">CDI</option>
                <option value="CDD">CDD</option>
                <option value="Stage">Stage</option>
            </select>
            <x-input-error :messages="$errors->get('contract_type')" class="mt-2" />
        </div>
        
        <div id="fields-prestataire" class="mt-4 hidden">
            <x-input-label for="prestation_type" :value="__('Type de prestation')" />
            <x-text-input id="prestation_type" class="block mt-1 w-full" type="text" name="prestation_type" :value="old('prestation_type')" />
            <x-input-error :messages="$errors->get('prestation_type')" class="mt-2" />
        </div>
        <div id="fields-partenaire" class="mt-4 hidden">
            <x-input-label for="entreprise" :value="__('Nom de l\'entreprise')" />
            <x-text-input id="entreprise" class="block mt-1 w-full" type="text" name="entreprise" :value="old('entreprise')" />
            <x-input-error :messages="$errors->get('entreprise')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-primary hover:bg-primary/90">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fonctionSelect = document.getElementById('fonction');
        const personnelFields = document.getElementById('fields-personnel');
        const prestataireFields = document.getElementById('fields-prestataire');
        const partenaireFields = document.getElementById('fields-partenaire');
        const dobFields = document.getElementById('fields-dob');

        function updateFields() {
            personnelFields.style.display = fonctionSelect.value === 'Personnel' ? 'block' : 'none';
            prestataireFields.style.display = fonctionSelect.value === 'Prestataire' ? 'block' : 'none';
            partenaireFields.style.display = fonctionSelect.value === 'Partenaire' ? 'block' : 'none';
            dobFields.style.display = (fonctionSelect.value === 'Personnel' || fonctionSelect.value === 'Prestataire') ? 'block' : 'none';
            // Mise à jour pour afficher ou masquer le champ Sexe
            document.getElementById('fields-sexe').style.display = (role === 'Personnel' || role === 'Prestataire') ? 'block' : 'none';
        }
        fonctionSelect.addEventListener('change', updateFields);
        updateFields();

        // Gestion de la date d'embauche (concaténation des champs)
        const hireDay = document.getElementById('hire_date_day');
        const hireMonth = document.getElementById('hire_date_month');
        const hireYear = document.getElementById('hire_date_year');
        const hireDateHidden = document.getElementById('hire_date');
        function updateHireDate() {
            if (hireDay && hireMonth && hireYear && hireDateHidden) {
                if (hireDay.value && hireMonth.value && hireYear.value) {
                    hireDateHidden.value = `${hireYear.value}-${hireMonth.value.padStart(2, '0')}-${hireDay.value.padStart(2, '0')}`;
                } else {
                    hireDateHidden.value = '';
                }
            }
        }
        if (hireDay && hireMonth && hireYear) {
            hireDay.addEventListener('change', updateHireDate);
            hireMonth.addEventListener('change', updateHireDate);
            hireYear.addEventListener('change', updateHireDate);
            updateHireDate();
        }
    });
</script>
