
<aside class="w-64 h-screen bg-gradient-to-b from-primary to-blue-900 dark:from-gray-900 dark:to-gray-800 shadow-lg flex flex-col">
    <div class="flex items-center justify-center h-20">
        <span class="text-2xl font-bold text-white tracking-wide">NeoGRH</span>
    </div>
    <nav class="mt-8 flex flex-col space-y-2 px-4">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-2 rounded-lg text-white hover:bg-blue-400 hover:text-white focus:bg-blue-300 active:bg-blue-500 transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" /></svg>
            <span>Accueil</span>
        </x-nav-link>
    <x-nav-link :href="route('projets.index')" :active="request()->routeIs('projets.*')" class="flex items-center px-4 py-2 rounded-lg text-white hover:bg-blue-400 hover:text-white focus:bg-blue-300 active:bg-blue-500 transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6" /></svg>
            <span>Projets</span>
        </x-nav-link>
    <x-nav-link :href="route('personnel.index')" :active="request()->routeIs('personnel.*')" class="flex items-center px-4 py-2 rounded-lg text-white hover:bg-blue-400 hover:text-white focus:bg-blue-300 active:bg-blue-500 transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 017 16h10a4 4 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            <span>Personnel</span>
        </x-nav-link>
    <x-nav-link :href="route('prestataires.index')" :active="request()->routeIs('prestataires.*')" class="flex items-center px-4 py-2 rounded-lg text-white hover:bg-blue-400 hover:text-white focus:bg-blue-300 active:bg-blue-500 transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 01-8 0m8 0a4 4 0 00-8 0m8 0v4a4 4 0 01-8 0V7m8 0V5a4 4 0 00-8 0v2" /></svg>
            <span>Prestataires</span>
        </x-nav-link>
    <x-nav-link :href="route('banques.index')" :active="request()->routeIs('banques.*')" class="flex items-center px-4 py-2 rounded-lg text-white hover:bg-blue-400 hover:text-white focus:bg-blue-300 active:bg-blue-500 transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a5 5 0 00-10 0v2M5 9h14M5 9v10a2 2 0 002 2h10a2 2 0 002-2V9" /></svg>
            <span>Banques</span>
        </x-nav-link>
    <x-nav-link :href="route('partenaires.index')" :active="request()->routeIs('partenaires.*')" class="flex items-center px-4 py-2 rounded-lg text-white hover:bg-blue-400 hover:text-white focus:bg-blue-300 active:bg-blue-500 transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h10M7 16h10" /></svg>
            <span>Partenaires</span>
        </x-nav-link>
    </nav>
</aside>
