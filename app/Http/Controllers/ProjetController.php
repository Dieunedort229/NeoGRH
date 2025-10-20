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
            'budget_total' => 'required|numeric|min:0',
            'budget_utilise' => 'nullable|numeric|min:0',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'statut' => 'required|in:Planifié,En cours,Terminé,Suspendu',
            'responsable' => 'required|string|max:255',
            'bailleur' => 'nullable|string|max:255',
            'objectifs' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Générer un code projet unique
        $codeProjet = $this->generateUniqueCodeProjet();
        
        // Préparer les données avec le code projet
        $data = $request->all();
        $data['code_projet'] = $codeProjet;
        
        // Si budget_utilise n'est pas fourni, le mettre à 0
        if (!isset($data['budget_utilise'])) {
            $data['budget_utilise'] = 0;
        }

        Projet::create($data);

        return redirect()->route('projets.index')
            ->with('success', 'Projet créé avec succès.');
    }

    /**
     * Générer un code projet unique
     */
    private function generateUniqueCodeProjet()
    {
        do {
            // Format: PROJ-YYYY-XXX (ex: PROJ-2025-001)
            $year = date('Y');
            $count = Projet::whereYear('created_at', $year)->count() + 1;
            $codeProjet = 'PROJ-' . $year . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
        } while (Projet::where('code_projet', $codeProjet)->exists());

        return $codeProjet;
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
            'budget_total' => 'required|numeric|min:0',
            'budget_utilise' => 'nullable|numeric|min:0',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'statut' => 'required|in:Planifié,En cours,Terminé,Suspendu',
            'responsable' => 'required|string|max:255',
            'bailleur' => 'nullable|string|max:255',
            'objectifs' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Préparer les données
        $data = $request->only([
            'nom', 'description', 'budget_total', 'budget_utilise', 
            'date_debut', 'date_fin', 'statut', 'responsable', 
            'bailleur', 'objectifs'
        ]);
        
        // Si budget_utilise n'est pas fourni, le mettre à 0
        if (!isset($data['budget_utilise'])) {
            $data['budget_utilise'] = 0;
        }

        $projet->update($data);

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
