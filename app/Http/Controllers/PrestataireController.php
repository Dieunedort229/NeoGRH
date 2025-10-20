<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prestataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrestataireController extends Controller
{
    public function index()
    {
        $prestataires = Prestataire::latest()->paginate(15);
        return view('prestataires.index', compact('prestataires'));
    }

    public function create()
    {
        return view('prestataires.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'entreprise' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:prestataires,email',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string',
            'specialite' => 'required|string|max:255',
            'type_prestation' => 'required|in:Consultant,Fournisseur,Service',
            'tarif_journalier' => 'nullable|numeric|min:0',
            'competences' => 'nullable|string',
            'statut' => 'required|in:Actif,Inactif,Blacklisté',
            'date_debut_collaboration' => 'nullable|date',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Prestataire::create($request->all());

        return redirect()->route('prestataires.index')
            ->with('success', 'Prestataire ajouté avec succès.');
    }

    public function show(Prestataire $prestataire)
    {
        return view('prestataires.show', compact('prestataire'));
    }

    public function edit(Prestataire $prestataire)
    {
        return view('prestataires.edit', compact('prestataire'));
    }

    public function update(Request $request, Prestataire $prestataire)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'entreprise' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:prestataires,email,' . $prestataire->id,
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string',
            'specialite' => 'required|string|max:255',
            'type_prestation' => 'required|in:Consultant,Fournisseur,Service',
            'tarif_journalier' => 'nullable|numeric|min:0',
            'competences' => 'nullable|string',
            'statut' => 'required|in:Actif,Inactif,Blacklisté',
            'date_debut_collaboration' => 'nullable|date',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $prestataire->update($request->all());

        return redirect()->route('prestataires.index')
            ->with('success', 'Prestataire modifié avec succès.');
    }

    public function destroy(Prestataire $prestataire)
    {
        $prestataire->delete();

        return redirect()->route('prestataires.index')
            ->with('success', 'Prestataire supprimé avec succès.');
    }
}
