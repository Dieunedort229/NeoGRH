<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class UserManagementController extends Controller
{
    /**
     * Afficher la liste des utilisateurs
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('created_at', 'desc')->get();
        return view('personnel.users.index', compact('users'));
    }

    /**
     * Afficher le formulaire de création d'un utilisateur
     */
    public function create()
    {
        $roles = Role::all();
        return view('personnel.users.create', compact('roles'));
    }

    /**
     * Enregistrer un nouvel utilisateur
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['required', 'exists:roles,id'],
            'gender' => ['nullable', 'in:M,F'],
            'birth_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:20'],
            'fonction' => ['nullable', 'string', 'max:100'],
            'matricule' => ['nullable', 'string', 'max:50'],
            'prestation_type' => ['nullable', 'string', 'max:100'],
            'entreprise' => ['nullable', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:100'],
            'hire_date' => ['nullable', 'date'],
            'contract_type' => ['nullable', 'string', 'max:50'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'uuid' => (string) Str::uuid(),
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'fonction' => $request->fonction,
            'matricule' => $request->matricule,
            'prestation_type' => $request->prestation_type,
            'entreprise' => $request->entreprise,
            'department' => $request->department,
            'hire_date' => $request->hire_date,
            'contract_type' => $request->contract_type,
        ]);

        // Assigner le rôle
        $role = Role::find($request->role_id);
        $user->roles()->attach($role);

        // Log l'activité
        ActivityLog::logActivity(
            'create_user',
            "Création de l'utilisateur {$user->name} avec le rôle {$role->name}",
            User::class,
            $user->id,
            null,
            $user->toArray()
        );

        return redirect()->route('users.index')
                        ->with('success', 'Utilisateur créé avec succès et rôle assigné.');
    }

    /**
     * Afficher les détails d'un utilisateur
     */
    public function show(User $user)
    {
        $user->load('roles');
        return view('personnel.users.show', compact('user'));
    }

    /**
     * Afficher le formulaire d'édition d'un utilisateur
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $user->load('roles');
        return view('personnel.users.edit', compact('user', 'roles'));
    }

    /**
     * Mettre à jour un utilisateur
     */
    public function update(Request $request, User $user)
    {
        $oldValues = $user->toArray();
        $oldRoles = $user->roles->pluck('name')->toArray();
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['required', 'exists:roles,id'],
            'gender' => ['nullable', 'in:M,F'],
            'birth_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:20'],
            'fonction' => ['nullable', 'string', 'max:100'],
            'matricule' => ['nullable', 'string', 'max:50'],
            'prestation_type' => ['nullable', 'string', 'max:100'],
            'entreprise' => ['nullable', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:100'],
            'hire_date' => ['nullable', 'date'],
            'contract_type' => ['nullable', 'string', 'max:50'],
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'fonction' => $request->fonction,
            'matricule' => $request->matricule,
            'prestation_type' => $request->prestation_type,
            'entreprise' => $request->entreprise,
            'department' => $request->department,
            'hire_date' => $request->hire_date,
            'contract_type' => $request->contract_type,
        ];

        // Mettre à jour le mot de passe seulement s'il est fourni
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        // Mettre à jour le rôle
        $role = Role::find($request->role_id);
        $user->roles()->sync([$role->id]);
        $newRoles = [$role->name];

        // Log l'activité
        $changes = [];
        if ($oldRoles !== $newRoles) {
            $changes['roles'] = ['old' => $oldRoles, 'new' => $newRoles];
        }
        
        ActivityLog::logActivity(
            'update_user',
            "Modification de l'utilisateur {$user->name}" . 
            ($oldRoles !== $newRoles ? " - Rôle changé de " . implode(', ', $oldRoles) . " vers " . implode(', ', $newRoles) : ""),
            User::class,
            $user->id,
            $oldValues,
            array_merge($user->fresh()->toArray(), $changes)
        );

        return redirect()->route('users.index')
                        ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprimer un utilisateur
     */
    public function destroy(User $user)
    {
        // Empêcher la suppression du SuperAdmin connecté
        if ($user->hasRole('SuperAdmin') && auth()->id() === $user->id) {
            return redirect()->route('users.index')
                            ->with('error', 'Vous ne pouvez pas supprimer votre propre compte SuperAdmin.');
        }

        $userName = $user->name;
        $userRoles = $user->roles->pluck('name')->toArray();
        
        // Log l'activité AVANT la suppression
        ActivityLog::logActivity(
            'delete_user',
            "Suppression de l'utilisateur {$userName} (rôles: " . implode(', ', $userRoles) . ")",
            User::class,
            $user->id,
            $user->toArray(),
            null
        );

        $user->roles()->detach(); // Supprimer les rôles d'abord
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success', 'Utilisateur supprimé avec succès.');
    }
}
