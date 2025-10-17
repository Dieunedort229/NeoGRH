@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Utilisateurs</h1>

    @if(session('status'))
        <div class="mb-4 text-green-600">{{ session('status') }}</div>
    @endif

    <a href="{{ route('admin.users.create') }}" class="mb-4 inline-block bg-primary text-white px-4 py-2 rounded">Créer un utilisateur</a>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="text-left border-b">
                <th class="p-2">ID</th>
                <th class="p-2">Nom</th>
                <th class="p-2">Email</th>
                <th class="p-2">Fonction</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="border-b">
                    <td class="p-2">{{ $user->id }}</td>
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->fonction }}</td>
                    <td class="p-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 ms-3" onclick="return confirm('Supprimer?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $users->links() }}</div>
</div>
@endsection
