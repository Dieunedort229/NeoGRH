
@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Barre de recherche globale -->
            <div class="mb-8 flex justify-end">
                <input type="text" placeholder="Rechercher..." class="w-full max-w-md px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:border-primary focus:ring-primary dark:focus:border-primary dark:focus:ring-primary bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card: Nombre d'employés -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-primary mb-2">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 017 16h10a4 4 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <div class="font-bold text-lg text-gray-800 dark:text-gray-200">Nombre d'employés</div>
                    <div class="text-gray-500 dark:text-gray-400 mt-1">Aucun employé enregistré</div>
                    <a href="{{ route('personnel.create') }}" class="mt-4 w-full text-center px-4 py-2 bg-primary text-white rounded hover:bg-primary/90 transition min-w-[180px] max-w-[180px]">Ajouter un employé</a>
                </div>
                <!-- Card: Projets en cours -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-primary mb-2">
                        <!-- Nouvelle icône : dossier -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 012-2h3.172a2 2 0 011.414.586l1.828 1.828A2 2 0 0012.828 8H19a2 2 0 012 2v7a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" /></svg>
                    </div>
                    <div class="font-bold text-lg text-gray-800 dark:text-gray-200">Projets en cours</div>
                    <div class="text-gray-500 dark:text-gray-400 mt-1">Aucun projet en cours</div>
                    <a href="{{ route('projets.create') }}" class="mt-4 w-full text-center px-4 py-2 bg-primary text-white rounded hover:bg-primary/90 transition min-w-[180px] max-w-[180px]">Créer un projet</a>
                </div>
                <!-- Card: Notifications -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-primary mb-2">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                    </div>
                    <div class="font-bold text-lg text-gray-800 dark:text-gray-200">Notifications</div>
                    <div class="text-gray-500 dark:text-gray-400 mt-1">Aucune notification</div>
                    <a href="#" class="mt-4 w-full text-center px-4 py-2 bg-primary text-white rounded hover:bg-primary/90 transition min-w-[180px] max-w-[180px]">Voir les notifications</a>
                </div>
                <!-- Card: Événements à venir -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center">
                    <div class="text-4xl text-primary mb-2">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <div class="font-bold text-lg text-gray-800 dark:text-gray-200">Événements à venir</div>
                    <div class="text-gray-500 dark:text-gray-400 mt-1">Aucun événement à venir</div>
                    <a href="#" class="mt-4 w-full text-center px-4 py-2 bg-primary text-white rounded hover:bg-primary/90 transition min-w-[180px] max-w-[180px]">Voir le calendrier</a>
                </div>
            </div>
            <!-- Section expert RH : Conseils, raccourcis, etc. -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mt-8">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Conseils RH & raccourcis</h3>
                <ul class="space-y-2">
                    <li class="text-gray-600 dark:text-gray-400">Utilisez les raccourcis ci-dessus pour gérer rapidement vos employés et projets.</li>
                    <li class="text-gray-600 dark:text-gray-400">Consultez les notifications et événements pour rester informé.</li>
                    <li class="text-gray-600 dark:text-gray-400">Ajoutez des modules selon vos besoins (congés, paie, etc.).</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
