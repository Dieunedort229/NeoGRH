<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','confirmed','min:8'],
            'fonction' => ['nullable','string','max:100'],
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->fonction = $data['fonction'] ?? null;
        $user->save();

        // assign role based on fonction (reuse logic from RegisteredUserController)
        $fonction = $data['fonction'] ?? null;
        switch($fonction){
            case 'Personnel':
            case 'Prestataire':
                $role = Role::where('name', 'Editeur')->first();
                break;
            case 'Partenaire':
                $role = Role::where('name', 'Moniteur')->first();
                break;
            case 'Admin':
                $role = Role::where('name','Admin')->first();
                break;
            case 'SuperAdmin':
                $role = Role::where('name','SuperAdmin')->first();
                break;
            default:
                $role = null;
        }
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('admin.users.index')->with('status', 'Utilisateur créé.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email,'.$user->id],
            'fonction' => ['nullable','string','max:100'],
        ]);

        $user->update($data);

        return redirect()->route('admin.users.index')->with('status', 'Utilisateur mis à jour.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('status', 'Utilisateur supprimé.');
    }
}
