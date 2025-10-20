
<aside class="fixed left-0 top-0 w-64 h-screen bg-gradient-to-b from-blue-600 to-blue-900 dark:from-gray-900 dark:to-gray-800 shadow-xl flex flex-col z-10 overflow-y-auto transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <div class="flex items-center justify-center h-20 border-b border-blue-500/20">
        <span class="text-2xl font-bold text-white tracking-wide">NeoGRH</span>
    </div>
    <nav class="mt-8 flex flex-col space-y-2 px-4 flex-1 pb-8">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3 rounded-lg text-white hover:bg-blue-500 hover:text-white focus:bg-blue-400 active:bg-blue-700 transition-colors duration-150">
            <i class="fas fa-home w-5 h-5 mr-3"></i>
            <span>Accueil</span>
        </x-nav-link>
    <x-nav-link :href="route('projets.index')" :active="request()->routeIs('projets.*')" class="flex items-center px-4 py-3 rounded-lg text-white hover:bg-blue-500 hover:text-white focus:bg-blue-400 active:bg-blue-700 transition-colors duration-150">
            <i class="fas fa-project-diagram w-5 h-5 mr-3"></i>
            <span>Projets</span>
        </x-nav-link>
        <!-- Personnel avec sous-menu -->
        <div x-data="{ open: {{ request()->routeIs('personnel.*') || request()->routeIs('users.*') ? 'true' : 'false' }} }" class="relative">
            <button @click="open = !open" 
                    class="flex items-center justify-between w-full px-4 py-3 rounded-lg text-white hover:bg-blue-500 focus:bg-blue-400 transition-colors duration-150 {{ request()->routeIs('personnel.*') || request()->routeIs('users.*') ? 'bg-blue-700' : '' }}">
                <div class="flex items-center">
                    <i class="fas fa-users w-5 h-5 mr-3"></i>
                    <span>Personnel</span>
                </div>
                <i class="fas fa-chevron-down transform transition-transform duration-150" :class="{ 'rotate-180': open }"></i>
            </button>
            
            <div x-show="open" class="mt-2 space-y-1">
                <x-nav-link :href="route('personnel.index')" :active="request()->routeIs('personnel.*')" class="flex items-center px-8 py-2 rounded-lg text-white/80 hover:bg-blue-500 hover:text-white transition-colors duration-150 text-sm">
                    <i class="fas fa-user-friends w-4 h-4 mr-3"></i>
                    <span>Employés</span>
                </x-nav-link>
                <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')" class="flex items-center px-8 py-2 rounded-lg text-white/80 hover:bg-blue-500 hover:text-white transition-colors duration-150 text-sm">
                    <i class="fas fa-users-cog w-4 h-4 mr-3"></i>
                    <span>Comptes Utilisateurs</span>
                </x-nav-link>
            </div>
        </div>
    <x-nav-link :href="route('prestataires.index')" :active="request()->routeIs('prestataires.*')" class="flex items-center px-4 py-3 rounded-lg text-white hover:bg-blue-500 hover:text-white focus:bg-blue-400 active:bg-blue-700 transition-colors duration-150">
            <i class="fas fa-handshake w-5 h-5 mr-3"></i>
            <span>Prestataires</span>
        </x-nav-link>
    <x-nav-link :href="route('banques.index')" :active="request()->routeIs('banques.*')" class="flex items-center px-4 py-3 rounded-lg text-white hover:bg-blue-500 hover:text-white focus:bg-blue-400 active:bg-blue-700 transition-colors duration-150">
            <i class="fas fa-university w-5 h-5 mr-3"></i>
            <span>Banques</span>
        </x-nav-link>
    <x-nav-link :href="route('partenaires.index')" :active="request()->routeIs('partenaires.*')" class="flex items-center px-4 py-3 rounded-lg text-white hover:bg-blue-500 hover:text-white focus:bg-blue-400 active:bg-blue-700 transition-colors duration-150">
            <i class="fas fa-building w-5 h-5 mr-3"></i>
            <span>Partenaires</span>
        </x-nav-link>
        
        @if(auth()->user() && auth()->user()->hasRole('SuperAdmin'))
        <!-- Logs Système - SuperAdmin uniquement -->
        <x-nav-link :href="route('admin.logs.index')" :active="request()->routeIs('admin.logs.*')" class="flex items-center px-4 py-3 rounded-lg text-white hover:bg-red-500 hover:text-white focus:bg-red-400 active:bg-red-700 transition-colors duration-150 border-t border-red-500/20 mt-4">
            <i class="fas fa-shield-alt w-5 h-5 mr-3"></i>
            <span>Logs Système</span>
            <i class="fas fa-eye-slash ml-auto text-red-300"></i>
        </x-nav-link>
        @endif
    </nav>
</aside>
