<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Utulisateur;
use Illuminate\Http\Request;

class commandecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commandes = Commande::all();
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $utulisateurs = Utulisateur::all();
        return view('commandes.create', compact('utulisateurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cathegorie= Commande::create($request->all());
        return  redirect()->route('commandes.index')->with("addSuccess", "La commande a été ajouté avec succés");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $commande = commande::find($id);
        return view('commandes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $commande = commande::find($id);

        return view('commandes.edit', compact('commande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validation des données
    $validatedData = $request->validate([
        'date_commande' => 'required|date',
        'montant_commande' => 'required|numeric',
        'status' => 'required|string'
    ]);

    // Récupération de la commande
    $commande = Commande::findOrFail($id);

    // Mise à jour des données de la commande
    $commande->update([
        'date_commande' => $validatedData['date_commande'],
        'montant_commande' => $validatedData['montant_commande'],
        'status' => $validatedData['status']
    ]);

    // Redirection avec message de succès
    return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
        $commande = Commande::findOrFail($id);

        // Supprimer la catégorie
        $commande->delete();
    
        // Rediriger vers la liste des catégories avec un message de succès
        return redirect()->route('commandes.index')->with('deleteSuccess', 'La commande a été supprimée avec succès');
    }

}
