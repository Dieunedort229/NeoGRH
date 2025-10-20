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
            'nom_organisation' => 'required|string|max:255',
            'type_partenaire' => 'required|in:Bailleur,Partenaire technique,Partenaire local,Gouvernement',
            'contact_principal' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string',
            'site_web' => 'nullable|url',
            'domaine_intervention' => 'nullable|string',
            'date_debut_partenariat' => 'nullable|date',
            'date_fin_partenariat' => 'nullable|date|after_or_equal:date_debut_partenariat',
            'accords_signes' => 'nullable|string',
            'statut' => 'required|in:Actif,Inactif,En négociation',
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
            'nom_organisation' => 'required|string|max:255',
            'type_partenaire' => 'required|in:Bailleur,Partenaire technique,Partenaire local,Gouvernement',
            'contact_principal' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string',
            'site_web' => 'nullable|url',
            'domaine_intervention' => 'nullable|string',
            'date_debut_partenariat' => 'nullable|date',
            'date_fin_partenariat' => 'nullable|date|after_or_equal:date_debut_partenariat',
            'accords_signes' => 'nullable|string',
            'statut' => 'required|in:Actif,Inactif,En négociation',
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
