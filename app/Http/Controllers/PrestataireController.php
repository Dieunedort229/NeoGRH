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
            'type_service' => 'required|string|max:255',
            'contact_nom' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'numero_registre_commerce' => 'nullable|string|max:100',
            'numero_fiscal' => 'nullable|string|max:100',
            'specialite' => 'nullable|string',
            'tarif_journalier' => 'nullable|numeric|min:0',
            'devise' => 'nullable|string|max:10',
            'statut' => 'required|in:Actif,Inactif,Suspendu',
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
            'type_service' => 'required|string|max:255',
            'contact_nom' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'numero_registre_commerce' => 'nullable|string|max:100',
            'numero_fiscal' => 'nullable|string|max:100',
            'specialite' => 'nullable|string',
            'tarif_journalier' => 'nullable|numeric|min:0',
            'devise' => 'nullable|string|max:10',
            'statut' => 'required|in:Actif,Inactif,Suspendu',
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
