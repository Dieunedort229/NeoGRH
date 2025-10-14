<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Informations personnelles -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Sexe')" />
            <select id="gender" name="gender" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1 w-full">
                <option value="">--Sélectionner--</option>
                <option value="Homme" {{ $user->gender == 'Homme' ? 'selected' : '' }}>Homme</option>
                <option value="Femme" {{ $user->gender == 'Femme' ? 'selected' : '' }}>Femme</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('Date de naissance')" />
            <div class="flex space-x-2">
                <select id="birth_date_day" name="birth_date_day" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Jour</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}" {{ (old('birth_date_day') == $i || ($user->birth_date && date('d', strtotime($user->birth_date)) == $i)) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <select id="birth_date_month" name="birth_date_month" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Mois</option>
                    <option value="01" {{ (old('birth_date_month') == '01' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '01')) ? 'selected' : '' }}>Janvier</option>
                    <option value="02" {{ (old('birth_date_month') == '02' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '02')) ? 'selected' : '' }}>Février</option>
                    <option value="03" {{ (old('birth_date_month') == '03' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '03')) ? 'selected' : '' }}>Mars</option>
                    <option value="04" {{ (old('birth_date_month') == '04' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '04')) ? 'selected' : '' }}>Avril</option>
                    <option value="05" {{ (old('birth_date_month') == '05' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '05')) ? 'selected' : '' }}>Mai</option>
                    <option value="06" {{ (old('birth_date_month') == '06' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '06')) ? 'selected' : '' }}>Juin</option>
                    <option value="07" {{ (old('birth_date_month') == '07' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '07')) ? 'selected' : '' }}>Juillet</option>
                    <option value="08" {{ (old('birth_date_month') == '08' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '08')) ? 'selected' : '' }}>Août</option>
                    <option value="09" {{ (old('birth_date_month') == '09' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '09')) ? 'selected' : '' }}>Septembre</option>
                    <option value="10" {{ (old('birth_date_month') == '10' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '10')) ? 'selected' : '' }}>Octobre</option>
                    <option value="11" {{ (old('birth_date_month') == '11' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '11')) ? 'selected' : '' }}>Novembre</option>
                    <option value="12" {{ (old('birth_date_month') == '12' || ($user->birth_date && date('m', strtotime($user->birth_date)) == '12')) ? 'selected' : '' }}>Décembre</option>
                </select>
                <select id="birth_date_year" name="birth_date_year" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Année</option>
                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                        <option value="{{ $i }}" {{ (old('birth_date_year') == $i || ($user->birth_date && date('Y', strtotime($user->birth_date)) == $i)) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <input type="hidden" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}">
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Adresse')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $user->address)" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Téléphone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $user->phone)" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Informations professionnelles -->
        <div class="mt-4">
            <x-input-label for="fonction" :value="__('Fonction')" />
            <x-text-input id="fonction" class="block mt-1 w-full" type="text" name="fonction" :value="old('fonction', $user->fonction)" />
            <x-input-error :messages="$errors->get('fonction')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="department" :value="__('Département')" />
            <select id="department" name="department" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1 w-full">
                <option value="">--Sélectionner--</option>
                <option value="Technique" {{ $user->department == 'Technique' ? 'selected' : '' }}>Technique</option>
                <option value="Ressources Humaines" {{ $user->department == 'Ressources Humaines' ? 'selected' : '' }}>Ressources Humaines</option>
                <option value="Finance" {{ $user->department == 'Finance' ? 'selected' : '' }}>Finance</option>
            </select>
            <x-input-error :messages="$errors->get('department')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="hire_date" :value="__('Date d\'embauche')" />
            <div class="flex space-x-2">
                <select id="hire_date_day" name="hire_date_day" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Jour</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}" {{ (old('hire_date_day') == $i || ($user->hire_date && date('d', strtotime($user->hire_date)) == $i)) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <select id="hire_date_month" name="hire_date_month" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Mois</option>
                    <option value="01" {{ (old('hire_date_month') == '01' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '01')) ? 'selected' : '' }}>Janvier</option>
                    <option value="02" {{ (old('hire_date_month') == '02' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '02')) ? 'selected' : '' }}>Février</option>
                    <option value="03" {{ (old('hire_date_month') == '03' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '03')) ? 'selected' : '' }}>Mars</option>
                    <option value="04" {{ (old('hire_date_month') == '04' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '04')) ? 'selected' : '' }}>Avril</option>
                    <option value="05" {{ (old('hire_date_month') == '05' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '05')) ? 'selected' : '' }}>Mai</option>
                    <option value="06" {{ (old('hire_date_month') == '06' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '06')) ? 'selected' : '' }}>Juin</option>
                    <option value="07" {{ (old('hire_date_month') == '07' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '07')) ? 'selected' : '' }}>Juillet</option>
                    <option value="08" {{ (old('hire_date_month') == '08' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '08')) ? 'selected' : '' }}>Août</option>
                    <option value="09" {{ (old('hire_date_month') == '09' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '09')) ? 'selected' : '' }}>Septembre</option>
                    <option value="10" {{ (old('hire_date_month') == '10' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '10')) ? 'selected' : '' }}>Octobre</option>
                    <option value="11" {{ (old('hire_date_month') == '11' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '11')) ? 'selected' : '' }}>Novembre</option>
                    <option value="12" {{ (old('hire_date_month') == '12' || ($user->hire_date && date('m', strtotime($user->hire_date)) == '12')) ? 'selected' : '' }}>Décembre</option>
                </select>
                <select id="hire_date_year" name="hire_date_year" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1">
                    <option value="">Année</option>
                    @for ($i = date('Y') + 1; $i >= date('Y') - 50; $i--)
                        <option value="{{ $i }}" {{ (old('hire_date_year') == $i || ($user->hire_date && date('Y', strtotime($user->hire_date)) == $i)) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <input type="hidden" id="hire_date" name="hire_date" value="{{ old('hire_date', $user->hire_date) }}">
            <x-input-error :messages="$errors->get('hire_date')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="contract_type" :value="__('Type de contrat')" />
            <select id="contract_type" name="contract_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm block mt-1 w-full">
                <option value="">--Sélectionner--</option>
                <option value="CDI" {{ $user->contract_type == 'CDI' ? 'selected' : '' }}>CDI</option>
                <option value="CDD" {{ $user->contract_type == 'CDD' ? 'selected' : '' }}>CDD</option>
                <option value="Stage" {{ $user->contract_type == 'Stage' ? 'selected' : '' }}>Stage</option>
            </select>
            <x-input-error :messages="$errors->get('contract_type')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
