<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::latest()->paginate(15);
        return view('projets.index', compact('projets'));
    }

    public function create()
    {
        return view('projets.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric|min:0',
            'budget_utilise' => 'nullable|numeric|min:0',
            'devise' => 'required|string|max:10',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'statut' => 'required|in:Planifié,En cours,Terminé,Suspendu',
            'responsable' => 'required|string|max:255',
            'bailleur' => 'nullable|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'beneficiaires' => 'nullable|integer|min:0',
            'objectifs' => 'nullable|string',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Projet::create($request->all());

        return redirect()->route('projets.index')
            ->with('success', 'Projet créé avec succès.');
    }

    public function show(Projet $projet)
    {
        return view('projets.show', compact('projet'));
    }

    public function edit(Projet $projet)
    {
        return view('projets.edit', compact('projet'));
    }

    public function update(Request $request, Projet $projet)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric|min:0',
            'budget_utilise' => 'nullable|numeric|min:0',
            'devise' => 'required|string|max:10',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'statut' => 'required|in:Planifié,En cours,Terminé,Suspendu',
            'responsable' => 'required|string|max:255',
            'bailleur' => 'nullable|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'beneficiaires' => 'nullable|integer|min:0',
            'objectifs' => 'nullable|string',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $projet->update($request->all());

        return redirect()->route('projets.index')
            ->with('success', 'Projet modifié avec succès.');
    }

    public function destroy(Projet $projet)
    {
        $projet->delete();

        return redirect()->route('projets.index')
            ->with('success', 'Projet supprimé avec succès.');
    }
}
