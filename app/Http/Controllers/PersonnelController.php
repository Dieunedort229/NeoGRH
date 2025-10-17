<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonnelController extends Controller
{
    public function index()
    {
        $personnel = Personnel::latest()->paginate(15);
        return view('personnel.index', compact('personnel'));
    }

    public function create()
    {
        return view('personnel.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'matricule' => 'required|string|unique:personnels,matricule|max:50',
            'email' => 'required|email|unique:personnels,email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'date_naissance' => 'required|date',
            'sexe' => 'required|in:M,F',
            'poste' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'date_embauche' => 'required|date',
            'type_contrat' => 'required|in:CDI,CDD,Stage,Consultant',
            'salaire' => 'required|numeric|min:0',
            'numero_cnss' => 'nullable|string|max:50',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Personnel::create($request->all());

        return redirect()->route('personnel.index')
            ->with('success', 'Personnel ajouté avec succès.');
    }

    public function show(Personnel $personnel)
    {
        return view('personnel.show', compact('personnel'));
    }

    public function edit(Personnel $personnel)
    {
        return view('personnel.edit', compact('personnel'));
    }

    public function update(Request $request, Personnel $personnel)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'matricule' => 'required|string|max:50|unique:personnels,matricule,' . $personnel->id,
            'email' => 'required|email|unique:personnels,email,' . $personnel->id,
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'date_naissance' => 'required|date',
            'sexe' => 'required|in:M,F',
            'poste' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'date_embauche' => 'required|date',
            'type_contrat' => 'required|in:CDI,CDD,Stage,Consultant',
            'salaire' => 'required|numeric|min:0',
            'numero_cnss' => 'nullable|string|max:50',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $personnel->update($request->all());

        return redirect()->route('personnel.index')
            ->with('success', 'Personnel modifié avec succès.');
    }

    public function destroy(Personnel $personnel)
    {
        $personnel->delete();

        return redirect()->route('personnel.index')
            ->with('success', 'Personnel supprimé avec succès.');
    }
}