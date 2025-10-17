<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartenaireController extends Controller
{
    public function index()
    {
        $partenaires = Partenaire::latest()->paginate(15);
        return view('partenaires.index', compact('partenaires'));
    }

    public function create()
    {
        return view('partenaires.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'type_partenaire' => 'required|in:Bailleur,Partenaire technique,Gouvernement,ONG,Entreprise privée,Autre',
            'secteur_activite' => 'nullable|string|max:255',
            'contact_nom' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'site_web' => 'nullable|url',
            'date_partenariat' => 'required|date',
            'type_collaboration' => 'nullable|string|max:255',
            'budget_alloue' => 'nullable|numeric|min:0',
            'devise' => 'nullable|string|max:10',
            'statut' => 'required|in:Actif,Inactif,Suspendu,Terminé',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Partenaire::create($request->all());

        return redirect()->route('partenaires.index')
            ->with('success', 'Partenaire ajouté avec succès.');
    }

    public function show(Partenaire $partenaire)
    {
        return view('partenaires.show', compact('partenaire'));
    }

    public function edit(Partenaire $partenaire)
    {
        return view('partenaires.edit', compact('partenaire'));
    }

    public function update(Request $request, Partenaire $partenaire)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'type_partenaire' => 'required|in:Bailleur,Partenaire technique,Gouvernement,ONG,Entreprise privée,Autre',
            'secteur_activite' => 'nullable|string|max:255',
            'contact_nom' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'site_web' => 'nullable|url',
            'date_partenariat' => 'required|date',
            'type_collaboration' => 'nullable|string|max:255',
            'budget_alloue' => 'nullable|numeric|min:0',
            'devise' => 'nullable|string|max:10',
            'statut' => 'required|in:Actif,Inactif,Suspendu,Terminé',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $partenaire->update($request->all());

        return redirect()->route('partenaires.index')
            ->with('success', 'Partenaire modifié avec succès.');
    }

    public function destroy(Partenaire $partenaire)
    {
        $partenaire->delete();

        return redirect()->route('partenaires.index')
            ->with('success', 'Partenaire supprimé avec succès.');
    }
}
