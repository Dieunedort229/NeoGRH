<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['nullable', 'string', 'in:Homme,Femme'],
            'birth_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'fonction' => ['nullable', 'string', 'max:100'],
            'matricule' => ['nullable', 'string', 'max:50'],
            'prestation_type' => ['nullable', 'string', 'max:100'],
            'entreprise' => ['nullable', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'in:Technique,Ressources Humaines,Finance'],
            'hire_date' => ['nullable', 'date'],
            'contract_type' => ['nullable', 'string', 'in:CDI,CDD,Stage'],
        ]);

        // Forcer les valeurs explicitement
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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

        // Créer l'utilisateur avec les données préparées
        $user = new User();
        foreach ($userData as $key => $value) {
            $user->$key = $value;
        }
        $user->save();

        // Attribution du rôle en fonction de la fonction
        $fonction = $request->fonction;

        switch($fonction){
            case 'Personnel':
            case 'Prestataire':
                $role = Role::where('name', 'Editeur')->first();
                break;

            case 'Partenaire':
                $role = Role::where('name', 'Moniteur')->first();
                break;
            
            case 'Admin': // Création admin
                
                $role = Role::where('name','Admin')->first();
                break;
            case 'SuperAdmin': // Création super admin 
                $role = Role::where('name','SuperAdmin')->first();
                break;

            default:
                $role = null;
        }

        if ($role) {
            $user->roles()->attach($role);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
