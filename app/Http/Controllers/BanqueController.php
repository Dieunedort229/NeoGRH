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
            'nom_banque' => 'required|string|max:255',
            'numero_compte' => 'required|string|unique:banques,numero_compte|max:255',
            'type_compte' => 'required|in:Courant,Épargne,Projet,Investissement',
            'devise' => 'required|string|max:10',
            'solde_initial' => 'required|numeric|min:0',
            'responsable_compte' => 'nullable|string|max:255',
            'contact_banque' => 'nullable|string|max:255',
            'adresse_banque' => 'nullable|string',
            'statut' => 'required|in:Actif,Fermé,Suspendu',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['solde_actuel'] = $data['solde_initial']; // Set initial balance as current balance
        
        Banque::create($data);

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
            'nom_banque' => 'required|string|max:255',
            'numero_compte' => 'required|string|max:255|unique:banques,numero_compte,' . $banque->id,
            'type_compte' => 'required|in:Courant,Épargne,Projet,Investissement',
            'devise' => 'required|string|max:10',
            'solde_initial' => 'required|numeric|min:0',
            'responsable_compte' => 'nullable|string|max:255',
            'contact_banque' => 'nullable|string|max:255',
            'adresse_banque' => 'nullable|string',
            'statut' => 'required|in:Actif,Fermé,Suspendu',
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
