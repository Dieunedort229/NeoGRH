@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Modifier l'utilisateur</h1>

    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Nom</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Fonction</label>
            <input type="text" name="fonction" value="{{ old('fonction', $user->fonction) }}" class="w-full border p-2">
        </div>
        <button class="bg-primary text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection
