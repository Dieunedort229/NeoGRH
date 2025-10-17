@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Créer un utilisateur</h1>

    <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Nom</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Mot de passe</label>
            <input type="password" name="password" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Fonction</label>
            <input type="text" name="fonction" value="{{ old('fonction') }}" class="w-full border p-2">
        </div>
        <button class="bg-primary text-white px-4 py-2 rounded">Créer</button>
    </form>
</div>
@endsection
