<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BanqueController extends Controller
{
    public function index()
    {
        $banques = Banque::latest()->paginate(15);
        return view('banques.index', compact('banques'));
    }

    public function create()
    {
        return view('banques.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'code_banque' => 'nullable|string|max:50',
            'adresse' => 'nullable|string',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'contact_nom' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email',
            'contact_telephone' => 'nullable|string|max:20',
            'type_compte' => 'required|in:Courant,Épargne,Projet,Investissement',
            'numero_compte' => 'required|string|unique:banques,numero_compte|max:50',
            'iban' => 'nullable|string|max:50',
            'swift_bic' => 'nullable|string|max:20',
            'devise' => 'required|string|max:10',
            'solde_initial' => 'required|numeric',
            'solde_actuel' => 'required|numeric',
            'statut' => 'required|in:Actif,Inactif,Fermé',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Banque::create($request->all());

        return redirect()->route('banques.index')
            ->with('success', 'Compte bancaire ajouté avec succès.');
    }

    public function show(Banque $banque)
    {
        return view('banques.show', compact('banque'));
    }

    public function edit(Banque $banque)
    {
        return view('banques.edit', compact('banque'));
    }

    public function update(Request $request, Banque $banque)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'code_banque' => 'nullable|string|max:50',
            'adresse' => 'nullable|string',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'contact_nom' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email',
            'contact_telephone' => 'nullable|string|max:20',
            'type_compte' => 'required|in:Courant,Épargne,Projet,Investissement',
            'numero_compte' => 'required|string|max:50|unique:banques,numero_compte,' . $banque->id,
            'iban' => 'nullable|string|max:50',
            'swift_bic' => 'nullable|string|max:20',
            'devise' => 'required|string|max:10',
            'solde_initial' => 'required|numeric',
            'solde_actuel' => 'required|numeric',
            'statut' => 'required|in:Actif,Inactif,Fermé',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $banque->update($request->all());

        return redirect()->route('banques.index')
            ->with('success', 'Compte bancaire modifié avec succès.');
    }

    public function destroy(Banque $banque)
    {
        $banque->delete();

        return redirect()->route('banques.index')
            ->with('success', 'Compte bancaire supprimé avec succès.');
    }
}
