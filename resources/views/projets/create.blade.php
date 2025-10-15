@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Créer un projet</h2>
    <div class="text-gray-600 dark:text-gray-400 mb-6">
        Cette page permet de créer un nouveau projet. Aucun champ n'est affiché pour l'instant.
        <br>
        <span class="italic">(Formulaire à compléter selon vos besoins)</span>
    </div>
    <a href="{{ route('projets.index') }}" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary/90 transition">Retour à la liste des projets</a>
</div>
@endsection
